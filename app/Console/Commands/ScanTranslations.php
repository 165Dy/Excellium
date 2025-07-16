<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class ScanTranslations extends Command
{
    protected $signature = 'scan:translations-html';
    protected $description = 'Scan Blade files for visible HTML texts and replace them with @lang(...)';
    protected $translationFile = 'resources/lang/fr/extracted.php';
    protected $prefix = 'extracted';

    public function handle()
{
    $this->info('🔍 Scan des fichiers Blade (hors /admin)...');

    $bladeFiles = $this->getBladeFiles(resource_path('views'));
    $translations = [];

    foreach ($bladeFiles as $file) {
        $originalContent = file_get_contents($file);
        $content = $originalContent;

        // 🔒 Supprimer le contenu des balises <style>, <script>, <svg>
        $content = preg_replace('#<style[^>]*>.*?</style>#si', '', $content);
        $content = preg_replace('#<script[^>]*>.*?</script>#si', '', $content);
        $content = preg_replace('#<svg[^>]*>.*?</svg>#si', '', $content);

        // 🎯 Trouver les textes entre balises HTML simples
        preg_match_all('#<([a-zA-Z0-9]+)[^>]*>([^<>@]+)</\1>#', $content, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $tag = $match[1];
            $text = trim($match[2]);

            // Filtrage : ignorer vide, directives blade, numériques
            if (
                $text === '' ||
                Str::startsWith($text, ['@lang(', '{{', '<?php', '@if', '@endif']) ||
                is_numeric($text)
            ) {
                continue;
            }

            // Génération de la clé
            $key = Str::slug(Str::limit($text, 50), '_');

            if (!isset($translations[$key])) {
                $translations[$key] = $text;
            }

            // 🔁 Remplacement dans le fichier original
            $escapedOriginalText = preg_quote($match[0], '/');
            $newLine = "<$tag>@lang('{$this->prefix}.$key')</$tag>";
            $originalContent = str_replace($match[0], $newLine, $originalContent);
        }

        file_put_contents($file, $originalContent);
    }

    if (empty($translations)) {
        $this->warn("⚠️ Aucun texte à traduire trouvé.");
        return;
    }

    $this->saveTranslations($translations);
    $this->info("✅ Traductions enregistrées dans $this->translationFile");
}


    protected function getBladeFiles($basePath)
    {
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($basePath));
        $files = [];

        foreach ($rii as $file) {
            if ($file->isDir()) continue;

            $filePath = $file->getPathname();

            if (!Str::endsWith($filePath, '.blade.php')) continue;

            // Exclure les chemins contenant /admin ou /layouts/admin
            if (
                Str::contains($filePath, [
                    'resources/views/admin',
                    'resources/views/layouts/admin'
                ])
            ) continue;

            $files[] = $filePath;
        }

        return $files;
    }

    protected function saveTranslations($translations)
    {
        $content = "<?php\n\nreturn [\n";
        foreach ($translations as $key => $value) {
            $escaped = addslashes($value);
            $content .= "    '$key' => '$escaped',\n";
        }
        $content .= "];\n";

        File::ensureDirectoryExists(dirname($this->translationFile));
        file_put_contents($this->translationFile, $content);
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Illuminate\Support\Str;

class ScanTranslations extends Command
{
    protected $signature = 'scan:translations';
    protected $description = 'Scanne les vues Blade, extrait les textes statiques et les remplace par @lang';

    private $translations = [];
    private $langPath = 'app/lang/fr/extracted.php';

    public function handle()
    {
        $bladePath = resource_path('views');
        $bladeFiles = $this->getBladeFiles($bladePath);

        foreach ($bladeFiles as $filePath) {
            $this->scanAndReplaceFile($filePath);
        }

        if (empty($this->translations)) {
            $this->warn("Aucun texte statique trouvé.");
            return Command::SUCCESS;
        }

        $this->writeTranslationFile();

        $this->info("✅ Remplacement terminé et fichier de traduction mis à jour :");
        $this->line("→ " . base_path($this->langPath));

        return Command::SUCCESS;
    }

    private function getBladeFiles($path)
    {
        $files = [];
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        foreach ($iterator as $file) {
            if ($file->isFile() && str_ends_with($file, '.blade.php')) {
                $files[] = $file->getPathname();
            }
        }
        return $files;
    }

    private function scanAndReplaceFile($filePath)
    {
        $originalContent = file_get_contents($filePath);
        $modifiedContent = $originalContent;

        preg_match_all('/>([^<>{}@]+)</', $originalContent, $matches);

        foreach ($matches[1] as $rawText) {
            $text = trim($rawText);
            if (!$text || is_numeric($text) || Str::startsWith($text, '@') || strlen($text) < 2) {
                continue;
            }

            $key = Str::slug($text, '_');
            if (!isset($this->translations[$key])) {
                $this->translations[$key] = $text;
            }

            // Crée la forme à remplacer : >texte<
            $pattern = '>' . preg_quote($text, '/') . '<';
            $replacement = '>@lang(\'extracted.' . $key . '\')<';
            $modifiedContent = preg_replace('/' . $pattern . '/', $replacement, $modifiedContent);
        }

        // Sauvegarde si modification détectée
        if ($modifiedContent !== $originalContent) {
            file_put_contents($filePath, $modifiedContent);
            $this->info("✔ Texte remplacé dans : " . str_replace(base_path(), '', $filePath));
        }
    }

    private function writeTranslationFile()
    {
        $output = "<?php\n\nreturn [\n";
        foreach ($this->translations as $key => $val) {
            $escapedVal = addslashes($val);
            $output .= "    '{$key}' => '{$escapedVal}',\n";
        }
        $output .= "];\n";

        $langFilePath = base_path($this->langPath);
        file_put_contents($langFilePath, $output);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Article;
use App\Models\Formation;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'fichier',
        'description',
        'formation_id',
        'article_id',
    ];

    // Relations
    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}

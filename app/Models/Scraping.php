<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scraping extends Model
{
    protected $tables = "scrapings";
    protected $fillable = [
        'link',
        'word',
        'related_words',
        'related_links',
    ];

    protected $casts = [
        'related_words' => 'array',
        'related_links' => 'array',
    ];
}

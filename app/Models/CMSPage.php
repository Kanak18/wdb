<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMSPage extends Model
{
    protected $table = 'cms_pages';
    
    protected $fillable = [
        'key',
        'title',
        'content',
        'meta_title',
        'meta_description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}

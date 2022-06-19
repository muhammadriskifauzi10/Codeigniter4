<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    // ...
    protected $table      = 'blog';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'judul',
        'slug',
        'author',
        'category',
        'sampul'
    ];
}

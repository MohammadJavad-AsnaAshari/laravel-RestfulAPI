<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $description
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];
}

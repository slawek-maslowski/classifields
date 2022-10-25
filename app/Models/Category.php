<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function classifield()
    {
        return $this->hasMany(Classifield::class);
    }

    public $fillable = [
        'title',
        'description',
        'image_path'
    ];
}

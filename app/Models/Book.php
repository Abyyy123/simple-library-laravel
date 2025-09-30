<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    // Definisikan kolom yang boleh diisi (mass assignment)
    protected $fillable = ['title', 'author', 'year']; 
}

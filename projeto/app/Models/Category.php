<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'color'
    ];

    public function tasks()
    {
        // Chave estrangeira 'categories_id' na tabela 'tasks'
        return $this->hasMany(Task::class, 'categories_id'); 
    }
}

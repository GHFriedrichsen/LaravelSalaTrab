<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'done',
        'categories_id',
    ];

    public function category()
    {
        // A chave estrangeira é 'categories_id' e o Model relacionado é 'Category'
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
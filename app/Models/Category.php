<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Products::class, 'category_id');
    }
}

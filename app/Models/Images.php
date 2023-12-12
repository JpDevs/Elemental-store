<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    protected $primaryKey = 'id';

    protected $fillable = ['path', 'product_id', 'active'];

    public function products()
    {
        return $this->belongsTo(Products::class, 'products_id');
    }
}

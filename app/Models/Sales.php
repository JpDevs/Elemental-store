<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';

    protected $primaryKey = 'id';

    protected $fillable = ['products_id', 'player_id', 'sales_status_id','date'];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Products::class, 'products_id');
    }

    public function salesStatus()
    {
        return $this->belongsTo(SalesStatus::class, 'sales_status_id');
    }

    public function scopeNotProcessed($query)
    {
        return $query->where('sales_status_id', 3);
    }
}

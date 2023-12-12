<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesStatus extends Model
{
    protected $table = 'sales_status';

    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public function sales()
    {
        return $this->hasMany(Sales::class, 'sales_status_id');
    }
}

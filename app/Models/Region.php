<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_reg';
    protected $fillable = [
        'id_com',
        'id_reg',
        'description',
        'status'
    ];


    public function communes()
    {
        return $this->hasMany(Communes::class, 'id_reg');
    }
}

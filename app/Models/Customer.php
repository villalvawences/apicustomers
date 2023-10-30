<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // protected $primaryKey = ['dni', 'id_com', 'id_reg'];

    protected $fillable = [
        'dni',
        'id_com',
        'id_reg',
        'email',
        'name',
        'last_name',
        'address',
        'date_reg',
        'status',
        'deleted'
    ];


    public function communes()
    {
        return $this->belongsTo(Commune::class, 'id_com', 'id_reg');
    }
}

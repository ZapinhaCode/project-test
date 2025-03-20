<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
use Carbon\Carbon;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = ['nome', 'preco'];

    protected $casts = [
        'preco' => 'decimal:2',
    ];

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }
}

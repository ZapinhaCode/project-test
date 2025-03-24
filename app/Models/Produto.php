<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = ['nome', 'preco'];

    protected $casts = [
        'preco' => 'decimal:2',
    ];

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'modelo',
        'placa',
        'renavam',
        'observacao',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

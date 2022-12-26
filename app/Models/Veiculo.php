<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    public function manutencoes()
    {
        return $this->hasMany(Manutencao::class, 'idVeiculo');
    }
}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';

    protected $fillable = ['nome', 'cpf', 'email', 'tipo', 'password'];

    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class, 'usuario_id');
    }
}

<?php

namespace App\Models;

use App\Models\Inscricao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{

    use HasFactory;

    protected $table = "evento";

    protected $fillable = ['nome', 'local', 'status', 'data'];

    public function inscricoes(){
        return $this->hasMany(Inscricao::class, 'evento_id');
    }
}

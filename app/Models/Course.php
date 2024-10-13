<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Indicar o nome da tabela
    protected $table = 'courses';

    // Indicar quais colunas podem ser cadastradas
    protected $fillable = ['name', 'price'];

    // Criar relacionamento entre um e muitos
    public function classe(){
        return $this->hasMany(Classe::class);
    }
}

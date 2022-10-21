<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = "cidades";
    protected $fillable = ["nome", "uf"];

    public function envolvidos(){
        return $this->hasMany("App\Envolvido");
    }
}

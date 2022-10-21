<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envolvido extends Model
{
    protected $table = "envolvidos";
    protected $fillable = ['cnpj', 'razao_social', 'cidade_id'];

    public function cidade(){
        return $this->belongsTo("App\Cidade");
    }
}

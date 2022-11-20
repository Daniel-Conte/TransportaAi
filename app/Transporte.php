<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $table = "transportes";
    protected $fillable = ['remetente_id', 'destinatario_id', 'transportadora_id', 'veiculo_id'];

    public function remetente(){
        return $this->belongsTo("App\Envolvido");
    }

    public function destinatario(){
        return $this->belongsTo("App\Envolvido");
    }

    public function transportadora(){
        return $this->belongsTo("App\Envolvido");
    }

    public function veiculo(){
        return $this->belongsTo("App\Veiculo");
    }

    public function produtos(){
        return $this->hasMany("App\TransporteProduto");
    }
}

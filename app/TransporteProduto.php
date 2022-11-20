<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransporteProduto extends Model {
    protected $table = "transporte_produtos";
    protected $fillable = ['transporte_id', 'produto_id', 'peso_total', 'quantidade'];

    public function produto(){
        return $this->belongsTo("App\Produto");
    }
}

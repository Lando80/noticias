<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    const STATUS_ATIVO = 'A';
    const STATUS_INATIVO = 'I';
    const STATUS = [
        Noticia::STATUS_ATIVO => "Ativo",
        nOTICIA::STATUS_INATIVO => "Inativo"
    ];
    
    protected $table = 'noticias';
    protected $guarded = ['id','created_at','updated_at'];
    protected $dates = ['create_at', 'update_at', 'data_publicacao']; //modify

    public function getStatusFormatadoAttribute()
    {
        return Noticia::STATUS[$this->status];
    }
    

}

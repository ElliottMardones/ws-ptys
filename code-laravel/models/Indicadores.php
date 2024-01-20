<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicadores extends Model
{
    protected $table = 'indicadores';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        'idcom',
        'Anno',
        'Indicador',
        'Descripcion',
        'Tabla',
        'thead',
        'table_body',
        'table_header',
        'Subtitulos',
        'Fuente'
    ];

    protected $primaryKey = ['idcom', 'Anno', 'Indicador'];
    public $keyType = 'array';


    // Otros métodos necesarios

    public function comuna()
    {
        return $this->belongsTo(Comuna::class, 'idcom', 'idcom');
    }
}
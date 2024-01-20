<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $table = 'datoscomuna';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idcom',
        'Anno',
        'Region',
        'Comuna',
        'Reporte_comunal',
        'Superficie',
        'Gentilicio',
        'Alcalde',
        'Num_concejales',
        'Pertenece_a',
        'Normas_relacionadas'
    ];

    protected $primaryKey = ['idcom', 'Anno'];
    public $keyType = 'array';

    // Agrega aquí cualquier método de relación si es necesario

    public function indicadores()
    {
        return $this->hasMany(Indicadores::class, 'idcom', 'idcom');
    }

}

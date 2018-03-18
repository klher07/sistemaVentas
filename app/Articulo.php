<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='articulo';

    protected $primaryKey='idarticulo';
    //protected $Foreignkey='idcategoria';

    public $timestamps=false;


    protected $fillable =[
    	'idcategoria',
        'codigo',
    	'nombre',
    	'stock',
        'descripcion',
        'imagen',
        'estado'

    ];

    protected $guarded =[

    ];

    
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $primaryKey = "VentaID";
    protected $fillable = ["VentaID", "ProductoID", "NombreCliente","Cantidad", "PrecioTotal"];
}

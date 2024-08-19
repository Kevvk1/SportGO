<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;


    protected $table = 'ventas';


    protected $fillable = [
        'id_usuario',
        'id_pedido',
        'nombre_apellido',
        'calle_cliente',
        'calle_altura_cliente',
        'provincia',
        'localidad',
        'codigo_postal',
        'piso_departamento',
        'metodo_pago',
        'telefono_contacto',
        'indicaciones_adicionales',
        'monto_total'
    ];

    protected $primaryKey = 'id_venta';

    public $incrementing = true;

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_ultima_actualizacion';

    // Relación con el modelo User
    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    // Relación con el modelo Pedido
    public function pedido()
    {
        return $this->belongsTo(Pedidos::class, 'id_pedido', 'id_pedido');
    }
}

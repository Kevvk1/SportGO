<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'pedidos';

    
    protected $fillable = [
        'estado',
        'id_usuario'
    ];

    protected $primaryKey = 'id_pedido';

    public $incrementing = true;

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_ultima_actualizacion';

    public function cliente(){
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario'); // 'id_usuario' es la clave foránea, 'id_usuario' es la clave primaria en User
    }

    public function productos(){
        return $this->belongsToMany(Productos::class, 'items_pedido', 'id_pedido', 'id_producto') // 'items_pedido' es la tabla pivote, 'id_pedido' es la columna en la tabla pivote que hace referencia a la clave primaria de la tabla 'pedidos', 'id_producto' es la columna en la tabla pivote que hace referencia a la clave primaria de la tabla 'productos'
            ->withPivot('cantidad')
            ->withTimeStamps();
    }

    public function pedidoPendiente(){
        return $this->hasOne(PedidosPendientes::class, 'id_pedido', 'id_pedido');
    }

    public function pedidoFinalizado(){
        return $this->hasOne(PedidosFinalizados::class, 'id_pedido', 'id_pedido');
    }
}


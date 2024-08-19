<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosPendientes extends Model
{
    use HasFactory;

    protected $table = 'pedidos_pendientes';

    
    protected $fillable = [
        'id_pedido',
        'id_usuario'
    ];

    protected $primaryKey = 'id_pedido_pendiente';

    public $incrementing = true;

    protected $keyType = 'integer';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_ultima_actualizacion';

    public function cliente(){
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedidos::class, 'id_pedido', 'id_pedido');
    }


}

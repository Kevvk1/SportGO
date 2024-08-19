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
        return $this->belongsToMany(Productos::class, 'itemsPedido', 'id_pedido', 'id_producto')
            ->withPivot('cantidad')
            ->withTimeStamps();
    }
}

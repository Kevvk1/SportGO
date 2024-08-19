<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'productos';

    
    protected $fillable = [
        'codigo_producto',
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'stock_disponible',
    ];

    protected $hidden = ['type'];

    protected $primaryKey = 'codigo_producto';

    public $incrementing = false;

    protected $keyType = 'integer';

    public function pedidos(){
        return $this->belongsToMany(Pedidos::class, 'itemsPedido', 'id_pedido', 'id_producto')
            ->withPivot('cantidad', 'precio')
            ->withTimeStamps();
    }
}

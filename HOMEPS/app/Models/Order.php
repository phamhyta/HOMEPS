<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    const AMOUNT = 30000;
    protected $fillable = [
        'id_pc', 
        'ids_product',
        'status', 
        'created_at',
        'updated_at',
    ];
    public $timestamps = true;

    const ROLE_NAME = [
        1 => 'ordered',
        2 => 'Delivered',
        3 => 'Paid',
    ];

    public function pc()
    {
        return $this->hasMany('App\Models\Pc', 'id', 'id_pc');
    }

    public static function getRoleName($role)
    {
        return data_get(self::ROLE_NAME, $role, '');
    }

    public function amount($order)
    {
        $ids_product = explode(",", $order->ids_product);
        $amount = 0;
        foreach($ids_product as $id) {
            $product =  Product::where('id', '=', $id)->get();
            $amount = $amount + $product[0]->price;
        }
        return $amount;
    }

    public function amountTimeUse($order) {
        $pc = Pc::where('id', '=', $order->id_pc)->get();
        $time = Carbon::now()->diffInMinutes(new Carbon($pc[0]->use_at));
        return $time*self::AMOUNT/60;
    }
}

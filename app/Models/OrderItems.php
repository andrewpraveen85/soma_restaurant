<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['order_id', 'menu_id', 'order_price'];
    
    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id')->withDefault();
    }
}

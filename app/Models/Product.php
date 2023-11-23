<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameproduct',
        'content',
        'menu_id',
        'price',
        'hinhanhproduct',
        'soluong',
        'color',
        'size'
    ];
    
    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')->withDefault(['name' => '']);
    }
}

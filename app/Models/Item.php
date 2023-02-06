<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "items";
    protected $primaryKey = "item_id";
    protected $fillable = [
        'item_name',
        'item_desc',
        'price',
        'image_url',
    ];
}

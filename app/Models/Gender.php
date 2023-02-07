<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "genders";
    protected $primaryKey = "gender_id";
    protected $fillable = [
        'gender_desc',
    ];

    public function accounts() {
        return $this->hasMany(Account::class, 'gender_id');
    }
}

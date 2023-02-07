<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "accounts";
    protected $primaryKey = "account_id";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'display_picture_link',
        'role_id',
        'gender_id',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function items() {
        return $this->belongsToMany(Item::class, 'orders', 'account_id', 'item_id');
    }

    public function gender() {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function genderDesc(): Attribute {
        return new Attribute(
            get: fn() => $this->gender->gender_desc
        );
    }
    public function roleName(): Attribute {
        return new Attribute(
            get: fn() => $this->role->role_name
        );
    }
}

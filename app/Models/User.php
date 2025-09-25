<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'whatsapp',
        'foto',
        'alamat',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }

    protected static function booted()
    {
        static::creating(function($user){
            if(empty($user->username)) {
                $base = strtolower(preg_replace('/[^A-Za-z0-9]/', '', $user->name));
                $username = $base . mt_rand(1, 999);

                while (User::where('username', $username)->exists()) {
                    $username = $base . mt_rand(1, 999);
                }

                $user->username = $username;
            }
        });
    }
}
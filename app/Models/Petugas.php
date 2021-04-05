<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Petugas extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['nama_petugas','username','password','level'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

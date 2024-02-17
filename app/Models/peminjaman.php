<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID', 'bukuID', 'tanggal_peminjaman', 'tanggal_pengembalian', 'status_peminjaman'
    ];
}


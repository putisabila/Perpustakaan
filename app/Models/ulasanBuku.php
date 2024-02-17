<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ulasanBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID', 'bukuID', 'ulasan', 'rating'
    ];
}

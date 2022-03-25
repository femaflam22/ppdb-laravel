<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'NamaLengkap', 'JK', 'AlamatLengkap', 'Agama', 'AsalSMP', 'Jurusan'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'issuer',
        'issued_at',
        'image',
        'credential_url',
    ];

    protected $casts = [
        'issued_at' => 'date',
    ];
}

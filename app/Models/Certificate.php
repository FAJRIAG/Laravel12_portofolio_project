<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory, \App\Traits\Translatable;

    protected $fillable = [
        'title',
        'title_id',
        'title_ja',
        'issuer',
        'issuer_id',
        'issuer_ja',
        'issued_at',
        'image',
        'credential_url',
    ];

    protected $casts = [
        'issued_at' => 'date',
    ];
}

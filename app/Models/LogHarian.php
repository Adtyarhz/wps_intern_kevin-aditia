<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogHarian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal',
        'deskripsi',
        'file_bukti',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'status' => 'string',
    ];

    protected $attributes = [
        'status' => 'pending',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
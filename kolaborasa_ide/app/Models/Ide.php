<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ide extends Model
{
    protected $fillable = [
        'user_id', 'judul', 'kategori', 'ringkasan',
        'gambar', 'dokumen', 'nama_asli_dokumen',
    ];

    public const KATEGORI = [
        'Transportasi', 'Lingkungan', 'Pendidikan', 'Kesehatan',
        'Ekonomi', 'Pemerintahan', 'Teknologi',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
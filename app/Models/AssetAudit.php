<?php

namespace App\Models;

use Database\Factories\AssetAuditFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssetAudit extends Model
{
    /** @use HasFactory<AssetAuditFactory> */
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'audit_date' => 'date',
    ];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

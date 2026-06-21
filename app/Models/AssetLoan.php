<?php

namespace App\Models;

use Database\Factories\AssetLoanFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssetLoan extends Model
{
    /** @use HasFactory<AssetLoanFactory> */
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'loan_date' => 'date',
        'return_date' => 'date',
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

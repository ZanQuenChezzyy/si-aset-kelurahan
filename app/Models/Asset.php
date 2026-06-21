<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'purchase_date' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->asset_code)) {
                $year = date('Y');
                $lastAsset = self::whereYear('created_at', $year)->orderBy('id', 'desc')->first();
                $sequence = $lastAsset ? intval(substr($lastAsset->asset_code, -4)) + 1 : 1;
                $model->asset_code = 'ASET-'.$year.'-'.str_pad($sequence, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function loans()
    {
        return $this->hasMany(AssetLoan::class);
    }

    public function maintenances()
    {
        return $this->hasMany(AssetMaintenance::class);
    }

    public function mutations()
    {
        return $this->hasMany(AssetMutation::class);
    }

    public function audits()
    {
        return $this->hasMany(AssetAudit::class);
    }

    public function disposals()
    {
        return $this->hasMany(AssetDisposal::class);
    }
}

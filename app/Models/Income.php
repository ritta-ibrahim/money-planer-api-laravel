<?php

namespace App\Models;

use App\Traits\BlamableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory, BlamableTrait;

    protected $fillable = [
        "title",
        "amount",
        "curency_id",
    ];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

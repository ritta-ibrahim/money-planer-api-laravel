<?php

namespace App\Models;

use App\Traits\BlamableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory, BlamableTrait;

    protected $fillable = [
        "name",
        "code",
        "exchange",
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }
}

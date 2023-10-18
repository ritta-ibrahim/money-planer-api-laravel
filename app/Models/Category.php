<?php

namespace App\Models;

use App\Traits\BlamableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, BlamableTrait;

    protected $fillable = [
        "name",
    ];


    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}

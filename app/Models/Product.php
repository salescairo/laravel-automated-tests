<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'value'
    ];
    protected $casts = [
        'name' => 'string',
        'value' => 'float'
    ];

    public function getValue(): float
    {
        return $this->attributes['value'];
    }
}

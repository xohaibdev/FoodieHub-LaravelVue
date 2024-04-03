<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'address', 'email', 'webhook_endpoint'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hashids\Hashids;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'price', 'restaurant_id'];

    protected $appends = [
        'hashed_id',
    ];

    public function getHashedIdAttribute()
    {
        $hashids = new Hashids('', 5);
        return $hashids->encode($this->id);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function addons()
    {
        return $this->hasMany(Addon::class);
    }

}

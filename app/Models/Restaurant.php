<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hashids\Hashids;

class Restaurant extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'address', 'email', 'webhook_endpoint'];

    protected $appends = [
        'hashed_id',
    ];

    public function getHashedIdAttribute()
    {
        $hashids = new Hashids('', 5);
        return $hashids->encode($this->id);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}

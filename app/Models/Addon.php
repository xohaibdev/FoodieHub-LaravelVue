<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hashids\Hashids;

class Addon extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'item_id'];

    protected $appends = [
        'hashed_id',
    ];

    public function getHashedIdAttribute()
    {
        $hashids = new Hashids('', 5);
        return $hashids->encode($this->id);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}

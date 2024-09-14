<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    public function items()
{
    return $this->hasMany(Item::class);
}
public function user()
    {
        return $this->belongsTo(User::class);
    }

}

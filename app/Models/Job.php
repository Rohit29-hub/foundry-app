<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
//    protected $primaryKey = 'title';
//    $key

    protected $guarded = [];
    protected $table="clientjobs";

    protected $casts = ['due_date'=>'datetime'];



//    public function getAttributeClientID()
//    {
//        return $this->client->id;
//    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function client()
    {
        return $this->order->client();
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function comments()
    {
        return $this->hasMany(Jobcomment::class);
    }
}

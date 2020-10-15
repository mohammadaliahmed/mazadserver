<?php

namespace App\Models;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\AuctionImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(AuctionImage::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}

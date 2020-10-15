<?php

namespace App\Models;

use App\Models\Auction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuctionImage extends Model
{
    use HasFactory;

    public $table = "auction_pictures";

    protected $fillable = [
        'auction_id',
        'image'
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class, 'auction_id');
    }
}

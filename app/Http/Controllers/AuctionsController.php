<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Auction;
use App\Models\Country;
use App\Models\AuctionImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuctionsController extends Controller
{
    public $auction;
    public function __construct(Auction $auction)
    {
        $this->auction = $auction;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctions = $this->auction->with(['city', 'state', 'country', 'images'])->get();
        
        if(request()->wantsJson())
        {
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => [
                    'auctions' => $auctions
                ]
            ]);
        }

        return view('backend.auctions.index', compact('auctions'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();

        if(request()->wantsJson())
        {
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => [
                    'countries' => $countries
                ]
            ]);
        }

        return view('backend.auctions.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auction = Auction::create($request->input());

        if($request->hasFile('images'))
        {
            $imagePath = [];
            foreach($request->file('images') as $image)
            {
                $imagePath = $image->store('images', 'public');
                AuctionImage::create([
                    'auction_id' => $auction->id,
                    'image' => $imagePath
                ]);
            }
        }

        return redirect()->route('auction.index')->with(['message' => 'Auction Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        $countries = Country::get();

        $states = State::where('country_id', $auction->country_id)->get();
        $cities = City::where('state_id', $auction->state_id)->get();
        return view('backend.auctions.edit', compact('countries', 'auction', 'states', 'cities'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auction $auction)
    {
        $id = $auction->id;
        $auction = $auction->update($request->input());

        if($request->hasFile('images'))
        {
            $imagePath = [];
            foreach($request->file('images') as $image)
            {
                $imagePath = $image->store('images', 'public');
                AuctionImage::create([
                    'auction_id' => $id,
                    'image' => $imagePath
                ]);
            }
        }
        
        return redirect()->route('auction.index')->with(['message' => 'Auction Created']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        //
    }
}

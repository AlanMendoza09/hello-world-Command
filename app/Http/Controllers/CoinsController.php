<?php

namespace App\Http\Controllers;

use App\Jobs\CoinCalculator;
use Illuminate\Http\Request;
use App\Models\Coin;

class CoinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coins = Coin::all();
        return view('coins.index', ['coins' => $coins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = $request->input();
        $coin = new Coin();
        $coin->short_name = $arr['short_name'];
        $coin->name = $arr['name'];
        $coin->save();

        CoinCalculator::dispatch();
        return redirect()->route('coins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Coin $coin)
    {
        return view('coins.show', ['coin' => $coin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coin $coin)
    {
        return view('coins.edit', ['coin' => $coin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coin $coin)
    {
        $arr = $request->input();
        $coin->short_name = $arr['short_name'];
        $coin->name = $arr['name'];
        $coin->save();
        return redirect()->route('coins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coin $coin)
    {
        $coin->delete();
        return redirect()->route('coins.index');
    }
}

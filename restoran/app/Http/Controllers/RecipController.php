<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recip;
use App\Models\Food;

class RecipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Food $item)
    {
        $recips=Recip::with('food')->where('food_id','=',$item->id)->get();
        return view('recip',compact('recips','item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'desc'=>'required',
            'food'=>'required'
        ]);
        Recip::create([
            'food_id'=>$request->food,
            'recipe'=>$request->name,
            'desc'=>$request->desc
        ]);
        return back()->with('status', 'Recip create!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recip $recip)
    {
        
        Recip::destroy($recip->id);
        return back()->with('status', 'Recip Delete!');
    }
}

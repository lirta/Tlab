<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Models\Recip;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food=Food::with('category')->get();
        $categories=Category::all();
        // dd($food);
        return view('food',compact('food','categories'));
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
        // dd($request);
        $request->validate([
            'name'=>'required',
            'category'=>'required'
        ]);
        Food::create([
            'category_id'=>$request->category,
            'food'=>$request->name
        ]);
        return redirect('/food')->with('status', 'Food create!');
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
    public function edit(Food $item)
    {
        $categories=Category::all();
        return view('edit_food',compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $item)
    {
        $request->validate([
            'name'=>'required',
            'category'=>'required'
        ]);
        Food::where('id', $item->id)->update([
            'category_id'=>$request->category,
            'food'=>$request->name
        ]);
        return redirect('/food')->with('status', 'Food Succes Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $item)
    {
        Food::destroy(($item->id));
        return redirect('/food')->with('status', 'Food Succes Delete');
    }
}

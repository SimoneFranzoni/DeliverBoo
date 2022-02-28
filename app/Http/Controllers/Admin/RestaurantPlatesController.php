<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plate;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantPlatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
       {
            $ristorante= Restaurant::find($id)->with(['plates'])->first();
            // $piatti = Plate::where('restaurant_id',$id)->get();  
            // $piatti = $ristorante->plates();              
            return view('admin.plates.index',compact('ristorante'));
            
        }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($piatto,$nomeRistorante)
    {
       
       return view('admin.plates.show',compact('piatto','nomeRistorante'));
      
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
    public function destroy($id)
    {
        //
    }
}

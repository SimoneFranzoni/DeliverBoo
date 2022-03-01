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
    public function index($slug)
       {
          
            $ristorante= Restaurant::where('slug',$slug)->first();
            $piatti = Plate::where('restaurant_id',$ristorante->id)->orderBy('category')->get();           
            return view('admin.plates.index',compact('ristorante','piatti'));
            
        }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $ristorante= Restaurant::where('slug',$slug)->first();
        return view('admin.plates.create',compact('ristorante'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slugRistorante,$slugPiatto)
    {
        $ristorante= Restaurant::where('slug',$slugRistorante)->first();
        $piatto = Plate::where('slug',$slugPiatto)->first();
        return view('admin.plates.show',compact('piatto','ristorante'));
    }
        
      

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slugRistorante,$slugPiatto)
    {
        $ristorante= Restaurant::where('slug',$slugRistorante)->first();
        $piatto = Plate::where('slug',$slugPiatto)->first();
        return view('admin.plates.edit',compact('piatto','ristorante'));
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

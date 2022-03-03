<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plate;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $piatti = Plate::where('restaurant_id',$ristorante->id)->orderBy('category')->paginate(3);      
            
            $piatti->each(function($piatto){
                $piatto->cover = $this->makeImagePath($piatto->cover);
            });

            return view('admin.plates.index',compact('ristorante','piatti'));
            
        }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $categories = [
            'Antipasto', 'Primo', 'Secondo', 'Contorno', 'Frutta', 'Dessert'
          ];
        $ristorante= Restaurant::where('slug',$slug)->first();
        $ristorante->cover = $this->makeImagePath($ristorante->cover);

        return view('admin.plates.create',compact('ristorante','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$idRistorante)
    {
        $request->validate($this->generateErrorMessages()['field'],$this->generateErrorMessages()['messages']);
        $ristorante= Restaurant::where('id',$idRistorante)->first();
        $data = $request->all();

        if(array_key_exists('cover', $data)){
            
            // preno il nome originale dell'immagine
            $data['cover_original_name'] = $request->file('cover')->getClientOriginalName();
            
            // salvare l'immagine e salvare il percorso
            $image_path = Storage::put('uploads', $data['cover']);
            $data['cover'] = url('storage/' . $image_path);
        }else{
            $data['cover'] = 'https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+plates';
            $data['cover_original_name'] = "DeliveBoo Restaurant";
        }

        $nuovoPiatto = new Plate();
        $nuovoPiatto->fill($data);
        $nuovoPiatto->slug = Plate::generateSlug($nuovoPiatto->name);
        $nuovoPiatto->restaurant_id = $ristorante->id;
        $nuovoPiatto->save();
        
        return redirect()->route('admin.miei-ristoranti.piatti.index',[$ristorante->slug,$nuovoPiatto]);
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
        $categories = [
            'Antipasto', 'Primo', 'Secondo', 'Contorno', 'Frutta', 'Dessert'
          ];
        $ristorante= Restaurant::where('slug',$slugRistorante)->first();
        $piatto = Plate::where('slug',$slugPiatto)->first();
        return view('admin.plates.edit',compact('piatto','ristorante','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idRistorante,$idPiatto)
    {
        $request->validate($this->generateErrorMessages()['field'],$this->generateErrorMessages()['messages']);
        $ristorante= Restaurant::where('id',$idRistorante)->first();
        $piattoDaModificare = Plate::where('id',$idPiatto)->first();
        $data = $request->all();

        if(array_key_exists('cover', $data)){
            // elimino la vecchia immagine (se esiste)
            if($piattoDaModificare->cover){
                Storage::delete($piattoDaModificare->cover);
            }
            //  prendere il nome della vecchia immagine
            $data['cover_original_name'] = $request->file('cover')->getClientOriginalName(); 
            //  salvare l'immagine da salvare e prendere il percorso da fillare
            $image_path = Storage::put('uploads', $data['cover']);
            $data['cover'] = $image_path;

        }
        $piattoModificato = $piattoDaModificare->update($data);

        return redirect()->route('admin.miei-ristoranti.piatti.index',[$ristorante->slug,$piattoModificato]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idRistorante,$idPiatto)
    {
        $ristorante= Restaurant::where('id',$idRistorante)->first();
        $piattoDaEliminare = Plate::where('id',$idPiatto)->first();

        if($piattoDaEliminare->cover){
            Storage::delete($piattoDaEliminare->cover);
        }
        
        $piattoDaEliminare->delete();
        return redirect()->route('admin.miei-ristoranti.piatti.index',[$ristorante->slug])->with('deleted',"il piatto $piattoDaEliminare->name è stato eliminato");;
    }


    //funzione per il controllo dei messaggi d'errore
    public function generateErrorMessages(){
        return [
            "field"=>[
                "name"=>"required|max:100|min:3",
                "description"=>"required|max:1000|min:10",
                "ingrediants"=>"required|max:1000|min:5",
                "price"=>"required|numeric|min:0|max:99.99",
                "category"=>"required",
                'cover' => 'nullable|mimes:jpeg,jpg,bmp,svg,webp,png|max:32000'
                ],
            "messages"=>[
                "name.required"=>"Il nome è obbligatorio",
                "name.min"=>"Il titolo deve contenere minimo :min caratteri",
                "name.max"=>"Il titolo deve contenere massimo :max caratteri",

                "description.required"=>"La descrizione è obbligatoria",
                "description.min"=>"La descrizione deve contenere minimo :min caratteri",
                "description.max"=>"La descrizione deve contenere massimo :max caratteri",

                "ingrediants.required"=>"Gli ingredienti sono obbligatori",
                "ingrediants.min"=>"Il campo ingredienti deve contenere minimo :min caratteri",
                "ingrediants.max"=>"Il campo ingredienti deve contenere massimo :max caratteri",

                "price.required"=>"Il prezzo è obbligatorio",
                "price.min"=>"Il prezzo non puo' essere negativo",
                "price.max"=>"Il prezzo non puo' essere superiore a 99.99 euro",
                
                "category.required"=>"La categoria è obbligatoria",   
                
                'cover.mimes' => 'Il file deve essere una immagine jpeg, jpg, bmp, svg, webp o png',
                'cover.max' => 'Dimensione del file troppo grande'
                ]
        ];
    }

    private function makeImagePath($cover){
            if($cover){
                $cover = url('storage/' . $cover);
            }else{
                $cover = 'https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+plates';
            }
        
        return $cover;
    }
    
}

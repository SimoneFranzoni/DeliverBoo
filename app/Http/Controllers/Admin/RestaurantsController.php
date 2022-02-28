<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ristoranti = [
           [
              "id" => 1,
              "nome" => "il gambero rosso",
              "indirizzo" => "via Goldoni 23 , Cagliari",
              "telefono" => "070293934823",
              "piatti"  => [
                             "primi" => ["Carbonara"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit? ",
                                        "Lasagne" =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit c" ,
                                         "Insalata di riso" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit "
                            ],
                             "secondi" => [
                                 "Dolor sit amet" => "Lorem ipsum dolor sit amet ",
                                 "Ipsum"  =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisqtium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit?",
                                 "Lorem" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit?"
                            ],
                             "contorni" => [
                                 "Zucca al forno" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit?" ,
                                 "Rosti" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit?"
                            ]
                           ]
           
                             ],
          [
            "id" => 2,
            "nome" => "Da Mario",
            "indirizzo" => "via Della Rinascita 23 , Roma",
            "telefono" => "293934823",
            "piatti"  => [
                           "primi" => ["Spaghetti al sugo"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit? ",
                                      "Fregola" =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit c" ,
                                       "Zuppa di verdure" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit "
                          ],
                           "secondi" => [
                               "Sformato di patate" => "Lorem ipsum dolor sit amet ",
                               "Mugine arrosto"  =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisqtium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit?",
                               "Pollo al carry" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit?"
                          ],
                           "contorni" => [
                               "Broccoli gratinati" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit?" ,
                               "Peperonata" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit?"
                          ]
                         ]
         
         ] ,
         [
            "id" => 3,
            "nome" => "L'arcobaleno",
            "indirizzo" => "via Giusti 23 , Oristano",
            "telefono" => "07094823",
            "piatti"  => [
                           "primi" => ["Carbonara"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit? ",
                                      "Lasagne" =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit c" ,
                                       "Insalata di riso" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit "
                          ],
                           "secondi" => [
                               "Spezzatino vitello e patate" => "Lorem ipsum dolor sit amet ",
                               "Brasato al barolo"  =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisqtium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit?",
                               "Pollo al limone" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit?"
                          ],
                           "contorni" => [
                               "Cavolfiore gratinato" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit?" ,
                               "Verza con patate" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit?"
                          ]
                         ]
         
         ] 
        ];
    
        return view('admin.restaurants.index',compact('ristoranti'));
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
        //
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
    public function destroy($id)
    {
        //
    }
}

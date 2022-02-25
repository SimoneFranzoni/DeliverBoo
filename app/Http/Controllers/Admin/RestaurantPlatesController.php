<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantPlatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nome)
    {
        
        $ristoranti = [
            
            [
               "id" => 1,
               "nome" => "il gambero rosso",
               "indirizzo" => "via Goldoni 23 , Cagliari",
               "telefono" => "070293934823",
               "piatti"  => [
                            "primi" => [
                                  [
                                  "nome"=>"Carbonara",
                                  "descrizione"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit? "
                                ],
                                [ 
                                "nome"=>"Lasagne",   
                                "descrizione" =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit c" 
                                ],
                                [
                                "nome"=>"Insalata di riso",
                                "descrizione" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eo]
                                s aspernatur distinctio sed vel aperiam reprehenderit "
                                ] 
                            ],
                            "secondi" => [
                                [
                                "nome"=>"Carne arrosto",
                                "descrizione"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, volueaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit? "
                              ],
                              [ 
                              "nome"=>"Brasato",   
                              "descrizione" =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit c" 
                              ],
                              [
                              "nome"=>"Polpo",
                              "descrizione" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptaa impedit cumque temporibus, accusantium eo]
                              s aspernatur distinctio sed vel aperiam reprehenderit "
                              ] 
                          ],
                          "contorni" => [
                            [
                            "nome"=>"Zucca arrosto",
                            "descrizione"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae t exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit? "
                          ],
                          [ 
                          "nome"=>"Patatine fritte",   
                          "descrizione" =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit c" 
                          ],
                     
                      ],
                ]
            
           ],
           [
             "id" => 2,
             "nome" => "Da Mario",
             "indirizzo" => "via Della Rinascita 23 , Roma",
             "telefono" => "293934823",
             "piatti"  => [
                "primi" => [
                    [
                    "nome"=>"Carbonara2",
                    "descrizione"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eos aspernatur distinctio sed vel aperiam reprehenderit exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit? "
                  ],
                  [ 
                  "nome"=>"Lasagne2",   
                  "descrizione" =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit c" 
                  ],
                  [
                  "nome"=>"Insalata di riso2",
                  "descrizione" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque temporibus, accusantium eo]
                  s aspernatur distinctio sed vel aperiam reprehenderit "
                  ] 
              ],
              "secondi" => [
                  [
                  "nome"=>"Carne arrosto2",
                  "descrizione"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, volueaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit? "
                ],
                [ 
                "nome"=>"Brasato2",   
                "descrizione" =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit c" 
                ],
                [
                "nome"=>"Polpo2",
                "descrizione" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptaa impedit cumque temporibus, accusantium eo]
                s aspernatur distinctio sed vel aperiam reprehenderit "
                ] 
            ],
            "contorni" => [
              [
              "nome"=>"Zucca arrosto2",
              "descrizione"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae t exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit? "
            ],
            [ 
            "nome"=>"Patatine fritte2",   
            "descrizione" =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit c" 
            ],
       
        ],
                          ]
          
          ] ,
          [
             "id" => 3,
             "nome" => "L'arcobaleno",
             "indirizzo" => "via Giusti 23 , Oristano",
             "telefono" => "07094823",
             "piatti"  => [
                "primi" => [
                    [
                    "nome"=>"Carbonara3",
                    "descrizione"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit cumque tespiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit? "
                  ],
                  [ 
                  "nome"=>"Lasagne3",   
                  "descrizione" =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit c" 
                  ],
                  [
                  "nome"=>"Insalata di riso3",
                  "descrizione" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sm reprehenderit "
                  ] 
              ],
              "secondi" => [
                  [
                  "nome"=>"Carne arrosto3",
                  "descrizione"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, volueaque perspiciatis ex voluptatesnatur illum velit? "
                ],
                [ 
                "nome"=>"Brasato3",   
                "descrizione" =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt teneest voluptatum. Numquam saepe vitae soluta officia impedit c" 
                ],
                [
                "nome"=>"Polpo3",
                "descrizione" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptaa impedit cumque temporibus, accusantium eo]
                s aspetinctio sed vel aperiam reprehenderit "
                ] 
            ],
            "contorni" => [
              [
              "nome"=>"Zucca arrosto3",
              "descrizione"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae t exercitationem iusto laboriosam eaque perspiciatis ex voluptates ab dolorum quae possimus. Non aspernatur illum velit? "
            ],
            [ 
            "nome"=>"Patatine fritte3",   
            "descrizione" =>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, voluptas. Hic quisquam aspernatur, sunt tenetur blanditiis magnam est voluptatum. Numquam saepe vitae soluta officia impedit c" 
            ],
       
        ],
                          ]
          
          ] 
         ];
        
        
        foreach($ristoranti as $ristorante){
            if(strval($ristorante['nome']) == $nome){
                
            return view('admin.plates.index',compact('ristorante'));
            }
        }
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

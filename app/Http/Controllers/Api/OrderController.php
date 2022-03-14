<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Order;
use Braintree\Gateway;

class OrderController extends Controller
{
    Public function generate(Request $request, Gateway $gateway){
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token,
        ];
        return response()->json($data, 200);
        // return ('generate');
        }

    public function makePayment(Request $request, Gateway $gateway){


        $request->validate($this->validationData(), $this->validationError());


    //Prendo tutti i dati che arrivano dal Form del pagamento
        $data=$request->all();
        $result=$gateway->transaction()->sale([
            'amount' => $request->total_price,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options'=> [
                'submitForSettlement' => true,
            ],
        ]);
       
        if($result->success){

            $new_order = new Order();
            $new_order->restaurant_id = $data['restaurant_id'];
            $new_order->name = $data['name'];
            $new_order->surname = $data['surname'];
            $new_order->address = $data['address'];
            $new_order->CAP = $data['CAP'];
            $new_order->city = $data['city'];
            $new_order->province = $data['province'];
            $new_order->phone = $data['phone'];
            $new_order->doorbell = $data['doorbell'];
            $new_order->email = $data['email'];
            $new_order->note = $data['note'];
            $new_order->total_price = $data['total_price'];
            $new_order->slug = 'grazie-Luigi';
            // $new_order->slug = Order::generateSlug($new_order->name);
            $new_order->save();

            //Per a tabella Plate_order
            foreach ($data['cart'] as $item) {
                $new_order->plates()->attach($item["id"], ['quantity' => $item["quantity"]]);
            }


            $data2= [
                'success'=>true,
                'message' => 'Operazione eseguita con successo',
            ];
            return response()->json($data2);
        } else {
            $data = [
                'success' => false,
                'messagge' => 'Operazione fallita',
            ];
            return response()->json($data);
        }
    }



    public function validationData(){
        return[
            'restaurant_id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'CAP' => 'required',
            'city' => 'required',
            'province' => 'required',
            'phone' => 'required',
            'doorbell' => 'required',
            'email' => 'required',
            'note' => 'required',
            'total_price' => 'required'
        ]; 
    }

    public function validationError(){
        return[
            'restaurant_id.required' => 'Errore in IdRistorante',
            'name.required' => 'Errore in name',
            'total_price.required' => 'Errore in prezzo totale',
            'surname.required' => 'Errore in cognome',
            'address.required' => 'Errore in indirizzo',
            'CAP.required' => 'Errore in cap',
            'city.required' => 'Errore in città',
            'province.required' => 'Errore in provincia',
            'phone.required' => 'Errore in telefono',
            'doorbell.required' => 'Errore in doorbell',
            'email.required' => 'Errore in email',
            'note.required' => 'Errore in note',

        ];
    }
}

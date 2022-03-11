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
    //Prendo tutti i dati che arrivano dal Form del pagamento
        $data=$request->all();



        $result=$gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
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
            $new_order->slug = Order::generateSlug($new_order->name);
            $new_order->save();

            //Per a tabella Plate_order
            foreach ($data['cart'] as $item) {
                $new_order->plates()->attach($item["id"], ['quantity' => $item["quantity"]]);
            }


            $data2= [
                'success'=>true,
                'message' => 'Operazione eseguita con successo',
            ];
            return response()->json($data);
        } else {
            $data = [
                'success' => false,
                'messagge' => 'Operazione fallita',
            ];
            return response()->json($data);
        }
    }
}

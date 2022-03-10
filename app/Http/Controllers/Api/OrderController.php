<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
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

    public function makePayment(OrderRequest $request, Gateway $gateway){
        $result=$gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options'=> [
                'submitForSettlement' => true,
            ],
        ]);

        if($result->success){
            $data= [
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

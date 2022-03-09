<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Braintree\Gateway;

class OrderController extends Controller
{
    Public function generate(Request $request, Gateway $gateway){
        $token = $gateway->clientToken()->generate();
        $data = [
        'token' => $token,
        ];
        return response()->json($data, 200);
        // return ('generate');
        }

    public function makePayment(Request $request, Gateway $gateway){
        return 'make payment';
    }
}

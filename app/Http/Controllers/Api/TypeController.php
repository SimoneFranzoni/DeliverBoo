<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(){
        $types = Type::all();

        foreach ($types as $type) {
          $type["isVisible"] = true;
        }
        return response()->json(compact('types'));
    }
}

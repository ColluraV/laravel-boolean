<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cocktail;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class CocktailController extends Controller
{
    public function index() {
        $cocktails = Cocktail::all();

        return response()->json($cocktails);
    }

    public function show($id){
        $cocktail = Cocktail::findOrFail($id);

        if(!$cocktail){
            error(404);
        }

        return response()->json($cocktail);
    }
}

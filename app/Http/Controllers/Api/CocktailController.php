<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cocktail;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class CocktailController extends Controller
{
    public function index(Request $request) {
        $category = $request->input('category');

        $query = Cocktail::query();

        if ($category) {
            $query->where('category', 'LIKE', "%$category%");
        } 

        $cocktails = $query->get();

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

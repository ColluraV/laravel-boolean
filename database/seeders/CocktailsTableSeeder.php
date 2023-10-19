<?php

namespace Database\Seeders;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\Models\Cocktail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CocktailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i <= 10; $i++) {

            $client = new Client();
            $response = $client->get('www.thecocktaildb.com/api/json/v1/1/random.php');

            $data = json_decode($response->getBody(), true);


            /*Cocktail::create([

                "name"=>("strDrink"),
                "ingredients"=>[
                    $data["strIngredient1"],
                    $data["strIngredient2"],
                    $data["strIngredient3"],
                    $data["strIngredient4"],
                    $data["strIngredient5"],
                    $data["strIngredient6"],
                    $data["strIngredient7"],
                    $data["strIngredient8"],
                    $data["strIngredient9"],
                    $data["strIngredient10"],
                    $data["strIngredient11"],
                    $data["strIngredient12"],
                    $data["strIngredient13"],
                    $data["strIngredient14"],
                    $data["strIngredient15"],
                ],
                "thumb"=>$data["strDrinkThumb"],
                "category"=>$data["strCategory"],
                "instructions"=>$data["strInstructionsIT"],
                ]);*/

            $newCocktail = new Cocktail();

            $newCocktail->name = $data["drinks"][0]["strDrink"];
            $newCocktail->thumb = $data["drinks"][0]["strDrinkThumb"];
            $newCocktail->category = $data["drinks"][0]["strCategory"];
            $newCocktail->instructions = $data["drinks"][0]["strInstructionsIT"];


            $newCocktail->ingredients = json_encode([
                ($data['drinks'][0]["strIngredient1"]),
                ($data['drinks'][0]["strIngredient2"]),
                ($data['drinks'][0]["strIngredient3"]),
                ($data['drinks'][0]["strIngredient4"]),
                ($data['drinks'][0]["strIngredient5"]),
                ($data['drinks'][0]["strIngredient6"]),
                ($data['drinks'][0]["strIngredient7"]),
                ($data['drinks'][0]["strIngredient8"]),
                ($data['drinks'][0]["strIngredient9"]),
                ($data['drinks'][0]["strIngredient10"]),
                ($data['drinks'][0]["strIngredient11"]),
                ($data['drinks'][0]["strIngredient12"]),
                ($data['drinks'][0]["strIngredient13"]),
                ($data['drinks'][0]["strIngredient14"]),
                ($data['drinks'][0]["strIngredient15"]),
            ]);

            $newCocktail->save();
        }
    }
}
//www.thecocktaildb.com/api/json/v1/1/random.php

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

            $newCocktail = new Cocktail();

            $newCocktail->name = $data["drinks"][0]["strDrink"];
            $newCocktail->thumb = $data["drinks"][0]["strDrinkThumb"];
            $newCocktail->category = $data["drinks"][0]["strCategory"];
            $newCocktail->instructions = $data["drinks"][0]["strInstructionsIT"];


            $ingredients = [];
            $ingredientCounter = 1;

            do {
                $ingredientKey = 'strIngredient' . $ingredientCounter;
                $ingredient = $data['drinks'][0][$ingredientKey] ?? null;

                if($ingredient){
                    $ingredients [] = $ingredient;
                }

                $ingredientCounter++;

            } while ($ingredient != null);

            $newCocktail->ingredients = json_encode($ingredients);

            $newCocktail->save();
        }
    }
}
//www.thecocktaildb.com/api/json/v1/1/random.php

<?php
class PokemonController {
    public static function randomPokemon($twig)
    {
        $id = rand(1, 1010);

        $data = json_decode(
            file_get_contents("https://pokeapi.co/api/v2/pokemon/$id"),true 
        );

        $pokemon = [
            "name" => ucfirst($data['name']),
            "image" => $data['sprites']['front_default'],
            "height" => $data['height'],
            "weight" => $data['weignt']
        ];
        return $twig->render("pokemon.html.twig", [
            "title" => "Pokémon aléatoire",
            "pokemon" => $pokemon
        ]);
    }
}
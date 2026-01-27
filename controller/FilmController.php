<?php

class FilmController {
    public static function getFilmsByCast(){
        $filmRepository = new FilmRepository;
        var_dump($filmRepository->getFilmsByCast("eastwood"));
    
    }
    public static function getRandomFilms(){
        $filmRepository = new FilmRepository;
        
        return $filmRepository->getRandomFilms();
    }
}
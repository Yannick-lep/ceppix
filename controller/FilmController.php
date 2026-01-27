<?php

class FilmController {
    public static function getFilmsByCast(){
        $filmRepository = new FilmRepository;
        var_dump($filmRepository->getFilmsByCast("eastwood"));
    
    }
}
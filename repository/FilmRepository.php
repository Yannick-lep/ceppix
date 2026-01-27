<?php

class FilmRepository extends MainRepository{
    // recherche de films par acteur
    public function getFilmsByCast($cast){
        global $pdo;
        $rq = $pdo->prepare("SELECT * FROM movies_full WHERE cast LIKE :cast");
        $rq->execute([":cast"=>"%$cast%"]);
        return $rq->fetchAll();
    }
    //recherche de 10 films random
    public function getRandomFilms(){
        global $pdo;
        $rq = $pdo->prepare("SELECT * FROM movies_full ORDER BY RAND() LIMIT 10");
        $rq->execute();
        return $rq->fetchAll();
    }
}
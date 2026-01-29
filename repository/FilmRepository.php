<?php
/* namespace App\Repository;

use MainRepository; */

class FilmRepository extends MainRepository{
    // recherche de films par acteur
    public function getFilmsByCast($cast){
        global $pdo;
        $rq = $pdo->prepare("SELECT * FROM movies_full WHERE cast LIKE :cast LIMIT 10");
        $rq->execute([":cast"=>"%$cast%"]);
        return $rq->fetchAll();
    }
    // recherche de films par tout
    public function getFilmsBySearch($search,$filtre){
        global $pdo;
        $allowed = ["title", "plot", "cast", "directors", "year"];
        if (!in_array($filtre, $allowed, true)) {
            $filtre = "title";
        }
        $sql = "SELECT * FROM movies_full WHERE {$filtre} LIKE :search LIMIT 10";
        $rq = $pdo->prepare($sql);
        $rq->execute([":search"=>"%$search%"]);
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

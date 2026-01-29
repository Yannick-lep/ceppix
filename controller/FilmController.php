<?php
/* namespace App\Controller;

use App\Repository\FilmRepository; */

class FilmController {
    public static function getFilmsByCast(){
        $filmRepository = new FilmRepository;
        var_dump($filmRepository->getFilmsByCast("eastwood"));
    
    }
    public static function getRandomFilms($twig){
        $filmRepository = new FilmRepository;
        $randFilms = $filmRepository->getRandomFilms();
        foreach ($randFilms as $key => $value) {
            $imgurl = "./public/assets/posters/".$value['id_movies_full'].".jpg";
            if(file_exists($imgurl)){
                $randFilms[$key]['img']=$imgurl;
            } else {
                $randFilms[$key]['img']="./public/assets/posters/default.jpg";
            }
        }
        return $twig->render("previewFilms.html.twig",["films"=>$randFilms]);
    }
}
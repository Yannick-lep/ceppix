<?php
class SerieController
{
    public static function previewSeries(\Twig\Environment $twig)
    {
        $series = json_decode(file_get_contents("https://api.tvmaze.com/search/shows?q=game"),true);
        foreach ($series as $key => $value) {
            if(empty($value['show']['image']) ||
             !file_get_contents($value['show']['image']['medium'])){
                $series[$key]['show']['image']['medium'] = "./public/assets/posters/default_series.webp";
            }
            if(!isset($value['show']['network'])){
                 $series[$key]['show']['network']['name'] = "inconnu";
            }

        }
        return $twig->render("previewSeries.html.twig",["series"=>$series]);
    }
}

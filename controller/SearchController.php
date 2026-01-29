<?php
class SearchController
{
    public static function formSearch($twig)
    {
        return $twig->render("search/formSearch.html.twig", []);
    }
    public static function resultSearch($twig)
    {
        $results = [];
        $series2 = [];
        if (isset($_POST['submit']) && !empty($_POST['search'])) {

            $filmRepository = new FilmRepository;
            $results = $filmRepository->getFilmsBySearch($_POST['search'], $_POST['filtre']);
            foreach ($results as $key => $value) {
                $imgurl = "./public/assets/posters/" . $value['id_movies_full'] . ".jpg";
                if (file_exists($imgurl)) {
                    $results[$key]['img'] = $imgurl;
                } else {
                    $results[$key]['img'] = "./public/assets/posters/default.jpg";
                }
            }
            $query = urlencode($_POST['search']);
            $series2 = json_decode(file_get_contents("https://api.tvmaze.com/search/shows?q=".$query), true);
            foreach ($series2 as $key => $value) {
                if (
                    empty($value['show']['image']) ||
                    !file_get_contents($value['show']['image']['medium'])
                ) {
                    $series2[$key]['show']['image']['medium'] = "./public/assets/posters/default_series.webp";
                }
                if (!isset($value['show']['network'])) {
                    $series2[$key]['show']['network']['name'] = "inconnu";
                }
            }
        }
        return $twig->render(
            "search/resultSearch.html.twig",
            ["results" => $results,"series2"=>$series2]
        );
    }
}

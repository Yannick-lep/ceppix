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
        if (isset($_POST['submit']) && !empty($_POST['search'])) {
            $filmRepository = new FilmRepository;
            $results = $filmRepository->getFilmsByCast($_POST['search']);
            foreach ($results as $key => $value) {
                $imgurl = "./public/assets/posters/" . $value['id_movies_full'] . ".jpg";
                if (file_exists($imgurl)) {
                    $results[$key]['img'] = $imgurl;
                } else {
                    $results[$key]['img'] = "./public/assets/posters/default.jpg";
                }
            }
        }
        return $twig->render(
            "search/resultSearch.html.twig",
            ["results" => $results]
        );
    }
}

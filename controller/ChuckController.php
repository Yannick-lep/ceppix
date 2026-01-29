<?php
// DECLARATION DE Class
class ChuckController
{
    // Methode statique pour recuperer une blague
    public static function randomJoke($twig)
    {
        $data = json_decode(file_get_contents("https://api.chucknorris.io/jokes/random"), true);
        $joke = $data['value'];
        return $twig->render("footer.html.twig", ["title"=>"Blague de Chuck","joke" => $joke]);
    }
}

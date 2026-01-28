<?php
class SerieController
{
    public static function previewSeries()
    {
        $series = file_get_contents("https://api.tvmaze.com/search/shows?q=girls");
        
        
        return json_decode($series,true);
    }
}

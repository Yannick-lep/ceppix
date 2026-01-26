<?php
/* CREATE TABLE IF NOT EXISTS `movies_full` (
  `id_movie` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `year` int(11) NOT NULL,
  `genres` varchar(255) DEFAULT NULL,
  `plot` text,
  `directors` varchar(255) DEFAULT NULL,
  `cast` varchar(255) DEFAULT NULL,
  `writers` varchar(255) DEFAULT NULL,
  `runtime` int(11) DEFAULT NULL,
  `mpaa` varchar(25) DEFAULT NULL,
  `rating` smallint(3) NOT NULL,
  `popularity` int(11) DEFAULT NULL,
  `modified` datetime NOT NULL,
  `created` datetime DEFAULT NULL,
  `poster_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_movie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13319 ; */

// creation d'une class Film
class Film
{
    public function __construct(
        $slug,
        $title,
        $year,
        $rating,
        $modified,
        $posterFlag,
        $genres = null,
        $plot = null,
        $directors = null,
        $cast = null,
        $writers = null,
        $runtime = null,
        $mpaa = null,
        $popularity = null,
        $created = null,
        $idMovie = null
    ) {
        $this->setIdMovie($idMovie);
        $this->setSlug($slug);
        $this->setTitle($title);
        $this->setYear($year);
        $this->setGenres($genres);
        $this->setPlot($plot);
        $this->setDirectors($directors);
        $this->setCast($cast);
        $this->setWriters($writers);
        $this->setRuntime($runtime);
        $this->setMpaa($mpaa);
        $this->setRating($rating);
        $this->setPopularity($popularity);
        $this->setModified($modified);
        $this->setCreated($created);
        $this->setPosterFlag($posterFlag);
    }

    private $idMovie;
    private $slug;
    private $title;
    private $year;
    private $genres;
    private $plot;
    private $directors;
    private $cast;
    private $writers;
    private $runtime;
    private $mpaa;
    private $rating;
    private $popularity;
    private $modified;
    private $created;
    private $posterFlag = 0;

    public function setIdMovie($idMovie)
    {
        if ($idMovie === null) {
            $this->idMovie = null;
            return;
        }
        $idMovie = (int) $idMovie;
        if ($idMovie > 0) {
            $this->idMovie = $idMovie;
        }
    }
    public function getIdMovie()
    {
        return $this->idMovie;
    }

    public function setSlug($slug)
    {
        if ($slug === null || $slug === '') {
            throw new Exception('Slug obligatoire.');
        }
        if (strlen($slug) > 255) {
            throw new Exception('Slug doit etre inferieur a 255 caracteres.');
        }
        $this->slug = $slug;
    }
    public function getSlug()
    {
        return $this->slug;
    }

    public function setTitle($title)
    {
        if ($title === null || $title === '') {
            throw new Exception('Titre obligatoire.');
        }
        $this->title = $title;
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function setYear($year)
    {
        $year = (int) $year;
        if ($year <= 0) {
            throw new Exception('Annee invalide.');
        }
        $this->year = $year;
    }
    public function getYear()
    {
        return $this->year;
    }

    public function setGenres($genres)
    {
        if ($genres !== null && strlen($genres) > 255) {
            throw new Exception('Genres doit etre inferieur a 255 caracteres.');
        }
        $this->genres = $genres;
    }
    public function getGenres()
    {
        return $this->genres;
    }

    public function setPlot($plot)
    {
        $this->plot = $plot;
    }
    public function getPlot()
    {
        return $this->plot;
    }

    public function setDirectors($directors)
    {
        if ($directors !== null && strlen($directors) > 255) {
            throw new Exception('Directors doit etre inferieur a 255 caracteres.');
        }
        $this->directors = $directors;
    }
    public function getDirectors()
    {
        return $this->directors;
    }

    public function setCast($cast)
    {
        if ($cast !== null && strlen($cast) > 255) {
            throw new Exception('Cast doit etre inferieur a 255 caracteres.');
        }
        $this->cast = $cast;
    }
    public function getCast()
    {
        return $this->cast;
    }

    public function setWriters($writers)
    {
        if ($writers !== null && strlen($writers) > 255) {
            throw new Exception('Writers doit etre inferieur a 255 caracteres.');
        }
        $this->writers = $writers;
    }
    public function getWriters()
    {
        return $this->writers;
    }

    public function setRuntime($runtime)
    {
        if ($runtime === null) {
            $this->runtime = null;
            return;
        }
        $runtime = (int) $runtime;
        if ($runtime <= 0) {
            throw new Exception('Runtime invalide.');
        }
        $this->runtime = $runtime;
    }
    public function getRuntime()
    {
        return $this->runtime;
    }

    public function setMpaa($mpaa)
    {
        if ($mpaa !== null && strlen($mpaa) > 25) {
            throw new Exception('MPAA doit etre inferieur a 25 caracteres.');
        }
        $this->mpaa = $mpaa;
    }
    public function getMpaa()
    {
        return $this->mpaa;
    }

    public function setRating($rating)
    {
        $rating = (int) $rating;
        if ($rating < 0) {
            throw new Exception('Rating invalide.');
        }
        $this->rating = $rating;
    }
    public function getRating()
    {
        return $this->rating;
    }

    public function setPopularity($popularity)
    {
        if ($popularity === null) {
            $this->popularity = null;
            return;
        }
        $popularity = (int) $popularity;
        if ($popularity < 0) {
            throw new Exception('Popularity invalide.');
        }
        $this->popularity = $popularity;
    }
    public function getPopularity()
    {
        return $this->popularity;
    }

    public function setModified($modified)
    {
        if ($modified === null || $modified === '') {
            throw new Exception('Modified obligatoire.');
        }
        $this->modified = $modified;
    }
    public function getModified()
    {
        return $this->modified;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }
    public function getCreated()
    {
        return $this->created;
    }

    public function setPosterFlag($posterFlag)
    {
        $posterFlag = (int) $posterFlag;
        if ($posterFlag !== 0 && $posterFlag !== 1) {
            throw new Exception('Poster flag invalide.');
        }
        $this->posterFlag = $posterFlag;
    }
    public function getPosterFlag()
    {
        return $this->posterFlag;
    }
}

<style>
    .preview-films {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 1rem;
    }

    .card-film {
        padding: .5rem;
        width: 24%;
        border-radius: 15px;
        -webkit-box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.27);
        box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.27);
        margin-bottom: 1rem;
    }
    .card-film:last-child {
        margin-right: auto;
        margin-left: 1.5%;
    }
    .title{
        font-weight: 900;
    }
</style>
<h2>Nos plus grands films :</h2>
<div class="preview-films">
    <?php foreach (FilmController::getRandomFilms() as $key => $value) { ?>
        <div class="card-film">
            <div><img src="<?= $value['img'] ?>" alt=""></div>
            <p class="title"><?= $value['title'] ?></p>
            <p class="plot"><?= $value['plot'] ?></p>
            <p class="year"><?= $value['year'] ?></p>
            <p class="cast"><?= $value['cast'] ?></p>
            <p class="directors"><?= $value['directors'] ?></p>
        </div>
    <?php } ?>
</div>
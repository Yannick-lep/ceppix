
<style>
    .preview-films{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .card-film{
        width: 24%;
    }
</style>
<div class="preview-films">
    <?php foreach (FilmController::getRandomFilms() as $key => $value) { ?>
        <div class="card-film">
            <div><img src="" alt=""></div>
            <p class="title"><?= $value['title'] ?></p>
            <p class="plot"><?= $value['plot'] ?></p>
            <p class="year"><?= $value['year'] ?></p>
            <p class="cast"><?= $value['cast'] ?></p>
            <p class="directors"><?= $value['directors'] ?></p>
        </div>
    <?php } ?>
</div>
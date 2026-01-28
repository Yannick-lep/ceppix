<style>
    .preview-series {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 1rem;
    }

    .card-serie {
        padding: .5rem;
        width: 24%;
        border-radius: 15px;
        -webkit-box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.27);
        box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.27);
        margin-bottom: 1rem;
    }
    .card-serie:last-child {
        margin-right: auto;
        margin-left: 1.5%;
    }
    .title{
        font-weight: 900;
    }
</style>
<h2>Nos plus grandes series :</h2>
<div class="preview-series">
    <?php foreach (SerieController::previewSeries() as $key => $value) { ?>
        <div class="card-serie">
            <div><img src="" alt=""></div>
            <p class="title"><?= $value['show']['name'] ?></p>
          
        </div>
    <?php } ?>
</div>
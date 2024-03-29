<?php include __DIR__ . '/../layouts/inicio-html.php'; ?>
<?php include __DIR__ . '/../layouts/inicio-body.php'; ?>
<?php include __DIR__ . '/../components/left-side.php'; ?>
<?php include __DIR__ . '/../modals/app.php'; ?>
<?php include __DIR__ . '/../modals/signup.php'; ?>

    <div class="main-content">
        <?php include __DIR__ . '/../components/header-section.php'; ?>

        <?php include __DIR__ . '/modals/form-album-create.php'; ?>

        <div id="page-wrapper">

            <div class="inner-content">
                <div class="music-browse">

                    <div class="albums fourth browse-inner">

                        <div class="tittle-head two">
                            <h3 class="tittle">
                                <?= $title ?>
                                <a class="input_genre new btn btn-primary btn-sm" role="button"
                                   data-toggle="modal" data-target="#form_add_album">
                                    Adicionar
                                </a>
                            </h3>
                            <div class="clearfix"> </div>
                        </div>

                        <?php
                        foreach($albums as $key => $album) { ?>

                            <div class="col-md-3 artist-grid">
                                <a  href="/album?id=<?= $album->getId(); ?>">
                                    <div class="square" style="background-image:url('<?= $album->getPictureURL(); ?>');">
                                    </div>
                                </a>

                                <a class="art" href="/album?id=<?= $album->getId(); ?>"><?= $album->getName(); ?></a>
                            </div>

                            <?php
                        }
                        ?>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<?php include __DIR__ . '/../components/footer-section.php'; ?>

    <script>
        $(document).on("click", ".input_genre", function () {
            let id = $(this).data('genero');
            $("input[name=genero]").val(id);
        });
    </script>

<?php include __DIR__ . '/../layouts/fim-html.php'; ?>
<?php include __DIR__ . '/../layouts/inicio-html.php'; ?>
<?php include __DIR__ . '/../layouts/inicio-body.php'; ?>
<?php include __DIR__ . '/../components/left-side.php'; ?>
<?php include __DIR__ . '/../modals/app.php'; ?>
<?php include __DIR__ . '/../modals/signup.php'; ?>

    <div class="main-content">
        <?php include __DIR__ . '/../components/header-section.php'; ?>

        <div id="page-wrapper">

            <div class="inner-content">
                <div class="music-browse">

                        <div class="albums fourth browse-inner">

                            <div class="tittle-head two">
                                <h3 class="tittle">
                                    <?= $title ?>
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
<?php include __DIR__ . '/../layouts/fim-html.php'; ?>
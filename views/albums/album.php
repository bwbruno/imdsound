<?php include __DIR__ . '/../layouts/inicio-html.php'; ?>
<?php include __DIR__ . '/../layouts/inicio-body.php'; ?>
	<?php include __DIR__ . '/../components/left-side.php'; ?>
    <?php include __DIR__ . '/../modals/app.php'; ?>
	<?php include __DIR__ . '/../modals/signup.php'; ?>

		<div class="main-content">
			<?php include __DIR__ . '/../components/header-section.php'; ?>

            <div id="page-wrapper">
                <?php include __DIR__ . '/../components/flash-mensage.php'; ?>

				<div class="jumbotron row">

					<div class="col-sm-3">
						<img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px; display: block; margin:auto;" src="<?= $album->getPictureURL(); ?>" data-holder-rendered="true">
					</div>
					<div class="col-sm-9">
                        <?php /**
                         * @var \IMDSound\Models\Album $album
                         */  ?>
                        <h2><?= $album->getName();  ?></h2>
                        <h3><?= $album->getArtist()->name();  ?></h3>
                        <h5>
                            CURTIDAS: <?= $album->getNumLikes()  ?>
                            <span> | </span>
                            DURAÇÃO: <?= $album->getDurationTime();  ?>min
                        </h5>
                        <p>
                            <button type="button" class="btn btn-primary">Nova música</button>
                            <button type="button" class="btn btn-success">Curtir</button>
                            <button type="button" class="btn btn-warning">Editar</button>
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </p>
                    </div>
				</div>

				<div class="inner-content">
					<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th>Play</th>
							<th>Artista</th>
							<th>Título</th>
							<th><span class="glyphicon glyphicon-time" aria-hidden="true"></span></th>
							<th>Ações</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td><button type="button" class="btn btn-sm" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-play" aria-hidden="true"></span>
                                </button></td>
							<td><?= $album->getArtist()->name();  ?></td>
							<td>Otto</td>
							<td>@mdo</td>
							<td>
                                <span>
                                    <a href="/musica?id=<?= $album->getNumLikes() ?>" class="btn btn-danger btn-sm">
                                        Excluir
                                    </a>
                                </span>
                            </td>
						</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	<?php include __DIR__ . '/../components/footer-section.php'; ?>
<?php include __DIR__ . '/../layouts/fim-html.php'; ?>
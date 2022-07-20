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
						<img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px; display: block; margin:auto;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzIwMHgyMDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xODIxYzhhZTQ3MyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE4MjFjOGFlNDczIj48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjczLjc1MzkwNjI1IiB5PSIxMDQuNDAwMDAwMDk1MzY3NDMiPjIwMHgyMDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
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
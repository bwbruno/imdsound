<?php include __DIR__ . '/../layouts/inicio-html.php'; ?>
<?php include __DIR__ . '/../layouts/inicio-body.php'; ?>
	<?php include __DIR__ . '/../components/left-side.php'; ?>
    <?php include __DIR__ . '/../modals/app.php'; ?>
	<?php include __DIR__ . '/../modals/signup.php'; ?>

		<div class="main-content">
			<?php include __DIR__ . '/../components/header-section.php'; ?>
            <?php include __DIR__ . '/modals/form-music-genre-create.php'; ?>

			<div id="page-wrapper">
				<div class="inner-content">
                    <div class="tittle-head two">
                        <h3 class="tittle">
                            <?= $title ?>
                            <a class="new btn btn-primary btn-sm" role="button"
                               data-toggle="modal" data-target="#form_add_genre">
                                Adicionar
                            </a>
                        </h3>
                        <div class="clearfix"> </div>
                    </div>

                    <div class="inner-content">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($music_genres as $music_genre): ?>
                                    <tr>
                                        <td><?= $music_genre->name(); ?></td>
                                        <td>
                                            <span>
                                                <a href="/music_genre?id=<?= $music_genre->name(); ?>" class="btn btn-info btn-sm">
                                                    Alterar
                                                </a>
                                                <a href="/music_genre?id=<?= $music_genre->name(); ?>" class="btn btn-danger btn-sm">
                                                    Excluir
                                                </a>
                                            </span>    
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
<?php include __DIR__ . '/../components/footer-section.php'; ?>
<?php include __DIR__ . '/../layouts/fim-html.php'; ?>
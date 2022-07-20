<?php include __DIR__ . '/../layouts/inicio-html.php'; ?>
<?php include __DIR__ . '/../layouts/inicio-body.php'; ?>
	<?php include __DIR__ . '/../components/left-side.php'; ?>
    <?php include __DIR__ . '/../modals/app.php'; ?>
	<?php include __DIR__ . '/../modals/signup.php'; ?>

		<div class="main-content">
			<?php include __DIR__ . '/../components/header-section.php'; ?>

			<div id="page-wrapper">
				<div class="inner-content">
                    <div class="tittle-head two">
                        <h3 class="tittle">
                            <?= $title ?>
                            <a class="new btn btn-primary btn-sm" href="#" role="button">Adicionar</a>
                        </h3>
                        <div class="clearfix"> </div>
                    </div>

                    <div class="inner-content">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($featsList as $featsData): ?>
                                    <tr>
                                        <td><?= $featsData->feat_name(); ?></td>
                                        <td><?= $featsData->description(); ?></td>
                                        <td>
                                            <span>
                                                <a href="/type_sub" class="btn btn-info btn-sm">
                                                    Alterar
                                                </a>
                                                <a id="Excluir" href="/type_sub" class="btn btn-danger btn-sm">
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
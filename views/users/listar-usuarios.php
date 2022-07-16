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
                            Usuários
                            <a class="new btn btn-primary btn-sm" href="#" role="button">Adicionar</a>
                        </h3>
                        <div class="clearfix"> </div>
                    </div>

                    <div class="inner-content">
					<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th>Email</th>
							<th>Nome</th>
							<th>Senha</th>
							<th>Ações</th>
						</tr>
						</thead>
						<tbody>

                            <?php foreach ($usuarios as $usuario): ?>
                                <tr>
                                    <td><?= $usuario->email(); ?></td>
                                    <td><?= $usuario->name(); ?></td>
                                    <td><?= $usuario->password(); ?></td>
                                    <td>
                                        <span>
                                            <a href="/user?id=<?= $usuario->email(); ?>" class="btn btn-info btn-sm">
                                                Alterar
                                            </a>
                                            <a href="/user?id=<?= $usuario->email(); ?>" class="btn btn-danger btn-sm">
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
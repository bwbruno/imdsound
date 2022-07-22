<?php include __DIR__ . '/../layouts/inicio-html.php'; ?>
<?php include __DIR__ . '/../layouts/inicio-body.php'; ?>
	<?php include __DIR__ . '/../components/left-side.php'; ?>
    <?php include __DIR__ . '/../modals/app.php'; ?>
	<?php include __DIR__ . '/../modals/signup.php'; ?>

		<div class="main-content">
			<?php include __DIR__ . '/../components/header-section.php'; ?>
            <?php include __DIR__ . '/../artists/modals/form-artist-create.php'; ?>

			<div id="page-wrapper">
				
				<div class="inner-content">
                    <div class="tittle-head two">
                        <h3 class="tittle">
                            <?= $title ?>
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
							<th>Artista?</th>
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
                                    <select id="artista" name="artista" <?= $usuario->isArtist() ? 'disabled' : '' ?>
                                        class="<?= $usuario->isArtist() ? 'btn-info' : 'btn-danger' ?>">
                                        <option value="nao">Não</option>
                                        <option
                                                value="<?= $usuario->email(); ?>"
                                            <?= $usuario->isArtist() ? 'selected' : '' ?>>
                                            Sim
                                        </option>
                                    </select>
                                    </td>
                                    <td>
                                        <span>
                                            <a href="/user?id=<?= $usuario->email(); ?>" class="btn btn-info btn-sm">
                                                Alterar
                                            </a>
                                            <a href="/user?id=<?= $usuario->email(); ?>" class="btn disabled btn-danger btn-sm">
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

    <script>
            $(document).ready(function(){
                $('select#artista').change('click', function(){

                    $tr = $(this).closest('tr');
                    let data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    $('input[name=email]').val(data[0]);
                    $('input[name=name]').val('Nome');
                    $('textarea[name=descricao]').val('Descrição');

                    $('#modalLabel').text('Promover usuário a artista');

                    $('#form_add_artist').modal('show');
                });
            });

            $('#form_add_artist').on('hidden.bs.modal', function (e) {
                $('#modalLabel').text = 'Promover usuário a artista';
                $('input[name=name]').val('Nome');
                $('textarea[name=descricao]').val('Descrição');

                $.ajax({
                    type: 'POST',
                    url: 'artist/create',
                    data: { 'email': $(this).val() },
                    success: function(response){
                        //alert(response);
                        alert(JSON.parse(response).user_email + ' promovido.');
                        return true;
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                    },
                    dataType: 'html'
                });
            })
    </script>

<?php include __DIR__ . '/../layouts/fim-html.php'; ?>
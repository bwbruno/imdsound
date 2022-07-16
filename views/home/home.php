<?php include __DIR__ . '/../layouts/inicio-html.php'; ?>

<?php include __DIR__ . '/../layouts/inicio-body.php'; ?>

	<?php include __DIR__ . '/../components/left-side.php'; ?>

    <?php include __DIR__ . '/../modals/app.php'; ?>

	<?php include __DIR__ . '/../modals/signup.php'; ?>

		<div class="main-content">
			<?php include __DIR__ . '/../components/header-section.php'; ?>

	

			<div id="page-wrapper">

			<h3 class="tittle">
                <?= $title ?>
                <a href="/novo-usuario" class="btn btn-primary mb-2">
                    <span class="new">Novo usuário</span>
                </a>
            </h3>

            <ul class="list-group">
                <?php foreach ($usuarios as $usuario): ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <?= $usuario->name(); ?>

                        <span>
                            <a href="/alterar-usuario?id=<?= $usuario->email(); ?>" class="btn btn-info btn-sm">
                                Alterar
                            </a>
                            <a href="/excluir-usuario?id=<?= $usuario->email(); ?>" class="btn btn-danger btn-sm">
                                Excluir
                            </a>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>

				<div class="jumbotron row">
					<div class="col-sm-3">
						<img data-src="holder.js/200x200" class="img-thumbnail" 
						alt="200x200" style="width: 200px; height: 200px; display: block; margin:auto;" 
						src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzIwMHgyMDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xODFmZWE1Zjc0MiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE4MWZlYTVmNzQyIj48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjczLjc1MzkwNjI1IiB5PSIxMDQuNDAwMDAwMDk1MzY3NDMiPjIwMHgyMDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
					</div>
					<div class="col-sm-9">
					<h2>Theme example</h2>
					<p>This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point to create something more unique by building on or modifying it.</p>
					</div>
				</div>

				<div class="inner-content">
					<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th>#</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Username</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>1</td>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Jacob</td>
							<td>Thornton</td>
							<td>@fat</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Larry</td>
							<td>the Bird</td>
							<td>@twitter</td>
						</tr>
						</tbody>
					</table>
				</div>



				<div class="inner-content">
					<div class="music-browse">
							
					<?php 
						$titles = [
							'Coloque o volume no máximo',
							'Paradas',
							'Seu astral',
							'Descubra',
							'Lançamentos'
						]
					?>

					<?php foreach($titles as $key => $title) { ?>
						<div class="albums fourth browse-inner">
							<div class="tittle-head two">
								<h3 class="tittle">
									<?= $title ?> 
									<span class="new">View</span>
								</h3>
								<a href="browse.html">
									<h4 class="tittle third">Ver tudo</h4>
								</a>
								<div class="clearfix"> </div>
							</div>


							<?php 
								$arts = [
									'Sukhwinder singh',
									'Shekhar Ravjiani',
									'Shalmali',
									'Sajid-Wajid',
									'Atif Aslam',
									'A R Rahman',
									'Shreya Ghoshal',
								]
							?>

							<?php foreach($arts as $key => $art) { ?>

							<div class="col-md-3 artist-grid">
								<a  href="single.html">
									<img src="images/a<?= $key+1 ?>.jpg" title="allbum-name">
								</a>
								<a href="single.html">
									<i class="glyphicon glyphicon-play-circle"></i>
								</a>
								<a class="art" href="single.html"><?= $art ?></a>
							</div>

							<?php
									if ($key == 5) break;						
								}
							?>
						</div>
					<?php		
						}
					?>
						
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	<?php include __DIR__ . '/../components/footer-section.php'; ?>

<?php include __DIR__ . '/../layouts/fim-html.php'; ?>
<?php include __DIR__ . '/../layouts/inicio-html.php'; ?>
<?php include __DIR__ . '/../layouts/inicio-body.php'; ?>
	<?php include __DIR__ . '/../components/left-side.php'; ?>
    <?php include __DIR__ . '/../modals/app.php'; ?>
	<?php include __DIR__ . '/../modals/signup.php'; ?>

		<div class="main-content">
			<?php include __DIR__ . '/../components/header-section.php'; ?>

            <div id="page-wrapper">
                <?php include __DIR__ . '/../components/flash-mensage.php'; ?>

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
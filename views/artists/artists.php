<?php include __DIR__ . '/../layouts/inicio-html.php'; ?>
<?php include __DIR__ . '/../layouts/inicio-body.php'; ?>
<?php include __DIR__ . '/../components/left-side.php'; ?>
<?php include __DIR__ . '/../modals/app.php'; ?>
<?php include __DIR__ . '/../modals/signup.php'; ?>

    <div class="main-content">
        <?php include __DIR__ . '/../components/header-section.php'; ?>
        <?php include __DIR__ . '/modals/form-artist-create.php'; ?>


        <div id="page-wrapper">

            <div class="inner-content">
                <div class="tittle-head two">
                    <h3 class="tittle">
                        <?= $title ?>
                        <a class="input_genre new btn btn-primary btn-sm" role="button"
                           href="/users">
                            Adicionar
                        </a>
                    </h3>
                    <div class="clearfix"> </div>
                </div>

                <div class="inner-content">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($artists as $artist): ?>
                            <tr>
                                <td><?= $artist->user_email(); ?></td>
                                <td><?= $artist->name(); ?></td>
                                <td><?= $artist->description(); ?></td>
                                <td>
                                    <span>
                                        <a class="btn btn-info btn-sm editar">
                                            Editar
                                        </a>
                                        <a href="/artist?id=<?= $artist->user_email(); ?>" class="btn btn-danger btn-sm">
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
            $('.editar').on('click', function(){

                $tr = $(this).closest('tr');
                let data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                $('input[name=email]').val(data[0]);
                $('input[name=name]').val(data[1]);
                $('textarea[name=descricao]').val(data[2]);

                $('#modalLabel').text('Editar artista');
                
                $('#form_add_artist').modal('show');
            });
        });

        $('#form_add_artist').on('hidden.bs.modal', function (e) {
            $('#modalLabel').text = 'Criar artista';
            $('input[name=name]').val('Nome');
            $('textarea[name=descricao]').val('Descrição');
        })
    </script>

<?php include __DIR__ . '/../layouts/fim-html.php'; ?>
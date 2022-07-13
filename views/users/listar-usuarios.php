<?php include __DIR__ . '/../layouts/inicio-html.php'; ?>

    <a href="/novo-usuario" class="btn btn-primary mb-2">
        Novo usuário
    </a>

    <ul class="list-group">
        <?php foreach ($usuarios as $usuario): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $usuario->name(); ?>

                <span>
                    <a href="/alterar-usuario?id=<?= $usuario->id(); ?>" class="btn btn-info btn-sm">
                        Alterar
                    </a>
                    <a href="/excluir-usuario?id=<?= $usuario->id(); ?>" class="btn btn-danger btn-sm">
                        Excluir
                    </a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>

<?php include __DIR__ . '/../layouts/fim-html.php'; ?>
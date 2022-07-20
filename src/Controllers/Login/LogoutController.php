<?php

namespace IMDSound\Controllers\Login;

use IMDSound\Controllers\InterfaceControladorRequisicao;


class LogoutController  implements InterfaceControladorRequisicao
{
    public function processaRequisicao(): void
    {
        session_destroy();
        header('Location: /home');
    }
}

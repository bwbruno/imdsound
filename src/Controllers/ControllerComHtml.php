<?php

namespace IMDSound\Controllers;

abstract class ControllerComHtml
{
    public function renderizaHtml(string $caminhoTemplate, array $dados): string
    {
        extract($dados);
        ob_start();
        require __DIR__ . '/../../views/' . $caminhoTemplate;
        $html = ob_get_clean();

        return $html;
    }
}

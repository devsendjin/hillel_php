<?php


namespace App\Controller;

use App\GlobalConfig;

abstract class AbstractController
{
    protected function renderView(string $templateName, array $data, bool $echo = true)
    {
        $template = GlobalConfig::$twig->render($templateName, $data);
        if (false === $echo) return $template;
        echo $template;
    }
}
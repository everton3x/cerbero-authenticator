<?php

use Cerbero\Authenticator\Application;
use Router\Route;

function app(): Application
{
    return Application::app();
}

function render(string $template, array $data = []): string
{
    return app()->template->render("$template.html.twig", $data);
}

function view(string $template, array $data = []): void
{
    echo render($template, $data);
}

function route(string $name, ?array $params = null): string
{
    return Route::url($name, $params);
}
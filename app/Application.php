<?php

namespace Cerbero\Authenticator;

use Router\Route;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

final class Application
{
    public readonly Environment $template;

    private static Application $app;

    public function __construct()
    {
        $this->initRoutes();
        $this->initTemplates();
    }

    private function initTemplates(): void
    {
        $loader = new FilesystemLoader('../templates');
        $this->template = new Environment($loader);

        $fnroute = new TwigFunction('route', function(string $name, ?array $params = null): string {
            return Route::url($name, $params);
        });
        $this->template->addFunction($fnroute);
    }

    private function initRoutes(): void
    {
        require '../routes/web.php';
    }
    
    public function route(): void
    {
        Route::routing();
    }

    public static function app(): Application
    {
        if(!isset(self::$app)){
            self::$app = new self;
        }
        return self::$app;
    }
}
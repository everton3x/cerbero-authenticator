<?php

namespace Cerbero\Authenticator\Controller;

use Cerbero\Core\Cerbero;

final class LoginController
{
    public function index()
    {
        $return = $_GET['return'] ?? null;
        $errors = error();

        if (Cerbero::hasUserAuthenticated()) {
            view('logged', ['return' => $return]);
            return;
        }

        view('login', ['return' => $return, 'errors' => $errors]);
    }
}

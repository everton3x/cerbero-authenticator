<?php

namespace Cerbero\Authenticator\Controller;

use Cerbero\Core\Cerbero;

final class LogoutController
{
    public function index()
    {
        $return = $_GET['return'] ?? null;
        $user = Cerbero::identity();
        if (is_null($user)) {
            $auth = null;
        } else {
            $auth = Cerbero::unauthenticate($user);
        }

        if(is_null($auth)){
            view('logout', ['error' => 'Não há usuário logado.', 'return' => $return]);
            return;
        }

        if ($auth->success) {
            view('logout', ['return' => $return]);
            return;
        }
    }
}

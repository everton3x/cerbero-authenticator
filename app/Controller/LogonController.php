<?php

namespace Cerbero\Authenticator\Controller;

use Cerbero\Core\Cerbero;
use Cerbero\Core\Message\AuthenticateMessage;
use Cerbero\Exception\IncorrectPasswordException;
use Cerbero\Exception\UserInactiveException;
use Cerbero\Exception\UserNotFoundException;

final class LogonController
{
    public function index()
    {
        $return = $_POST['return'] ?? null;

        $auth = $this->logon($_POST['identity'], $_POST['password']);

        if($auth->success){
            view('logged', ['return' => $return]);
            return;
        }

        foreach($auth->errors as $error){
            if($error instanceof UserNotFoundException || $error instanceof IncorrectPasswordException) {
                error('user_password_undefined', 'Usuário ou senha não conferem!');
            }elseif($error instanceof UserInactiveException) {
                error('user_status', 'Usuário está inativo!');
            } else {
                error('generic', (string) $error);
            }
        }
        redirect(route('login'));
    }

    private function logon(string $identity, string $password): AuthenticateMessage
    {
        return Cerbero::authenticate($identity, $password);
    }
}
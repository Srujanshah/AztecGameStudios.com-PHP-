<?php

namespace AztecGameStudios\Controllers;

use AztecGameStudios\Models\PlayerModel;
use AztecGameStudios\Exceptions\NotFoundException;

class LoginController extends AbstractController {
    public function get(): string {
        $properties = ['Message' => 'Hello from the login controller'];
        return $this -> render('main.twig', $properties);
    }

    public function loginAction(): string {
        if(!$this->request->isPost()) {
            return $this->render('login.twig',[]);
        }

        $params = $this->request->getParams();
        if (!$params->has('email')) {
            $params = ['errorMessage' => 'No email provided'];
            return $this->render('login.twig',$params);
        }

        $email = $params->getString('email');
        $playerModel = new playerModel($this->db);

        try {
            $player = $playerModel->getByEmail($email);
        } catch(NotFoundException $e) {
            $this->log->warn('Player email not found: '. $email);
            $params = ['errorMessage' => 'Email not found.'];
            return $this->render('login.twig,$params');
        }

        $properties = ['Message' => 'Login Controller says Welcome'];
        return $this->render('main.twig', $properties);
    }
}

?>
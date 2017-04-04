<?php
namespace task\Controller;

use task\Helper\View;
use task\Model\PasswordGenerator;

class GenerationController
{
    public function getPassword() {
        $length = null;
        $numbers = null;
        $lowercase = null;
        $uppercase = null;

        if (isset($_GET['length'])) {
            $length = intval($_GET['length']);
        }
        if (isset($_GET['numbers'])) {
            $numbers = $_GET['numbers'];
        }
        if (isset($_GET['lowercase'])) {
            $lowercase = $_GET['lowercase'];
        }
        if (isset($_GET['uppercase'])) {
            $uppercase = $_GET['uppercase'];
        }

        $generator = new PasswordGenerator($length, $numbers, $lowercase, $uppercase);
        $password = $generator->generate();

        $view = new View();
        $variables = [
            'password' => $password,
            'length' => $length,
            'numbers' => $numbers,
            'lowercase' => $lowercase,
            'uppercase' => $uppercase
        ];
        echo $view->render('home.php', $variables);

        return $this;
    }

    public function getHome() {
        $view = new View();

        $variables = [
            'password' => null,
            'length' => null,
            'numbers' => null,
            'lowercase' => null,
            'uppercase' => null
        ];
        echo $view->render('home.php', $variables);

        return $this;
    }
}

<?php namespace App\Controller;

use App\Core\ConfigLoader;
use App\Core\Controller as BaseController;
use App\Core\View;

class UserController extends BaseController
{
    public function index($id) {
        echo 'hello world! <br/>';
        echo "your id is: $id <br/>";

        print_r(ConfigLoader::getCachedConfig());
    }

    public function getLogin() {

        // redirect if user has been logged in

        $view = new View('layout');
        $view->inject('navbar', 'navbar');
        $view->inject('content', 'login');

        // csrf


        echo $view->output();
    }

    public function postLogin() {

        http_redirect('/');
    }

    public function getLogout() {

    }

    public function getRegister() {

    }

    public function postRegister() {

    }
}
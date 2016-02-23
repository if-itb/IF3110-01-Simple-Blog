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


}
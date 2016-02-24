<?php
/**
 * Created by IntelliJ IDEA.
 * User: akhfa
 * Date: 24/02/16
 * Time: 10:41
 */

namespace App\Controller;

use App\Core\ConfigLoader;
use App\Core\Controller as BaseController;
use App\Core\View;

Class PostController extends BaseController{
    public function index()
    {
        $view = new View('layout');
        $view->inject('navbar', 'navbar');
        $view->inject('content', 'post');
        echo $view->output();
    }
}
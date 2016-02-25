<?php
/**
 * Created by IntelliJ IDEA.
 * User: Alvin Natawiguna
 * Date: 2/21/2016
 * Time: 1:53 PM
 */

namespace App\Core;

abstract class Controller
{
    /**
     * Route lists to be exempt from the ::before() method
     *
     * @var array
     */
    protected $exceptBefore = [];

    /**
     * Execute some code before firing the controller.
     */
    public function before() {}

    public function getExceptBefore() {
        return $this->exceptBefore;
    }

    protected function redirect($location)
    {
        if (isset($_SERVER['SERVER_NAME']) and isset($_SERVER['SERVER_PORT'])) {
            // assumed using http.
            $host = $_SERVER['SERVER_NAME'];
            $port = $_SERVER['SERVER_PORT'];

            header("Location: http://$host:$port{$location}");
        } else {
            header("Location: ./index.php{$location}");
        }
    }
}
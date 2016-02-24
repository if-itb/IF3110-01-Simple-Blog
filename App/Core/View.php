<?php namespace App\Core;

use RuntimeException;

/**
 * Class View
 *
 * Simple templating engine
 * @see http://www.broculos.net/2008/03/how-to-make-simple-html-template-engine.html
 * @package app\View
 */
class View
{
    /**
     * @var string
     */
    protected $file;

    /**
     * @var array
     */
    protected $values = [];

    public function __construct($file, $values = []) {
        // try to resolve the file path
        if (!realpath($file)) {
            $this->file = ROOT_PATH."/resources/views/{$file}.tpl";
        } else {
            $this->file = $file;
        }

        $this->values = $values;

        if (!isset($this->values['scripts'])) {
            $this->values['scripts'] = '';
        }

        if (!isset($this->values['stylesheets'])) {
            $this->values['stylesheets'] = '';
        }
    }

    /**
     * Sets a value for element in the template
     *
     * @param string $key
     * @param string $value
     * @param bool $filter whether the value will be filtered or not
     */
    public function set($key, $value, $filter = true) {
        $this->values[$key] = $filter ? htmlspecialchars($value) : $value;
    }

    /**
     * Add a Javascript file to the current view
     *
     * @param string $file path to the javascript file
     */
    public function addJavascript($file) {
       $this->values['scripts'] .= "<script src='$file'></script>";
    }

    /**
     * Add a CSS file to the current view
     *
     * @param string $file path to the javascript file
     */
    public function addCss($file) {
        $this->values['stylesheets'] .= "<link rel='stylesheet' type='text/css' href='$file' />";
    }

    /**
     * Renders the template
     *
     * @return string
     */
    public function output() {
        if (!file_exists($this->file)) {
            throw new RuntimeException("Error loading template file ($this->file).");
        }

        $output = file_get_contents($this->file);

        foreach ($this->values as $key => $value) {
            $tagToReplace = "[@$key]";
            $output = str_replace($tagToReplace, $value, $output);
        }

        // filter out other keys without matches
        preg_replace('/\[\@\w+]/m', '', $output);

        return $output;
    }

    /**
     * Helper method for (string) casts
     *
     * @return string
     */
    public function __toString() {
        return $this->output();
    }

    /**
     * Convenient wrapper to immediately inject a view to a param
     *
     * @param string $key
     * @param string $view
     */
    public function inject($key, $view) {
        $this->values[$key] = (new View($view))->output();
    }
}
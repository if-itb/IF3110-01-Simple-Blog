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
            $this->file = ROOT_PATH."/templates/{$file}";
        } else {
            $this->file = $file;
        }

        $this->values = $values;
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

        return $output;
    }

    /**
     * Helper method for (string) casts
     *
     * @return string
     */
    public function __toString()
    {
        return $this->output();
    }
}
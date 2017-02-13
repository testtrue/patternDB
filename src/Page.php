<?php

/**
 * Description of Page
 *
 * @author bjoern.bass@esfl.de
 */
class Page {
    public $templateDir;

    public function __construct($templateDir)
    {
        if (empty($templateDir))
        {
            defined('BASEPATH') or define('BASEPATH', realpath(dirname(dirname(__FILE__))) . 'templates/');
        } else
        {
            $this->templateDir = $templateDir;
        }
    }

    /**
     * See http://stackoverflow.com/questions/2820723/how-to-get-base-url-with-php
     * @return string Returns the path of the calling file with trailing slash.
     * 
     */
    public function getBaseUrl()
    {
        return dirname(sprintf(
                    "%s://%s%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['SERVER_NAME'], $_SERVER['REQUEST_URI'])
            ) . DIRECTORY_SEPARATOR;
    }

    /** parseTemplate
     * Reads the HTML-Template and exchanges the placeholders (in this case [[*NAME]])
     * with the associated values from the array.
     *
     * @param string $templateFilename Name of the Templatefile that will be read
     * @param assoc-array $pageDataArray Associative array which holds the values that will be replaced
     * @return string The string, which will be returned. It can be echoed out.
     */
    public function parseTemplate($templateFilename, $pageDataArray)
    {
        $output = file_get_contents($templateFilename);
        foreach ($pageDataArray as $placeholder => $value)
        {
            if (empty($value))
            {
                $value = 'No value was given for the variable $pageDataArray [\'' . $placeholder . '\']';
            }
            $output = str_replace('[[*' . $placeholder . ']]', $value, $output);
        }
        return $output;
    }

    /** debug
     * Prints an entire HTML-error-page using "die()" for debugging purposes
     * @param String $string A string to show in an errorpage.
     * @param type $templateFilename
     */
    function debug($string, $templateFilename = "templates/index.html")
    {
        $params = array(
            'baseUrl' => BASEURL,
            'title' => 'Fehlerseite',
            'header' => '',
            'status' => '<span class="glyphicon glyphicon-warning-sign"></span> Fehlerseite aufgerufen',
            'content' => '<pre style="background-color: #ccc">' . print_r($string, true) . '</pre>',
            'footer' => '',
        );
        die($this->parseTemplate($templateFilename, $params));
    }

}

<?php
/**
 * Main file index.php
 */

/* Set some constants, the config file and the autoloader machanism. */
defined('BASEPATH') or define('BASEPATH', realpath(dirname(__FILE__)));
require_once(BASEPATH . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
//require_once (BASEPATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php');
$page = new Page(''); // instatiate the page
defined('BASEURL') or define('BASEURL', $page->getBaseUrl());

/* Get the action parameter and decide what to do next. */
$action = (string)filter_input(INPUT_GET, 'action');
// Setup variables
$content = "";
$title = "";
switch ($action) {
    case "show":
        $content .= file_get_contents(BASEPATH . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'Show.html');
        break;
    case "impressum":
        $content .= file_get_contents(BASEPATH . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'impressum.html');
        break;
    default:
        $content .= file_get_contents(BASEPATH . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'startpage.html');
}

/* * *************************
 *  Show the page           *
 * ************************* */
// We create an assoc pageDataArray to store the locations of the templates that we feed into the template engine and the baseUrl.
$pageDataArray = [
    'baseUrl' => BASEURL,
    'title' => $title,
    'content' => $content,
    'year' => date('Y')
];

/*
 * The content variable parses the basic structure of every page - the index.html - which includes the
 * variables header, footer, title and main, which gets taken from the templates of $pageDataArray.
 * To display we content, we merely have to echo it.
 */
$content = $page->parseTemplate('templates/index.html', $pageDataArray);
echo $content;

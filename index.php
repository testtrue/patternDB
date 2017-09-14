<?php
/**
 * Main file index.php
 */

/* Set some constants, the config file and the autoloader machanism. */
defined('BASEPATH') or define('BASEPATH', realpath(dirname(__FILE__)));
require_once (BASEPATH . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
require_once (BASEPATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php');
$page = new Page(''); // instatiate the page
defined('BASEURL') or define('BASEURL', $page->getBaseUrl());

/* Set some default values. */
$title = 'Home';
$header = 'Bitschubser GmbH';
$status = ''; // Status message
$content = '<h1>Standardseite</h1>'
    . '<p>In der Datei ' . __FILE__ . ' steht noch der Standardwert für den Seitencontent. Das ist aber langweilig...</p>'
    . '<p>Mit <pre>$content=\'Neuer Inhalt hier hinein!\';</pre> könntest Du das ändern...</p>';
$footer = '&copy; Copyright ' . date("Y") . ' Bitschubser GmbH';


/* Get the action parameter and decide what to do next. */
$action = (string) filter_input(INPUT_GET, 'action');
switch ($action)
{
    case "setupDB" :
        $setup = new Setup($config);
        $setup->createTablesFromFile(BASEPATH . DIRECTORY_SEPARATOR . 'setup'.DIRECTORY_SEPARATOR.'Subscriber.sql');
        $title = 'Datenbanktabellen anlegen';
        $content = file_get_contents(BASEPATH . DIRECTORY_SEPARATOR . 'setup'.DIRECTORY_SEPARATOR.'setupDB.html');
        break;
    case "insertCustomer" :
        $title = 'Abonnent einfügen';
        $content = file_get_contents(BASEPATH . DIRECTORY_SEPARATOR . 'templates'.DIRECTORY_SEPARATOR.'insertCustomer.html');
        break;
    /*     * ********************************************************************* */
    case "showCustomers" :
        // Safely get the GET-Parameters
        $params['anrede'] = (string) filter_input(INPUT_GET, 'anrede');
        $params['firstName'] = (string) filter_input(INPUT_GET, 'firstName');
        $params['lastName'] = (string) filter_input(INPUT_GET, 'lastName');
        $params['email'] = (string) filter_input(INPUT_GET, 'email');
        $params['firma'] = (string) filter_input(INPUT_GET, 'firma');
        $params['url'] = (string) filter_input(INPUT_GET, 'url');
        $params['phone'] = (string) filter_input(INPUT_GET, 'phone');

        /* To show the values for testing purposes uncomment the following line. */
//        $page->debug($params);

        /* Here you should fetch the data from the database... */

        // Fill the variables for the output with your data
        $title = 'Abonnenten anzeigen';
        $content = 'An dieser Stelle könnte z. B. so eine <span class="glyphicon glyphicon-th-list"></span> HTML-Tabelle stehen ';
        $content .= "<table class=\"table table-bordered table-hover\">\n";
        $content .= " <thead>\n";
        $content .= "  <tr>\n";
        $content .= "    <th>Spaltenüberschrift 1</th>\n";
        $content .= "    <th>Spaltenüberschrift 2</th>\n";
        $content .= "    <th>Spaltenüberschrift 3</th>\n";
        $content .= "  <tr>\n";
        $content .= " </thead>\n";
        $content .= " <tbody>\n";
        // TODO: Put you data rows here...
        // Loops might be handy here... ;-)
        $content .= "  <tr>\n";
        $content .= "    <th>Wert A1</th>\n";
        $content .= "    <th>Wert A2</th>\n";
        $content .= "    <th>Wert A3</th>\n";
        $content .= "  <tr>\n";
        $content .= "  <tr>\n";
        $content .= "    <th>Wert B1</th>\n";
        $content .= "    <th>Wert B2</th>\n";
        $content .= "    <th>Wert B3</th>\n";
        $content .= "  <tr>\n";

        $content .= " </tbody>\n";
        $content .= "</table>\n";
        break;
    /*     * ********************************************************************* */
    default: // No matching parameter: Show 'Home'
        $title = "Home";
        $content = '<h2>Navigation</h2>';
        $content .= "<ul>\n";
        $content .= '<li><a href="index.php">Home</a></li>';
        $content .= '<li><a href="index.php?action=insertCustomer">Abonnent einfügen</a></li>';
        $content .= '<li><a href="index.php?action=showCustomers">Abonnenten anzeigen</a></li>';
        $content .= '<li><a href="index.php?action=setupDB">Setup (Datenbanktabellen anlegen)</a></li>';
        $content .= "</ul>";
}

/* * *************************
 *  Show the page           *
 * ************************* */
// We create an assoc pageDataArray to store the locations of the templates that we feed into the template engine and the baseUrl.
$pageDataArray = array(
    'baseUrl' => BASEURL,
    'title' => $title,
    'header' => $header,
    'status' => $status,
    'content' => $content,
    'footer' => $footer,
);

/*
 * The content variable parses the basic structure of every page - the index.html - which includes the
 * variables header, footer, title and main, which gets taken from the templates of $pageDataArray.
 * To display we content, we merely have to echo it.
 */
$content = $page->parseTemplate('templates/index.html', $pageDataArray);
echo $content;

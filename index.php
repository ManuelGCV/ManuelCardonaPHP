<?php
/**
 * Basic config for Apache reporting
 * ignore repeated errors
 * Do not display errors on front
 * Log erros on file
 * TODO SET DISPLAY ERRORS TO FALSE BEFORE SEND
 */
error_reporting(E_ALL);

ini_set('ignore_repeated_errors', TRUE);

ini_set('display_errors', TRUE); 

require 'vendor/autoload.php';

use ManuelCardona\Talent\Core\App;

/**
 * calls main App class
 */
$myApp = new App ();
<?php
/**
 * Example that changes html of phpcas messages
 *
 * PHP Version 5
 *
 * @file     example_html.php
 * @category Authentication
 * @package  PhpCAS
 * @author   Joachim Fritschi <jfritschi@freenet.de>
 * @author   Adam Franco <afranco@middlebury.edu>
 * @license  http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link     https://wiki.jasig.org/display/CASC/phpCAS
 */
// Load the settings from the central config file
require_once 'casConfig.php';
// Load the CAS lib

// Enable debugging
phpCAS::setDebug();
// Enable verbose error messages. Disable in production!
phpCAS::setVerbose(true);
// Initialize phpCAS
phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context);
// For production use set the CA certificate that is the issuer of the cert
// on the CAS server and uncomment the line below
// phpCAS::setCasServerCACert($cas_server_ca_cert_path);
// For quick testing you can disable SSL validation of the CAS server.
// THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
// VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
phpCAS::setNoCasServerValidation();
phpCAS::setServerServiceValidateURL('https://logowanie.dfqs.pl/serviceValidate');
// customize HTML output

// force CAS authentication
try{
    phpCAS::forceAuthentication();
}catch (CAS_AuthenticationException $x){
    echo $x->getMessage();
}

//phpCAS::logout();

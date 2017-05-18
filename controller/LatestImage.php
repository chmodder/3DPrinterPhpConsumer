<?php
$client = new SoapClient("http://camerasoapservice.azurewebsites.net/Service1.svc?wsdl");
$functions = $client->__getFunctions();

$types = $client->__getTypes();
$resultWrapped = $client->GetLatestImage();
//Find GetLatestImageResult on WCF test client /xml
$result = $resultWrapped->GetLatestImageResult;

require_once '../vendor/autoload.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../view');
$twig = new Twig_Environment($loader, array(
    // 'cache' => '/path/to/compilation_cache',
    'auto_reload' => true
));
$template = $twig->loadTemplate('camView.html.twig');

$parametersToTwig = array("result" => $result);
echo $template->render($parametersToTwig);
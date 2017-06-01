<?php
//Php class to show the list of all bookings.
//Jane + Atena

$client = new SoapClient("http://camerasoapdev.azurewebsites.net/Service1.svc?wsdl");

$resultWrapped = $client->GetBookings();
$result = $resultWrapped->GetBookingsResult;

require_once '../vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../view');
$twig = new Twig_Environment($loader, array('auto_reload' => true));
$template = $twig->loadTemplate('BookingPage.twig');

$parametersToTwig = array("result"=>$result->Booking);
echo $template->render($parametersToTwig);
?>
<?php
//Php class to delete booking from the list by Id.
//Atena

$ID = $_GET['textId'];

$client = new SoapClient("http://camerasoapdev.azurewebsites.net/Service1.svc?wsdl");
$parametersToSoap = array('id' => $ID);
$resultWrapped = $client->DeleteBooking($parametersToSoap);

$result = $resultWrapped->DeleteBookingResult;

if ($result = 1) {
    echo "The booking has been deleted.";
    }


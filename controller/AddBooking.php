<?php
//Php class to add new booking to the list.
//Jane

$descriptionErr = "";
$Description = $_GET['textdescription'];

if (empty($_GET["textdescription"]))
    {
        echo $descriptionErr = "Text is required";
    }
else
    {
        $client = new SoapClient("http://camerasoapdev.azurewebsites.net/Service1.svc?wsdl");
        $parametersToSoap = array('description' => $Description);
        $resultWrapped = $client->SaveBooking($parametersToSoap);

        $result = $resultWrapped->SaveBookingResult;

        if ($result = 1) {
            echo "The booking has been added to the list.";
        }
    }

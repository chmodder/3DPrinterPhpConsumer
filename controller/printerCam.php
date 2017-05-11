<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 09/05/2017
 * Time: 11.14
 */

//Dummy not implemented using Soap yet

//Test get images from local machine image directory

//while (true)
//{

// comment by Norbert ...............................

//output random image from the folder
$output = getImage();

//twig
require_once '../vendor/autoload.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../view');

$twig = new Twig_Environment($loader, array(
    //'cache' => '/path/to/compilation_cache',
    'auto_reload' => true));

$template = $twig->loadTemplate('camView.html.twig');

$parametersToTwig = array("output" => $output);
echo $template->render($parametersToTwig);

//Does not work - makes the program hang
//sleep(3);
//}


function getImage()
{
    //set the filename to match a pattern - in this case the filename should end with '../img/*.png'
    $file = glob("../img/*.png");

//Counts the number of files in the folder
    $file_count = count($file);

//output random image from the folder
    $output = $file[rand(1, $file_count) - 1];

    return $output;
}

//This comment is only used to make a test commit to check if GitHub/Slack integration works
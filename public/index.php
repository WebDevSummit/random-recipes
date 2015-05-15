<?php 

require '../vendor/autoload.php';
require 'config.php';


$loader = new Twig_Loader_Filesystem('../src/views');
$twig = new Twig_Environment($loader);



$board = new WebDevSummit\TrelloBoard($config['api_key'], $config['list'], $config['exclude']);
$lists = $board->getLists();
$cards = $board->getCards();
$excluded = $board->getExcluded();

echo $twig->render('index.twig', ['board' => $board, 'lists' => $lists, 'cards' => $cards, 'excluded' => $excluded]);


?>
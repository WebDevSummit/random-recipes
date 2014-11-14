<?php 

require 'vendor/autoload.php';



$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$config = [
	'api_key' => '8969d404faae9a31368c7384c1f82e97',
	'list' => '51a2ce627358a5dd30001a02',
	'exclude' => [
		'Meh List', 
		'Baked Goods'
	]
];

$board = new WebDevSummit\TrelloBoard($config['api_key'], $config['list'], $config['exclude']);
$lists = $board->getLists();
$cards = $board->getCards();
$excluded = $board->getExcluded();

echo $twig->render('index.twig', ['board' => $board, 'lists' => $lists, 'cards' => $cards, 'excluded' => $excluded]);


?>
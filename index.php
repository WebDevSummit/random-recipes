<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WHAT TO EAT?</title>
	<link rel="stylesheet" href="food.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Mako' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="background"></div>
	

<?php 
	// how I grabbed the list
	// $json = file_get_contents('https://api.trello.com/1/members/me/boards?key=8969d404faae9a31368c7384c1f82e97');
	// var_dump($json);
	// $full = json_decode($json);
	// var_dump($full);
	// foreach($full as $board) {
	// 	if($board->name === 'House Items') {
	// 		$house = $board->id;
	// 		echo $house;
	// 	}
	// }

	$list = '51a2ce627358a5dd30001a02';
	$rec_board = '528a6b95a7b6b5f31f000946';

	$recipe_json = file_get_contents('https://api.trello.com/1/boards/'.$list.'/lists?cards=open&card_fields=name&fields=name&key=8969d404faae9a31368c7384c1f82e97');
	

	$boards = json_decode($recipe_json);
	//var_dump($boards);
	//var_dump($board);
	echo '<ul class="items" style="text-align: left;">';
	$ids = array();
	$cards = array();
	foreach($boards as $list) {
		if($list->name != 'Meh List' && $list->name != 'Baked Goods' ) {
			echo '<li><a href="#" data-board="'.$list->id.'">'.$list->name.'</a></li>'; 
			//$cards = array();
			//var_dump($list);
			//echo $list->name . \n; 		
			$ids[] = $list->id;
			//$board_json = file_get_contents('https://api.trello.com/1/boards/'.$list->id.'/lists?cards=open&card_fields=name&fields=name&key=8969d404faae9a31368c7384c1f82e97');
			//var_dump($board_json);
			//$board_cards = json_decode($board_json);
			//var_dump($board_cards);
			//$cards[] = $list->cards;
			//var_dump($cards);
		}
	}
	echo '</ul>';

	var_dump($ids);

			


	// foreach($ids as $id) {
	// 	$board_json = file_get_contents('https://api.trello.com/1/boards/'.$id.'/lists?cards=open&card_fields=name&fields=name&key=8969d404faae9a31368c7384c1f82e97');
	// 	var_dump($board_json);
	// }
	//var_dump($cards);
	
	$list = '51a2ce627358a5dd30001a02';
	//$rec_board = '528a6b95a7b6b5f31f000946';
	
	$board_json = file_get_contents('https://api.trello.com/1/boards/'.$list.'/cards?fields=name,idList,url&key=8969d404faae9a31368c7384c1f82e97');
	//var_dump($board_json);
	$cards = json_decode($board_json);
	//var_dump($cards);
	$recipes = array();

	// do I need to do this for each list then?
	foreach($cards as $card) {
			//echo $card->name; 
			//var_dump($card);
			$recipes[] = array( 'name' => $card->name, 'url' => $card->url, 'list' => $card->idList);
	}
	var_dump($recipes);
	// $entry = array_rand($recipes, 1);
	// echo '<h1 style="text-align: center; font-size: 8em; font-family: sans-serif; margin-top: 150px;">'.$recipes[$entry]['name'].'</h1>';
?>

<ul>
	<li><a onClick="window.location.reload()">I Hate Dis</a></li>
	<li><a href="<?php echo $recipes[$entry]['url']; ?>">I Like Dis</a></li>
</ul>

Use this color palette http://www.colourlovers.com/palette/845564/its_raining_love

http://stackoverflow.com/questions/5915096/get-random-item-from-javascript-array

http://stackoverflow.com/questions/12813580/how-to-assign-php-array-values-to-javascript-array


</body>
</html>
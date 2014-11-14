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
	/**
	 * config stuff
	 * @misc vars
	 */
	$list = '51a2ce627358a5dd30001a02';
	$exclude = ['Meh List', 'Baked Goods']; 
	
	/**
	 * include
	 */
	include ('TrelloBoard.php');

	$board = new TrelloBoard($list, $exclude);
	$lists = $board->getLists();
	$cards = $board->getCards();

	echo $board->renderListNavigation();
	echo $board->renderCards();

?>

<ul>
	<li><a data-url="" class="hate" href="">I Hate Dis</a></li>
	<li><a class="like" href="">I Like Dis</a></li>
</ul>

<script>
	$('.items a, .hate').on('click', function(e) {
		e.preventDefault();

		$('.cards li').removeClass('show');

		var id = $(this).data('board');

			var count = $('.cards li[data-list="'+id+'"]').length;
			var numRand = Math.floor(Math.random() * count + 1);
			var card = $('.cards li[data-list="'+id+'"]').eq(numRand - 1);
			card.addClass('show');
			var url = card.data('url');
	
		$('a.like').attr('href', url);
		$('a.hate').data('board', id);
	});
</script>


</body>
</html>
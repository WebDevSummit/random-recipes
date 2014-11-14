<?php include('header.php'); ?>

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


<?php include('footer.php'); ?>
<?php

class TrelloBoard {

	protected $lists;

	/**
	 * Cards from the Board
	 * @var array
	 */
	protected $cards;

	/**
	 * list of exluded trello list names
	 * @var array
	 */
	protected $excluded;

	/**
	 * set up TrelloBoard
	 */
	public function __construct($board, $excluded)
	{
		$this->cards = json_decode(file_get_contents('https://api.trello.com/1/boards/' . $board . '/cards?fields=name,idList,url&key=8969d404faae9a31368c7384c1f82e97'));
		$this->lists = json_decode(file_get_contents('https://api.trello.com/1/boards/' . $board . '/lists?cards=open&card_fields=name&fields=name&key=8969d404faae9a31368c7384c1f82e97'));
		$this->excluded = $this->setToArray($excluded);
	}

	/**
	 * Array of StdObjs Trello Cards
	 * @return array of all the trello cards
	 */
	public function getCards()
	{
		return $this->cards;
	}

	public function getLists()
	{
		return $this->lists;
	}

	/**
	 * checks for array, if string forces array
	 * @param array $list
	 */
	public function setToArray($list)
	{
		// make sure to return an array
		if(!is_array($list)) {
			return $this->setToArray([$list]);
		}

		return $list;
	}

	public function renderListNavigation()
	{
		$content = '<ul class="items" style="text-align: left;">';
		foreach($this->lists as $list) {
			if(! in_array($list->name, $this->excluded ) ) {
				$content .= '<li><a href="#" data-board="'.$list->id.'">'.$list->name.'</a></li>'; 
			}
		}
		$content .= '</ul>';

		return $content;
	}

	public function renderCards()
	{
		$content = '<ul class="cards">';
		foreach($this->cards as $card) {
			$content .= '<li data-list="'.$card->idList.'" data-url="'.$card->url.'">'.$card->name.'</li>';
		}
		$content .= '</ul>';

		return $content;
	}
}


// $trelloBoard = new TrelloBoard('51a2ce627358a5dd30001a02', ['Meh List', 'Baked Goods']);

// var_dump($trelloBoard->getBoard());


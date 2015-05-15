<?php
namespace WebDevSummit;

class TrelloBoard {
	protected $api_key;

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
	public function __construct($api_key, $board, $excluded)
	{
		$this->api_key = $api_key;
		$this->cards = $this->api_call($board, 'cards', 'fields=name,idList,url');
		$this->lists = $this->api_call($board, 'lists', 'cards=open&card_fields=name&fields=name');
		$this->excluded = $this->setToArray($excluded);
	}

	public function api_call($board, $resource, $filter = null)
	{
		$base_url = 'https://api.trello.com/1/boards/';
		$url = $base_url . $board . '/' . $resource . '?' . $filter;

		$key =  ((!$filter) ? 'key=' : '&key=') .  $this->api_key;
		
		return json_decode( file_get_contents($url . $key) );		
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

	public function getExcluded()
	{
		return $this->excluded;
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

}
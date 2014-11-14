$('.items a, .hate').on('click', function(e) {
	e.preventDefault(); 

	// make sure they are all hidden
	$('.cards li').removeClass('show');
	
	// get the board data attribute of the clicked item
	var board = $(this).data('board');

	// if board exists then find the cards and get a random number
	if(board) {
		var cards = $('.cards li[data-list="'+board+'"]');

		// get a random number
		// all the cards in the specific board + 1
		// round the number down
		var numRand = Math.floor(Math.random() * (cards.length + 1));
	}
	
	// get one of the cards in this list that is equal to 
	// numRand - 1 is because of the eq starting at 0
	var card = $('.cards li[data-list="'+board+'"]').eq(numRand - 1);

	// get the URL of the selected card
	var url = card.data('url');

	// show that beautiful card
	card.addClass('show');
	
	// toss the card's URL into the "I Like Dis" button so user can hop straight to card
	$('a.like').attr('href', url);

	// give the hate button the board ID, so if they say they hate it they can get a new card from the same board
	$('a.hate').data('board', board);
});
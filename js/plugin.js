$('.items a, .hate').on('click', function(e) {
	$('.cards li').removeClass('show');
	e.preventDefault(); 
	var id = $(this).data('board');
	//console.log(id);
	var count = $('.cards li[data-list="'+id+'"]').length;
	//console.log(count);
	var numRand = Math.floor(Math.random() * (count + 1));
	//console.log(numRand);
	var card = $('.cards li[data-list="'+id+'"]').eq(numRand);
	card.addClass('show');
	var url = card.data('url');
	//console.log(url);
	$('a.like').attr('href', url);
	$('a.hate').data('board', id);
});
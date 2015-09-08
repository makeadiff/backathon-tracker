var colors = [	'#f1632a','#ffe800','#282829','#22bbb8','#7e3f98','#54b847',
				'#ed1849','#a29175','#7fcef4','#f2a44f','#ced6d9','#fbcad0',
				'#c1010a'];
var index = 0;
function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function init() {
	$(".tile").click(function() {
		var city_id = $(this).attr('data');
		location.href = "city.php?city_id=" + city_id;
	});

	$(".tile").each(function() {
		$(this).css("background-color", getRandomColor()); // colors[index]
		index++;
		if(index == colors.length) index = 0;
	});
}


var $ = jQuery.noConflict();
$(init);

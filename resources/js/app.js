//require('./bootstrap');
$(document).ready(function(){
	$('#new,#current').change(function(){
		if($(this).attr('id') == 'new')
		var car = $('#right');
		else
		var car = $('#left');
		switch($(this).val())
		{
			case 'r': car.attr('class', 'red car'); break;
			case 'g': car.attr('class', 'green car'); break;
			case 'b': car.attr('class', 'blue car'); break;
			default: car.attr('class','gray car');
		}
	});
	if (top.location.pathname === '/paintjobs')
	{
		refresh();
	}
});
function refresh()
{
    setInterval(function(){
		$.ajax({url: '/paintjobsrefresh', success: function(result){
			result = JSON.parse(result);
			var total = parseInt(result['b']) + parseInt(result['g']) + parseInt(result['r']);
			$('#b').text(result['b'] || 0);
			$('#g').text(result['g'] || 0);
			$('#r').text(result['r'] || 0);
			$('#total').text(total || 0);
			$('tbody').html('');
			var progress = '';
			for(var k in result['prog']['plate'])
			{
				progress += "<tr><td>"+result['prog']['plate'][k]+"</td><td>"+result['prog']['last_color'][k]+"</td><td>"+result['prog']['new_color'][k]+"</td><td><a href=\"/paintjobs/\"" + result['prog']['id'][k] + ">Mark as Completed</a></td></tr>";
			}
			$('#ongoing tbody').html(progress);
			var pending = '';
			for(var k in result['pend']['plate'])
			{
				pending += "<tr><td>"+result['pend']['plate'][k]+"</td><td>"+result['pend']['last_color'][k]+"</td><td>"+result['pend']['new_color'][k]+"</td></tr>";
			}
			$('#queue tbody').html(pending);
			}});
	}, 5000);
}
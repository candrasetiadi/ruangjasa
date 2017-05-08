$(document).ready(function(){
  $("ul.navbar-nav").perfectScrollbar();
	$(".nav-tabs a").click(function(){
		var target = $(this).attr('target');
		if(target != undefined && $('.tab-content').find(target).length > 0)
		{
			$('.tab-content > div.tab-pane').removeClass('active');
			$('.nav-tabs li').removeClass('active');
			$(this).parent().addClass('active');
			$('.tab-content').find(target).addClass('active');
			if(cur_url != '')
				history.pushState({}, '', cur_url+target);
		}
	});
});

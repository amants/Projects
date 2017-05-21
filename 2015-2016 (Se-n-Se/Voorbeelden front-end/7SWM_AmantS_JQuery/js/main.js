$(document).ready(function() {
	$("header h1").fadeIn(2000);
	$("#nav").fadeIn(2000);
	$('.bxslider').bxSlider({
  		pagerCustom: '#bx-pager',
		onSlideAfter: function($slideElement, oldIndex, newIndex) {
			$('h1').delay(300).animate({opacity: 1, top: '50%',}, 550);
			
			console.log($slideElement);
			if ($slideElement.hasClass("c1")) {
				$("h1").html("Sylvanas Windrunner");
			} else if ($slideElement.hasClass("c2")) {
				$("h1").html("Illidan Stormrage");	
			} else if ($slideElement.hasClass("c3")) {
				$("h1").html("Thrall, son of Durotan");	
			} else if ($slideElement.hasClass("c4")) {
				$("h1").html("Jaina Proudmore");	
			}
		},
		onSlideBefore: function() {
			$('h1').animate({opacity: 0, top: '45%',}, 200);
		}	
	});
	$(".bxslider li").click(function(e) {
		$target = $(e.target); 
		$target.attr("id","active");
		if ($($target).hasClass("active")) {
			$("h1").html("Wow, doge");
		}
	})
	
	
	
});

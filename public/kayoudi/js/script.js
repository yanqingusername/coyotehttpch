$(function() {
	$(".search i").click(function() {
		$(".search-box").stop().toggleClass("show");
	})
	
	$(".back-top").click(function() {
		$('body,html').animate({
			scrollTop: 0
		}, 500);
	});

	if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))) {
		new WOW().init();
	};



	//移动端，点击中英文切换
	$('.lang').on('click', function(e) {
		console.log(1)
		// 阻止事件冒泡
		e.stopPropagation();
		$('.other-lang').show()

	})
	$(document).on('click', function() {
		console.log(2)
		$('.other-lang').hide()
		
	})



	// $('.lang').on('touchstart', function(e) {
	// 	console.log(1)
	// 	// 阻止事件冒泡
	// 	e.stopPropagation();
	// 	$('.other-lang').show()

	// })
	// $(document).on('touchstart', function() {
	// 	console.log(2)
	// 	$('.other-lang').hide()
		
	// })

	// var lang = document.querySelector('.lang');
	// var otherLang = document.querySelector('.other-lang');
	// lang.onclick = function() {
	// 	console.log(1)
	// 	otherLang.style.display = 'block';
	// }


});

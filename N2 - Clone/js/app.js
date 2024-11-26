


googles.render();
		googles.cart.on('googles_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {
					{
						var item = items[i];
						var itemName = item.Name;
						var itemPrice = item.Price;
						var itemQuantity = item.Quantity;
						// Thực hiện xử lý với từng mục hàng
						// Ví dụ: in ra thông tin mục hàng
						console.log("Item Name: " + itemName + ", Price: " + itemPrice + ", Quantity: " + itemQuantity);
					}
				}
			}
		});

$(document).ready(function () {
	$(".button-log a").click(function () {
		$(".overlay-login").fadeToggle(200);
		$(this).toggleClass('btn-open').toggleClass('btn-close');
	});
});

$('.overlay-close1').on('click', function () {
	$(".overlay-login").fadeToggle(200);
		$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
		open = false;
});

var d = new Date();
	simplyCountdown('simply-countdown-custom', {
		year: d.getFullYear(),
		month: d.getMonth() + 2,
		day: 25
});

$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            900: {
                items: 3,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: false,
                margin: 20
            }
        }
    })
})

$(document).ready(function () {
    $(".dropdown").hover(
        function () {
            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
            $(this).toggleClass('open');
        },
        function () {
            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
            $(this).toggleClass('open');
        }
    );
});

function validateDiscount(input) {
    if (input.value < 0) {
        input.value = 0;
    }

    if (input.value > 1000) {
        input.value = 1000; 
    }
}

jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(this.hash).offset().top
        }, 900);
    });
});

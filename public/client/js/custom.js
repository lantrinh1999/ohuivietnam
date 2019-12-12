$(function () {
    $('.buy_now').on('click', function () {
        $(this).parents('form').submit();
    });

    $('.clickDelete').on('click', function (e) {
        r = confirm('Chắc chắn xóa');
        if(r == true){
            $(this).parent('form').submit();
        }
    });

    $('.cart-clear').on('click',function(){
        // console.log('aa');
        r = confirm('Chắc chắn xóa toàn bộ giỏ hàng ???');
        if (r == true) {
            $(this).parent('form').submit();
        }
    })

    $('.change_qty').on('change', function () {
        if ($(this).val() < 1) {
            $(this).val(1);
        };

        if ($(this).val() > 0) {
            $(this).parents('form').submit();
        }
    })

    $('.dec.qtybutton').on('click',function () {
        if ($(this).next().val() < 1) {
            $(this).next().val(1);
        };
        if ($(this).next().val() > 0) {
            $(this).parents('form').submit();
        }
    });
    $('.inc.qtybutton').on('click',function() {
        $(this).parents('form').submit();
    })

    $('.clickDeleteHeader').on('click', function (e) {
        r = confirm('Chắc chắn xóa');
        if (r == true) {
            $(this).parent('form').submit();
            // setTimeout(() => {
            //     window.location.reload();
                
            // }, 1000);
        }
    });


//    $('body').click(function (e) {
//        console.log('out side');
//        if (!$(this).hasClass('.cart-visible')){
//            $('.cart-visible').css('transform','rotateX(1)');
//        }
//    })
})
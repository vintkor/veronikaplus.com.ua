$('document').ready(function(){

    $(".owl-carousel-1").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        navText: [ '', '' ],
        nav: true,
        responsive: {
            0: {
                items: 1
            }
        }
    });

    $(".owl-carousel-2").owlCarousel({
        items: 3,
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        navText: [ '', '' ],
        nav: true,
        responsive: {
            600: {
                items: 3
            }
        }
    });

    $('.team__link').click(function(e){
        e.preventDefault();
        var ID = $(this).data('id');
        $('.team__desc').hide();
        $('.team__desc-' + ID).show();
    });

    $(document).on('click', '[data-lightbox]', lity);

    $('.single_beauty-centr__link').click(function(e){
        e.preventDefault();
        parent.history.back()
        return false;
    });


    // Выравнивание заголовков товаров в цикле вывода товаров
        var titleHeight = [];
        var titleList = $('.woocommerce-loop-product__title');

        titleList.each(function(index){
            titleHeight[index] = $(this).height();
        });
        function getMaxOfArray(numArray) {
            return Math.max.apply(null, numArray);
        }
        var maxHeight = getMaxOfArray(titleHeight);
        titleList.each(function(){
            $(this).css({
                "height": maxHeight + "px"
            })
        });
    // ---------------------------------------------------------------

    $('.woof_redraw_zone').find(':disabled').parents('li').hide();

    $('.woof_redraw_zone ul').each(function(index) {
        if( $(this).height() <= 0 ) {
            $(this).parents('.woof_container').hide();
        }
    });

    // Находит в фильтрах слово 'Товар ' и удаляет
        $('.woof_container_inner h4').each(function() {
            var text = $(this).text();
            var notInclude = 'Товар ';
            $(this).text( text.replace( notInclude, '' ) );
        });
    // ---------------------------------------------------------------

    $('.edu-center__cat-list-link').click(function(){
        $('.edu-center__cat-list-link').removeClass('active');
        $(this).addClass('active');
        var eduCenterID = $(this).data('id');
        $('.edu-center__tab').hide();
        $('.edu-center__tab-' + eduCenterID).show();
    });

    var urlHash = window.location.hash;

    if( urlHash ) {
        $('.edu-center__tab').hide();
        $('.edu-center__cat-list-link').removeClass('active');
        $('.hash-' + urlHash.replace('#', '')).addClass('active');
        $('.edu-center__tab-' + urlHash.replace('#', '')).show();
    }

    $('.edu-center__tabs2-cat-list-link').click(function(e){
        e.preventDefault();
        $('.edu-center__tabs2-cat-list-link').removeClass('active');
        $(this).addClass('active');
        var eduCenterID = $(this).data('id');
        $('.edu-center__tab3').hide();
        $('.edu-center__tab3-' + eduCenterID).show();
    });

    $('.edu-center__tabs2-link').click(function(){
        $('.edu-center__tabs2-link').removeClass('active');
        $(this).addClass('active');
        var eduCenterID = $(this).data('id');
        $('.edu-center__tab2').hide();
        $('.edu-center__tabs2-nav').hide();
        $('.edu-center__tab2-' + eduCenterID).show();
        $('.edu-center__tabs2-nav-' + eduCenterID).show();
    });
	
});



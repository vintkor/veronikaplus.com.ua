$('document').ready(function(){

    var windowWidth = $(document).width();

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
            0: {
                items: 1
            },
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
        if( windowWidth < 768 ) {
            $('html, body').animate({scrollTop: $('.edu-center__tab-' + eduCenterID).offset().top}, 800);
        }
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
        if( windowWidth < 768 ) {
            $('html, body').animate({scrollTop: $('.edu-center__tab3-' + eduCenterID).offset().top}, 800);
        }
    });

    $('.edu-center__tabs2-link').click(function(){
        $('.edu-center__tabs2-link').removeClass('active');
        $(this).addClass('active');
        var eduCenterID = $(this).data('id');
        $('.edu-center__tab2').hide();
        $('.edu-center__tabs2-nav').hide();
        $('.edu-center__tab2-' + eduCenterID).show();
        $('.edu-center__tabs2-nav-' + eduCenterID).show();
        if( windowWidth < 768 ) {
            $('html, body').animate({scrollTop: $('.edu-center__cat-maintitle').offset().top}, 800);
        }
    });

    // Меняем местами блоки в категории Блог
    if( windowWidth < 768 ) {
        $('.prepend').each(function(){
            var blockBottom = $(this).find('.block-bottom');
            blockBottom.prependTo($(this));
        });
    }

    // Мобильное меню
    $('#menu-top-navigate').slicknav({
        appendTo: '#mobile-menu',
        label: 'Меню'
    });

    // Скрытие фильтров в мобильной версии
    if( windowWidth < 768 ) {
        var filterWidget = $('.widget__filter');
        filterWidget.find('.widget').hide();
        filterWidget.append('<button id="show-filter">Показать фильтр</button>');
        filterWidget.append('<button id="hide-filter" style="display: none;">Скрыть фильтр</button>');
        var showFilter = $('#show-filter');
        var hideFilter = $('#hide-filter');
        showFilter.click(function() {
            filterWidget.find('.widget').show(300);
            showFilter.toggle(300);
            hideFilter.toggle(300);
            $('html, body').animate({scrollTop: filterWidget.offset().top}, 800);
        });
        hideFilter.click(function() {
            filterWidget.find('.widget').hide(300);
            showFilter.toggle(300);
            hideFilter.toggle(300);
            $('html, body').animate({scrollTop: filterWidget.offset().top}, 800);
        });
    }
	
});

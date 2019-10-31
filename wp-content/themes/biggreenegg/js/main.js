$(document).ready(function(){
    const $BODY = $('body'),
          $HEADER = $BODY.find('#header');

    let offsetVal = $HEADER.outerHeight();
    $(window).resize(function(){
        offsetVal = $HEADER.outerHeight();
    });

    // Header third level back
    // $('.back-arrow').on('click', function(e){
    //     e.stopPropagation();
    //     e.preventDefault();
    //     alert('adfasdf');
    //     $(".mm-hasnavbar").removeClass('mm-subopened');
    //     $(".mm-hasnavbar").removeClass('mm-hidden');
    //     $(".mm-hasnavbar").addClass('mm-opened');


    //     $(".mm-panel").removeClass('mm-opened');
    //     $(".mm-hasnavbar").addClass('mm-hasnavbar');

    //     return false;
    // });


    // accordions
    $('.accordions-header').on('click', function(e){
        e.preventDefault();
        let that = $(this);
        let container = that.parents('.accordions-container');
        container.toggleClass('open');
        container.find('.accordions-content').stop().slideToggle(300);
    });

    $('.accordions-container.open').each(function(){
        let that = $(this);
        that.find('.accordions-header').trigger('click');
    });



    // header fix
    let headerHeight = $HEADER.outerHeight();
    let lastScrollTop = 0;

    $(window).on('scroll load', function(event) {
        let currentScrollTop = $(this).scrollTop();

        if (currentScrollTop <= 0) {
            setTimeout(function(){
                $BODY.stop(true,true).removeClass('is-scrolling is-scrolling-down is-scrolling-up');
            },300);

        } else if (currentScrollTop > lastScrollTop) {

            $BODY.stop(true,true).removeClass('is-scrolling-up');
            $BODY.stop(true,true).addClass('is-scrolling is-scrolling-down');

        } else {
            $BODY.stop(true,true).removeClass('is-scrolling-down');
            $BODY.stop(true,true).addClass('is-scrolling is-scrolling-up');
        }
        lastScrollTop = currentScrollTop;
    });


    // scroll to anchor
    function anchor(e) {
        e.preventDefault();
        let ank = $(this).attr('href');
        let section = $('body').find(ank);

        if(section.length > 0){
            let topToScroll = section.offset().top - $('#header').outerHeight();

            if($('html').is('.mm-opened')){
                $("#mobile-menu").data("mmenu").close();
                $(".b-menu-icon").removeClass("active");

                setTimeout(function(){
                    topToScroll = section.offset().top - $('#header').outerHeight();

                    $('html, body').animate({
                        scrollTop: topToScroll + 1
                    }, 300);
                }, 200);
            } else {
                $('html, body').animate({
                    scrollTop: topToScroll + 1
                }, 300);
            }
        } else {
            let siteUrl = document.location.origin;
            window.location.href = siteUrl + ank;
        }
    }
    $BODY.on('click', '.anchor', anchor);


    // menu
    let mobile;
    let	menuCreated = false;

    $(window).on("load resize", function(){
        mobile = ( $(window).width() < 992 ) ? true : false;
        buildMenu();
    });

    // mobile menu
    function buildMenu(){
        if( mobile && !menuCreated ){
            let $nav = $(".b-menu__content"),
                $navClone = $nav.clone(),
                $btnMenu = $(".b-menu-icon");


            $navClone.appendTo("#mobile-menu");

            let
                parent = $('#mobile-menu'),
                iconSearch = $(".b-header-icon-box__item_search").clone(),
                iconPersonal = $(".b-header-icon-box__item_personal").clone(),
                iconBasket = $(".b-header-icon-box__item_basket").clone(),
                iconGlobal = $(".b-header-icon-box__item_global").clone(),
                btnMenu = $(".col_mob-menu").clone(),
                subMenu = btnMenu.find('.b-menu-submenu');

            btnMenu.find('.b-menu-icon').addClass('active');


            $('#mobile-menu ').mmenu({
                extensions : ['theme-black', 'effect-menu-slide', 'pagedim-black','border-none','fullscreen', 'position-top'],
                /*offCanvas :{
                    position: 'top'
                    },*/
                /*navbar : {
                    title: null
                },*/
                navbars : [
                    {
                        position: 'top',
                        content: [
                            btnMenu,
                            '<div class="col">' + iconSearch.html() + '</div>',
                            '<div class="col">' + iconGlobal.html() + '</div>',
                            '<div class="col">' + iconPersonal.html() + '</div>',
                            '<div class="col">' + iconBasket.html() + '</div>',
                        ]

                    },
                ],
                /*   slidingSubmenus: false,*/

            });



            $btnMenu.click(function(e) {
                e.preventDefault();
                $(this).addClass("active");
            });

            let api = parent.data("mmenu");
            api.bind("open:start", function(){
                $btnMenu.addClass("active");
            });
            api.bind("close:before", function(){
                $btnMenu.removeClass("active");
            });

            api.bind("close:after", function(){
                $('html, body').stop();
            });

            $('.b-menu-icon.active').on('click', function () {
                api.close();
            });

            /*api.bind( "openPanel:start", function( $panel ) {
                btnMenu.find('.b-menu-icon').addClass('hide');
                subMenu.removeClass('hide');
                console.log($panel);
            }).bind( "closeAllPanels:after", function( $panel ) {
                btnMenu.find('.b-menu-icon').removeClass('hide');
                subMenu.addClass('hide');
                console.log(2);
            });*/

            /*subMenu.on('click', function (e){
                e.preventDefault();
                api.closeAllPanels($('#mm-1m.mm-opened .mm-listview'));
                subMenu.addClass('hide');
                btnMenu.find('.b-menu-icon').removeClass('hide');
            });*/

            menuCreated = true;

        }

        if( !mobile && menuCreated ){
            $("#mobile-menu").data("mmenu").close();
            $(".b-menu-icon").removeClass("active");
        }
    }


    /*$('.mm-opened > .mm-navbar > .mm-prev').trigger('click');*/

    $BODY.on('click', '.modal-btn', function (e) {
       e.preventDefault();
        let that = $(this);
        let href = that.attr('href');
        let block = $(href);

        block.find('form').trigger('reset');
        block.find('input, textarea').val('');

        $.fancybox.open({
            src  : href,
            type : 'inline',
            autoFocus: false,
            opts : {
                beforeShow : function(){
                },
                afterShow : function(){
                },
                afterClose: function(){

                },
                baseClass : ''
            }
        });
    });


    $('.read-more').on('click', function (e) {
        e.preventDefault();
        let that = $(this);
        let parent = that.parents('.read-more-container');
        parent.find('.read-more-dropdown').css('display','inline');
        that.hide();
    });


    // add zero to number
    function padZero(n) {
        return (n < 10) ? ("0" + n) : n;
    }

    // slider counter
    function sliderCounter(obj, itemClass, control) {
        let counter = obj.find(itemClass).length;
        obj.find(control).text(padZero(counter));
    }

    // slider status bar
    function sliderStatusBar(obj, bar, speed) {
        let lines = obj.find(bar).find('span');
        lines
            .css('width', 0)
            .stop()
            .animate({
                'width': '100%'
            }, speed);
    }

    



    function moveSlider(){
        let sliders = $('.b-natural__list > .row-flex');
        let windowWidth = $(window).width();

        sliders.each(function () {
            let that = $(this);

            if( windowWidth > 767 && that.is('.slick-initialized')){
                that.removeClass('slider').slick('unslick');
            } else if(windowWidth < 767 && that.not('.slick-initialized')) {
                that.addClass('slider');
                that.not('.slick-initialized').slick({
                    dots: true,
                    infinite: false,
                    speed: 300,
                    arrows: true,
                    prevArrow: '<button type="button" class="slick-arrow_prev"><i class="icon-back"></i></button>',
                    nextArrow: '<button type="button" class="slick-arrow_next"><i class="icon-next"></i></button>',
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    responsive: [
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        },
                    ]
                });

            }
        });
    }

    moveSlider();

    $(window).resize(function () {
        moveSlider();
    });

    


    $('.dropdown-clicker').on('click', function(){
        let that = $(this);
        let container = that.parents('.dropdown-container');
        let content = container.find('.dropdown-content');
        let icon = container.find('.icon');


        container.toggleClass('dropdown-container_open');
        content.slideToggle(300);
        if (container.is('.dropdown-container_open') && icon.is('.icon-plus')){
            icon.removeClass('icon-plus').addClass('icon-minus');
        }
        else{
            icon.removeClass('icon-minus').addClass('icon-plus');
        }
    });

    /*$('.dropdown-clicker').on('click', function(){
        let that = $(this);
        let container = that.parents('.dropdown-container');
        let content = container.find('.dropdown-content');

        container.toggleClass('dropdown-container_open');
        content.slideToggle(300);
    });*/

    function ifMacIos() {
        let mac = /(Mac|iPhone|iPod|iPad)/i.test(navigator.platform);

        if (mac) {
            $('body').addClass('apple-device');
        }
    }
    ifMacIos();

    // tabs
    $BODY.on('click', '.tab-btn', function (e) {
        e.preventDefault();
        let that = $(this);

        if(that.is('.select-tab_nav')){
            let container = that.parents('.select-tab');
            let select = container.find('.select-tab__btn select');
            let index = that.parent('li').index();

            select.find('option').eq(index).prop('selected', true);
        }

        $(this).tab('show');
    });

    $('.select-tab__btn').on('change', function () {
        let that = $(this);
        let container = that.parents('.select-tab');
        let optionIndex = that.find('option:selected').index();

        container.find('li').eq(optionIndex).find('.tab-btn').trigger('click');
    });



    

    // Set document scrolling event handler
    $('.b-contact__list').on("scroll", function() {
        var visible = [];
        var scrollStart = $(this).scrollTop();
        var scrollEnd = scrollStart+$(window).height();
        var vis = [];
        for (var i=0, l=pos.length; i<l; i++) {
            if (pos[i].top < scrollStart || pos[i].top > scrollEnd) {
                continue;
            }
            console.log(pos[i]);
            /*vis.push(pos[i].el.attr("class"));*/
        }

        console.log(vis.join(", "));

    }).scroll();


    // animation
    function animationRun(data){
        if(data || data != 0){
            data = $(window).scrollTop();
        }

        $('[data-animation]').each(function(){
            var that = $(this);
            var boxPositionTop = that.offset().top;

            if(data+$(window).height()/1.2 > boxPositionTop){
                that.addClass(that.attr('data-animation'));
            }
        });
    }
    animationRun();

    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        animationRun(scroll);
    });

    $(document).ready(function(){
 
        $("#explore").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                  

                  $('html, body').animate({
                    scrollTop: $(hash).offset().top
                  }, 800, function(){

                    window.location.hash = hash;
                });
            }
        });
    });

    AOS.init({ });

});

jQuery(document).ready(function ($) {
    "use strict";

    $('.offcanvas-menu').on('click', 'li.menu-item > a', function (e) {
        var _self = $(this),
            parent = _self.closest('li.menu-item'),
            root = parent.closest('ul.offcanvas-menu'),
            target = parent.find('> ul.sub-menu');
        if (target.length) {
            e.preventDefault();
            root.find('ul.sub-menu').removeClass('open');
            target.addClass('open');
            return false;
        }
    });

    var a = $('.offscreen-navigation .menu');

    if (a.length) {
        a.children("li").addClass("menu-item-parent");
        a.find(".menu-item-has-children > a").on("click", function (e) {
            e.preventDefault();
            $(this).toggleClass("opened");
            var n = $(this).next(".sub-menu"),
                s = $(this).closest(".menu-item-parent").find(".sub-menu");
            a.find(".sub-menu").not(s).slideUp(250).prev('a').removeClass('opened'), n.slideToggle(250)
        });
        a.find('.menu-item:not(.menu-item-has-children) > a').on('click', function (e) {
            $('.rt-slide-nav').slideUp();
            $('body').removeClass('slidemenuon');
        });
    }


    function rt_hero_effect() {
        "use strict";
        var scrollCurrent = window.pageYOffset;
        var scrollOpacity = 1 - (scrollCurrent / 500);
        jQuery("#rt-entry-banner").css({opacity: scrollOpacity});
    }

    jQuery(window).on('scroll', function () {
        rt_hero_effect();
    });

    function rtanimation_portfolio() {
        jQuery('.roofix-portfolio-animation-wrap').each(function () {
            jQuery(this).on('mouseenter', function () {
                if (jQuery(this).data('title')) {
                    jQuery('.roofix-portfolio-animation-title').html(jQuery(this).data('title') + '<span class="work-cat">' + jQuery(this).data('category') + '</span>');
                    jQuery('.roofix-portfolio-animation-title').addClass('visible');
                }
                jQuery(document).on('mousemove', function (e) {
                    jQuery('.roofix-portfolio-animation-title').css({
                        left: e.clientX - 10,
                        top: e.clientY + 25
                    });
                });
            }).on('mouseleave', function () {
                jQuery('.roofix-portfolio-animation-title').removeClass('visible');
            });
        });
    }

    rtanimation_portfolio();

    /*-- Button-Hover-Effect-Script --*/
    $('.mouse-dir').on('mouseenter', function (e) {
        var parentOffset = $(this).offset(),
            relX = e.pageX - parentOffset.left,
            relY = e.pageY - parentOffset.top;
        if ($(this).find('.mouse-dir .dir-part')) {
            $('.mouse-dir .dir-part').css({
                top: relY,
                left: relX,
            });
        }
    });

    $('.mouse-dir').on('mouseout', function (e) {
        var parentOffset = $(this).offset(),
            relX = e.pageX - parentOffset.left,
            relY = e.pageY - parentOffset.top;
        if ($(this).find('.mouse-dir .dir-part')) {
            $('.mouse-dir .dir-part').css({
                top: relY,
                left: relX,
            });
        }
    });


    /*-------------------------------------
    ## making things square
    -------------------------------------*/
    $.fn.squareMaker = function () {
        this.each(function (index, el) {
            var width = $(el).outerWidth();
            var height = $(el).outerHeight();
            var biggarValue = width > height ? width : height;
            biggarValue = biggarValue + 50;
            $(el).height(biggarValue);
            $(el).width(biggarValue);
        });
        return this;
    };

    /*Infinity Scroll JS*/
    var infinityData = {
        canBeLoaded: true,
        bottomOffset: 200,
        hasMorePost: true,
        paged: 1,
        scrollWrapper: $('.rt-infinity-scroll') || false
    };
    var working = false;
    if (infinityData.scrollWrapper.length) {
        $(document).on('scroll load', function () {
            var loadData = $('.lodemoredat').data('addondata');
            var edata = $('.lodemoredat').data('edata');

            var data = {
                    'dataall': edata,
                    id: 23,
                    'action': 'rt_load_more'
                },
                scrollPoint = $(document).scrollTop(),
                devHeight = infinityData.scrollWrapper.offset().top + infinityData.scrollWrapper.outerHeight() - 650;


            if (scrollPoint >= devHeight && working == false) {
                working = true;

                console.log('Scroll trigger 2');

                $.ajax({
                    url: RoofixObj.ajaxurl,
                    data: data,
                    type: 'POST',
                    beforeSend: function (xhr) {

                    },
                    success: function (data) {
                        console.log(data);

                    }
                });

                setTimeout(function () {
                    working = false;
                }, 4000)

            }
        });
    }


    var offcanvasMenu = function () {
        /*-------------------------------------
        Offcanvas Menu activation code
        -------------------------------------*/
        $('#wrapper').on('click', '.offcanvas-menu-btn', function (e) {
            e.preventDefault();
            var $this = $(this),
                wrapper = $(this).parents('body').find('>#wrapper'),
                wrapMask = $('<div />').addClass('offcanvas-mask'),
                offcanvasTarget = $(this).data('target'),
                offcanvas = $(offcanvasTarget),
                position = offcanvas.data('position') || 'left';
            wrapMask.css({
                "animation-name": position == 'left' ? 'slideInLeft' : 'slideInRight',
            });

            if ($this.hasClass('menu-status-open')) {
                wrapper.addClass('open').append(wrapMask);
                $this.removeClass('menu-status-open').addClass('menu-status-close');
                offcanvas.css({
                    'transform': 'translateX(0)',
                    'top': calculateWpAdminHeight(),
                });
            } else {
                removeOffcanvas();
            }

            function removeOffcanvas() {
                wrapper.removeClass('open').find('> .offcanvas-mask').remove();
                $this.removeClass('menu-status-close').addClass('menu-status-open');
                var transformProperty = 'translateX(-100%)';
                if (RoofixObj.is_rtl) {
                    transformProperty = position === 'left' ? 'translateX(100%)' : 'translateX(-100%)';
                } else {
                    transformProperty = position === 'left' ? 'translateX(-100%)' : 'translateX(100%)';
                }
                offcanvas.css({
                    'transform': transformProperty,
                });
            }

            $(".offcanvas-mask, .offcanvas-close").on('click', function () {
                removeOffcanvas();
            });

            return false;
        });
    }

    /*---------- 08. Popup Sidebar and Search Box ----------*/
    function popupElement() {
        // Sidebar Popup
        $('.sidebarBtn.circle-btn').on('click', function (e) {
            e.preventDefault();
            $('.overly-sidebar-wrapper').addClass('show');
            $('.offcanvas-menu-btn').addClass('menu-status-open');
        });

        $('.mean-bar .sidebarBtn').on('click', function (e) {
            e.preventDefault();
            if ($('.rt-slide-nav').is(":visible")) {
                $('.rt-slide-nav').slideUp();
                $('body').removeClass('slidemenuon');
            } else {
                $('.rt-slide-nav').slideDown();
                $('body').addClass('slidemenuon');
            }

        });

        $('.overly-sidebar-wrapper').on('click', function (e) {
            e.stopPropagation();
            $('.overly-sidebar-wrapper').removeClass('show');
            $('.offcanvas-menu-btn').removeClass('menu-status-open');
        });
        $('.overly-sidebar-wrapper .overly-sidebar-content').on('click', function (e) {
            e.stopPropagation();
            $('.overly-sidebar-wrapper').addClass('show');
            $('.offcanvas-menu-btn').removeClass('menu-status-open');
        });
        $('#sidebar-close').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('.overly-sidebar-wrapper').removeClass('show');
            $('.offcanvas-menu-btn').removeClass('menu-status-open');
        });
    };

    popupElement();

    var calculateWpAdminHeight = function () {
        var wpadminbar = $('#wpadminbar');
        var wpadminbarHeight = 0;
        if (wpadminbar) {
            wpadminbarHeight = wpadminbar.outerHeight();
        }
        return wpadminbarHeight;
    }

    if ($('body').hasClass('has-sticky-menu')){
        var stickyOffset = $('#masthead').offset().top + 200;
        $(window).scroll(function(){
          var sticky = $('.rt-header-menu'),
              scroll = $(window).scrollTop();
          if (scroll >= stickyOffset) sticky.addClass('rt-sticky');
          else sticky.removeClass('rt-sticky');
        });
    }

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        elevateZoom();
    });

    function elevateZoom() {
        if ($.fn.elevateZoom !== undefined) {
            $('.zoom_01').elevateZoom({
                zoomType: "inner",
                cursor: "crosshair",
                zoomWindowFadeIn: 500,
                zoomWindowFadeOut: 200
            });
        }
    }

    function alignModal() {
        var modalDialog = $(this).find(".modal-dialog");
        // Applying the top margin on modal dialog to align it vertically center
        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
    }

    // Align modal when it is displayed
    $(".modal").on("shown.bs.modal", alignModal);

    // Align modal when user resize the window
    $(window).on("resize", function () {
        $(".modal:visible").each(alignModal);
    });
    $('.rt-content, .rt-sidebar').theiaStickySidebar({
        // Settings
        additionalMarginTop: 200,
        additionalMarginBottom: 200
    });

    //Header Search
    $('a[href="#header-search"]').on("click", function (event) {
        event.preventDefault();
        $("#header-search").addClass("open");
        $('#header-search > form > input[type="search"]').focus();
    });

    $("#header-search, #header-search button.close").on("click keyup", function (event) {
        if (
            event.target === this ||
            event.target.className === "close" ||
            event.keyCode === 27
        ) {
            $(this).removeClass("open");
        }
    });


    /* Scroll to top */
    $('.scrollup.back-top').on('click', function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup.back-top').fadeIn();
        } else {
            $('.scrollup.back-top').fadeOut();
        }
    });


    /* Search Box */
    $(".search-box-area").on('click', '.search-button, .search-close', function (event) {
        event.preventDefault();
        if ($('.search-text').hasClass('active')) {
            $('.search-text, .search-close').removeClass('active');
        } else {
            $('.search-text, .search-close').addClass('active');
        }
        return false;
    });

    /* Header Right Menu */
    $('.additional-menu-area').on('click', '.side-menu-trigger', function (e) {
        e.preventDefault();
        var width = $('.sidenav').width();
        if (width == 280) {
            $('.sidenav').width(0);
        } else {
            $('.sidenav').width(280);
        }
    });
    $('.additional-menu-area').on('click', '.closebtn', function (e) {
        e.preventDefault();
        $('.sidenav').width(0);
    });

    /* Mega Menu */
    $('.site-header .main-navigation ul > li.mega-menu').each(function () {
        // total num of columns
        var items = $(this).find(' > ul.sub-menu > li').length;
        // screen width
        var bodyWidth = $('body').outerWidth();
        // main menu link width
        var parentLinkWidth = $(this).find(' > a').outerWidth();
        // main menu position from left
        var parentLinkpos = $(this).find(' > a').offset().left;

        var width = items * 220;
        var left = (width / 2) - (parentLinkWidth / 2);

        var linkleftWidth = parentLinkpos + (parentLinkWidth / 2);
        var linkRightWidth = bodyWidth - (parentLinkpos + parentLinkWidth);

        // exceeds left screen
        if ((width / 2) > linkleftWidth) {
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                right: 'inherit',
                left: '-' + parentLinkpos + 'px'
            });
        }
        // exceeds right screen
        else if ((width / 2) > linkRightWidth) {
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                left: 'inherit',
                right: '-' + linkRightWidth + 'px'
            });
        } else {
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                left: '-' + left + 'px'
            });
        }
    });

    //woocommerce ajax

    var WooCommerce = {
        quantity_change: function quantity_change() {
            $(document).on('click', '.quantity .input-group-btn .quantity-btn', function () {
                var $input = $(this).closest('.quantity').find('.input-text');

                if ($(this).hasClass('quantity-plus')) {
                    $input.trigger('stepUp').trigger('change');
                }

                if ($(this).hasClass('quantity-minus')) {
                    $input.trigger('stepDown').trigger('change');
                }
            });
        },
        wishlist_icon: function wishlist_icon() {
            $(document).on('click', '.rdtheme-wishlist-icon', function () {
                if ($(this).hasClass('rdtheme-add-to-wishlist')) {
                    var $obj = $(this),
                        productId = $obj.data('product-id'),
                        afterTitle = $obj.data('title-after');
                    var data = {
                        'action': 'roofix_add_to_wishlist',
                        'context': 'frontend',
                        'nonce': $obj.data('nonce'),
                        'add_to_wishlist': productId
                    };
                    $.ajax({
                        url: RoofixObj.ajaxurl,
                        type: 'POST',
                        data: data,
                        beforeSend: function beforeSend() {
                            $obj.find('.wishlist-icon').hide();
                            // $obj.find('.wl-btn-text').hide();
                            $obj.find('.ajax-loading').show();
                            $obj.addClass('rdtheme-wishlist-ajaxloading');
                        },
                        success: function success(data) {
                            if (data['result'] != 'error') {
                                $obj.find('.ajax-loading').hide();
                                $obj.removeClass('rdtheme-wishlist-ajaxloading');
                                $obj.find('.wishlist-icon').removeClass('far fa-heart').addClass('fas fa-heart').show();
                                $obj.removeClass('rdtheme-add-to-wishlist').addClass('rdtheme-remove-from-wishlist');
                                $obj.attr('title', afterTitle);
                                $obj.find('.wl-btn-text').text(afterTitle);
                                $(".wl-btn-text").text(function (index, text) {
                                    return text.replace("Add to Wishlist", "Added in Wishlist! View Wishlist");
                                });
                            } else {
                                console.log(data['message']);
                            }
                        }
                    });
                    return false;
                }
            });
        }
    };

    WooCommerce.wishlist_icon();
    WooCommerce.quantity_change();
    // Scripts needs loading inside content area
    rdtheme_content_ready_scripts();
});

(function ($) {
    "use strict";

    // Window Load+Resize
    $(window).on('load resize', function () {
        // Define the maximum height for mobile menu
        var wHeight = $(window).height();
        wHeight = wHeight - 50;
        $('.mean-nav > ul').css('max-height', wHeight + 'px');
        // rdtheme_content_footer();
    });

    // Window Load
    $(document).ready(function () {
        // Owl Slider
        rdtheme_content_load_scripts();
        // Preloader
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });

        $('#site-navigation').navpoints({
            updateHash:true
        });

    });

    // Elementor
    $(window).on('elementor/frontend/init', function () {
        if (elementorFrontend.isEditMode()) {
            elementorFrontend.hooks.addAction('frontend/element_ready/widget', function () {
                rdtheme_content_ready_scripts()
                rdtheme_content_load_scripts();
            });
        }
    });


})(jQuery);


function rdtheme_content_footer() {
    var $ = jQuery;
    if ($(window).width() > 991) {
        $("#page").each(function () {
            var tHeight = $(".footer-wrap-fix-off").outerHeight();

            $(this).css({
                marginBottom: tHeight
            });
        });
    } else {
        $(this).css({
            marginBottom: 0
        });
    }
}

function rdtheme_content_ready_scripts() {
    var $ = jQuery;

    /* Counter */
    if (typeof $.fn.counterUp == 'function') {
        $('.rt-el-counter .rt-counter-num').counterUp({
            delay: $(this).data('rtsteps'),
            time: $(this).data('rtspeed')
        });
    }
}

function rdtheme_content_load_scripts() {
    var $ = jQuery;

    /* Circle Bars - Knob */
    if (typeof ($.fn.knob) !== undefined) {
        $('.knob.knob-percent.dial').each(function () {
            var $this = $(this),
                knobVal = $this.attr('data-rel');
            $this.knob({
                'draw': function () {
                },
                'format': function (value) {
                    return value + '%';
                }
            });
            $this.appear(function () {
                $({
                    value: 0
                }).animate({
                    value: knobVal
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.val(Math.ceil(this.value)).trigger('change');
                    }
                });
            }, {
                accX: 0,
                accY: -150
            });
        });
    }

    //Utility function - for keeping same height widget
    function sameHeight(selector) {
        var elements = $(selector);
        var max_height = 0;
        elements.each(function (index, el) {
            var height = $(el).height();
            var index = index;
            console.log(index);
            if (height > max_height) {
                max_height = height;
            }
        });
        elements.height(max_height);

    }

    sameHeight('slick-slider-layout1 .slick-nav-wrap .slick-nav .nav-item .item-icon');

    /*-------------------------------------
    Masonry
    -------------------------------------*/
    if ($('#primary').find('div.rt-masonry-grid').length !== 0) {
        var grid = $('.rt-masonry-grid').imagesLoaded(function () {
            $grid = grid.isotope({
                // set itemSelector so .grid-sizer is not used in layout
                itemSelector: '.rt-grid-item',
                percentPosition: true,
                isAnimated: true,
                masonry: {
                    columnWidth: '.rt-grid-item',
                    horizontalOrder: true
                },
                animationOptions: {
                    duration: 700,
                    easing: 'linear',
                    queue: false
                }
            });
        });
    }


    /*-------------------------------------
   Popup
   -------------------------------------*/
    var yPopup = $(".popup-youtube");
    if (yPopup.length) {
        yPopup.magnificPopup({
            disableOn: 320,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    }

    if ($('.zoom-gallery').length) {
        $('.zoom-gallery').each(function () { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a.ne-zoom', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    }

    /* Logo slider */

    $(".rt-el-logo-slider").each(function () {

        var options = $(this).find('.swiper-wrapper').data('carousel-options');

        var swiper = new Swiper($(this), {
            init: false,
            loop: true,
            paginationClickable: true,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                type: 'bullets',
            },
            breakpoints: {
                1200: {
                    slidesPerView: options['col_lg'],
                    slidesPerGroup:options['col_lg'],
                },
                992: {
                    slidesPerView: options['col_md'],
                    slidesPerGroup:options['col_md'],
                },
                768: {
                    slidesPerView: options['col_sm'],
                    slidesPerGroup:options['col_sm'],
                },
                480: {
                    slidesPerView: options['col_xs'],
                    slidesPerGroup:options['col_xs'],
                },
                0: {
                    slidesPerView: options['col_mobile'],
                    slidesPerGroup:options['col_mobile'],
                },
            },
        });
        if (options['autoplay']) {
            swiper.params.autoplay.enabled = true;
            swiper.params.autoplay.delay = options['speed'];
        }
        swiper.init();
    });

    /*Video box slide*/
        $(".video-box-slide").each(function () {

            var main_wrapper = $(this).find('.swiper-container');

            var swiper = new Swiper( main_wrapper, {
                loop: true,
                paginationClickable: true,
                slidesPerView: 1,
                spaceBetween: 0,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    type: 'bullets',
                },
                 autoplay: {
                   delay: 300000,
                 },
            });
        });

    /* Project slider */

    $(".rt-porject-slide").each(function () {

        var options = $(this).find('.swiper-wrapper').data('carousel-options');
        var nxt = $(this).parent().find('.rt-prev');
        var prv = $(this).parent().find('.rt-next');

        var swiper = new Swiper($(this), {
            init: false,
            loop: options['loop'],
            paginationClickable: true,
            spaceBetween: options['margin'],
              navigation: {
                nextEl: nxt,
                 prevEl: prv,
              },
            breakpoints: {
                1200: {
                    slidesPerView: options['col_lg'],
                },
                992: {
                    slidesPerView: options['col_md'],
                },
                768: {
                    slidesPerView: options['col_sm'],
                },
                480: {
                    slidesPerView: options['col_xs'],
                },
                0: {
                    slidesPerView: options['col_mobile'],
                },
            },
        });
        if (options['autoplay']) {
            swiper.params.autoplay.enabled = true;
            swiper.params.autoplay.delay = options['autoplayTimeout'];
        }
        swiper.init();
    });

    /* Service slider */

    $(".rt-owl-carousel").each(function () {

        var options = $(this).find('.swiper-wrapper').data('carousel-options');

        var swiper = new Swiper($(this), {
            init: false,
            //loop: options['loop'],
            paginationClickable: true,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                type: 'bullets',
            },
            breakpoints: {
                1200: {
                    slidesPerView: options['col_lg'],
                    slidesPerGroup:options['col_lg'],
                },
                992: {
                    slidesPerView: options['col_md'],
                    slidesPerGroup:options['col_md'],
                },
                768: {
                    slidesPerView: options['col_sm'],
                    slidesPerGroup:options['col_sm'],
                },
                480: {
                    slidesPerView: options['col_xs'],
                    slidesPerGroup:options['col_xs'],
                },
                0: {
                    slidesPerView: options['col_mobile'],
                    slidesPerGroup:options['col_mobile'],
                },
            },
        });
        if (options['autoplay']) {
            swiper.params.autoplay.enabled = true;
            swiper.params.autoplay.delay = options['autoplaySpeed'];
        }
        swiper.init();
    });

    //Vertical testimonial

    $(".rt-testimonial").each(function () {

        var options = $(this).find('.swiper-wrapper').data('carousel-options');
        var nxt = $(this).find('.rt-prev');
        var prv = $(this).find('.rt-next');
        var swiper = new Swiper($(this), {
          init: false,
          navigation: {
            nextEl: nxt,
             prevEl: prv,
          },
          direction: options['direction'],
          loop: true,
          loopedSlides: 0 ,
          spaceBetween: options['space'],
          slideToClickedSlide: true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
            type: 'bullets',
          },
          breakpoints: {

                1024: {
                    slidesPerView: options['items'],
                },
                767: {
                    slidesPerView: options['items_tablet'],
                },
                0: {
                    slidesPerView: options['items_mobile'],
                },
            },

        });
        if (options['autoplay']) {
            swiper.params.autoplay.enabled = true;
            swiper.params.autoplay.delay = options['speed'];
        }
        swiper.init();

    });


    if (typeof $.fn.isotope == 'function') {
        var $rtGalleryContainer = $('.rt-isotope-wrapper .rt-isotope-content');
        $rtGalleryContainer.isotope({
            filter: '*',
            animationOptions: {
                duration: 1000,
                easing: 'linear',
                queue: false
            }
        });

        $('.rt-isotope-tab a').on('click', function () {
            var $parent = $(this).closest('.rt-isotope-wrapper'),
                selector = $(this).attr('data-filter');

            $parent.find('.rt-isotope-tab .current').removeClass('current');
            $(this).addClass('current');
            $parent.find('.rt-isotope-content').isotope({
                filter: selector,
                animationOptions: {
                    duration: 1000,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });
    }
}

function rdtheme_wc_scripts($) {
    /* Shop change view */
    $('#shop-view-mode li a').on('click', function () {
        $('body').removeClass('product-grid-view').removeClass('product-list-view');

        if ($(this).closest('li').hasClass('list-view-nav')) {
            $('body').addClass('product-list-view');
            Cookies.set('shopview', 'list');
        } else {
            $('body').addClass('product-grid-view');
            Cookies.remove('shopview');
        }
        return false;
    });
}

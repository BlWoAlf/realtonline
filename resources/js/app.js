require('./bootstrap');

import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';

import SwiperCore, { Navigation } from 'swiper/core';
SwiperCore.use([Navigation]);

$(function(){

    if(window.innerWidth < 576){    
        $('.gallary__mini-photo').addClass('gallary__view');
    }

    window.onresize = function(){
        if(window.innerWidth < 576){    
            $('.gallary__mini-photo').addClass('gallary__view');
        }
        if(window.innerWidth >= 576){
            $('.gallary__mini-photo').removeClass('gallary__view');
        }   
    }

    var openPhotoSwipe = function(index){
        var pswpElement = document.querySelectorAll('.pswp')[0];

        var items = [];

        $('.gallary__mini-photo').each(function(i, elem){
            var src = elem.children[0].src.split('/');
            src.splice(src.indexOf('image_cache'),1);
            src.pop();
            var img = src.join('/');
            items[i] = {
                src: img,
                w: 1024,
                h: 1024,
            }
        });

        var options = {
            // history & focus options are disabled on CodePen        
             history: false,
             focus: false,
     
             showAnimationDuration: 0,
             hideAnimationDuration: 0
             
        };

        var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
        gallery.goTo(index);

        gallery.listen('afterChange', function() {
            swiper.slideTo(gallery.getCurrentIndex());
        });
    }

    function initPhotoSwipe(photo) {
        var index = photo.parent().index();
        openPhotoSwipe(index);
    }

    $('.product__gallary').on('click', '.gallary__view', function(){
        initPhotoSwipe($(this));
    });


    const menu = new MmenuLight(
        document.querySelector( ".header__menu" ),
        "(max-width: 991px)"
    );

    const navigator = menu.navigation();
    const drawer = menu.offcanvas();

    $('.header__burger-button').click(function(){        
        drawer.open();
    });

    var swiper = new Swiper(".swiper-container", {
        // loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
    });

    $('.gallary__mini-photo').click(function(){
        var index = $(this).parent().index();
        swiper.slideTo(index);
    });
});

// Modified http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/
// Only fires on body class (working off strictly WordPress body_class)

var ExampleSite = {
  // All pages
  common: {
    init: function() {
      // JS here
    },
    finalize: function() { }
  },
  // Home page
  home: {
    init: function() {
      // JS here
    }
  },
  // About page
  about: {
    init: function() {
      // JS here
    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = ExampleSite;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {

    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });

    UTIL.fire('common', 'finalize');
  }
};

$(document).ready(UTIL.loadEvents);


function share_click(mi, width, height) {
  var leftPosition, topPosition;
  //Allow for borders.
  leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
  //Allow for title and status bars.
  topPosition = (window.screen.height / 2) - ((height / 2) + 50);
  var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
  var u=location.href;
  var t=document.title;
  switch (mi) {
    case 'fb':
      window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer', windowFeatures);
    break;
    case 'g':
      window.open('https://plus.google.com/share?url='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer', windowFeatures);
    break;
    case 'tw':
      window.open('https://twitter.com/share?url='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer', windowFeatures);
    break;
  }
  return false;
}

jQuery(document).ready(function() {

  // var top = $('.nav-main').offset().top - parseFloat($('.nav-main').css('marginTop').replace(/auto/, 0));
  // $(window).scroll(function (event) {
  //   // what the y position of the scroll is
  //   var y = $(this).scrollTop();
  //   // whether that's below the form
  //   if (y >= top) {
  //     // if so, ad the fixed class
  //     $('.nav-main').addClass('fixed');
  //   } else {
  //     // otherwise remove it
  //     $('.nav-main').removeClass('fixed');
  //   }
  // });


  $('.inner').onScreen({
  //direction: 'vertical',
  doIn: function() {
   // Do something to the matched elements as they come in
  },
  doOut: function() {
   // Do something to the matched elements as they get off screen
  },
  tolerance: 0.5,
  toggleClass: true,
  //lazyAttr: null,
  //lazyPlaceholder: 'someImage.jpg'
  });
  
});



var showSidebar = function() {
  $('body').removeClass("active-nav").toggleClass("active-sidebar");
  $('.menu-button').removeClass("active-button");
};
var showMenu = function() {
  $('body').removeClass("active-sidebar").toggleClass("active-nav");
  $('.menu-button').toggleClass("active-button");
};
// add/remove classes everytime the window resize event fires
jQuery(window).resize(function(){
  var off_canvas_nav_display = $('.off-canvas-navigation').css('display');
  var menu_button_display = $('.menu-button').css('display');
  if (off_canvas_nav_display === 'block') {
    $("body").removeClass("three-column").addClass("small-screen");
  }
  if (off_canvas_nav_display === 'none') {
    $("body").removeClass("active-sidebar active-nav small-screen")
      .addClass("three-column");
    }
});

// var hanyadik=1;


// var toggleNagy = function(h) {
//   $('.home-top .nagy span').removeClass("active");
//   $('.home-top .nagy span:nth-child('+(h)+')').addClass("active");
//   setTimeout(function() {
//     if (hanyadik<5) {
//       hanyadik=hanyadik+1;
//     } else {
//       hanyadik=1;
//     }
//     toggleNagy(hanyadik);
//   }, 4000);
// };

// setTimeout(function() {
//     toggleNagy(hanyadik);
//   }, 4000);

jQuery(document).ready(function($) {



    $("#owl-home").owlCarousel({
 
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
      autoHeight : true,

      //transitionStyle: 'fade'
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });


    // Toggle for nav menu
    $('.menu-button').click(function(e) {
      e.preventDefault();
      showMenu();
    });

    $('.popup-youtube, .popup-vimeo, .popup-gmaps, .popup-video').magnificPopup({
      disableOn: 700,
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,

      fixedContentPos: false
    });


    $('.gallery').magnificPopup({
      delegate: 'a',
      type: 'image',
      tLoading: 'Képek betöltése #%curr%...',
      mainClass: 'mfp-img-mobile',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      },
      image: {
        tError: 'Hiba a(z) <a href="%url%">#%curr%</a> kép betöltésekor',
        titleSrc: function(item) {
          return item.el.children().attr('alt'); 
        }
      }
    });

    $('.wpss-field input').prop({
      placeholder: function(){
        return $(this).prev().text();
        //return 'picsa';
      }
    });

    $('.wpss_next').html('Következő <i class="ion-ios7-arrow-thin-right"></i>');
    $('.wpss_back').html('<i class="ion-ios7-arrow-thin-left"></i> Előző');


});
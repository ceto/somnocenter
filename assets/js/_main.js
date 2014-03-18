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

jQuery(document).ready(function($) {
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


});
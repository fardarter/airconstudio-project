jQuery(document).ready( function() {

  // Init flexibility plugin for flexbox backward compat.
  var toKW = 0.000293071;
  var minval = jQuery('.sf-field-post-meta-output_min_btu').find('.sf-range-min').html();
  var maxval = jQuery('.sf-field-post-meta-output_min_btu').find('.sf-range-max').html();
  jQuery('<div class="addedvals">/ <span class="sf-range-min addedvalue-min sf-text-number">' + parseFloat(minval*toKW).toFixed(1) + '</span><span class="sf-range-values-seperator"> - </span><span class="sf-range-max addedvalue-max sf-text-number">' + parseFloat(maxval*toKW).toFixed(1) + '</span><div>').insertAfter('.sf-field-post-meta-output_min_btu .sf-range-max.sf-text-number');

  var winwidth = jQuery(window).width();
  var winheight = jQuery(window).height();
  var headheight = jQuery('header').height();
  var searchheight = jQuery('.searchfields').height();
  var mouseStillDown = false;

var int00;
jQuery('.noUi-handle')
.mousedown(function() {
    mouseStillDown = true;
    int00 = setInterval(function() {doSomething(); }, 50);
})
.mouseup(function() {
    mouseStillDown = false;
    clearInterval(int00);
});

function doSomething() {

      if (!mouseStillDown) {
        return;
      }

       if (mouseStillDown) {
         minval = jQuery('.sf-field-post-meta-output_min_btu').find('.sf-range-min').html();
         maxval = jQuery('.sf-field-post-meta-output_min_btu').find('.sf-range-max').html();
         jQuery('.addedvalue-min').html(parseFloat(minval*toKW).toFixed(1));
         jQuery('.addedvalue-max').html(parseFloat(maxval*toKW).toFixed(1));
       }
}

  jQuery("span:contains('.0'), .datafield:contains('.0')").not('.theprices .datafield, .theprices').each(function(){
    jQuery(this).text(jQuery(this).text().replace(/.0/g,''));
  });

  jQuery(".theprices .datafield:contains('.0')").each(function(){
    jQuery(this).text(jQuery(this).text().replace('.0',''));
  });

  // Minor format fixes on single pages in General section:
  var cap = jQuery('.capappend').html();
  jQuery('.capappend').html('');
  jQuery('.capappended').html(cap);

  var pricepre = jQuery('.theprices .datafield-prepend').html();
  jQuery('.theprices .datafield-prepend').html('');
  jQuery('.theprices .datafield-value').prepend(pricepre);

  //  End format fixes

  jQuery(document).on("sf:ajaxfinish", ".searchandfilter", function(){

	//so load your lightbox or JS scripts here again
    jQuery('.animated').each(function() {

    //set vars
    var el = jQuery(this);
    var animation = el.data('animation');
    var delay = 0;
    if(el.data('delay')){
      delay = el.data('delay');
    }
    //if element must be animated before scrolling
    if(el.hasClass('animate-on-load')){
      setTimeout(function(){
          el.addClass(animation+' animation-complete');
      }, delay);
    } else {
        el.scrollfire({
          bottomOffset: 0,
          topOffset: 0,
          onScroll: function( elm, distance_scrolled ) {
            setTimeout(function(){
                jQuery(elm).addClass(animation+' animated');
              }, delay);
            }
        });
      }
  });
  jQuery('html, body').animate({ scrollTop: 1 }, 'slow');
});

  jQuery('.animated').each(function() {

  //set vars
  var el = jQuery(this);
  var animation = el.data('animation');
  var delay = 0;
  if(el.data('delay')){
    delay = el.data('delay');
  }
  //if element must be animated before scrolling
  if(el.hasClass('animate-on-load')){
    setTimeout(function(){
        el.addClass(animation+' animation-complete');
    }, delay);
  } else {
			el.scrollfire({
        bottomOffset: 0,
        topOffset: 50,
				onScroll: function( elm, distance_scrolled ) {
					setTimeout(function(){
			    		jQuery(elm).addClass(animation+' animated');
		    		}, delay);
		    	}
			});
		}
});

    //remove empty p tags
    jQuery('p').each(function() {
        var $this = jQuery(this);
        if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
            $this.remove();
    });


  //  Removing hover titles on images.

  jQuery("a, img")
    .mouseenter(function() {
      var title = jQuery(this).attr("title");
      jQuery(this).attr("tmp_title", title);
      jQuery(this).attr("title","");
    })
    .mouseleave(function() {
      var title = jQuery(this).attr("tmp_title");
      jQuery(this).attr("title", title);
    })
    .click(function() {
      var title = jQuery(this).attr("tmp_title");
      jQuery(this).attr("title", title);
    });

    // Slick slider
      jQuery('.fade').slick({
        dots: true,
        infinite: true,
        speed: 1000,
        fade: true,
        cssEase: 'linear',
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000
      });

    // Contact form

      function getScrollBarWidth () {
        var $outer = jQuery('<div>').css({visibility: 'hidden', width: 100, overflow: 'scroll'}).appendTo('#page'),
            widthWithScroll = jQuery('<div>').css({width: '100%'}).appendTo($outer).outerWidth();
        $outer.remove();
        return 100 - widthWithScroll;
    };

    function eveningWidth(width) {
      if((width % 2) != 0) {
        return width + 1;
      } else {
        return width;
      }
    }


    jQuery('.closewrap, .modal').on('click', function() {
      var div = jQuery("#page-inner").height();
      var win = jQuery(window).height();
      if (jQuery('.contactdiv').hasClass('inactive') == false) {
        jQuery('.modal').attr("style", "");
        jQuery('.contactdiv').addClass('inactive');
        jQuery('.contactdiv').removeClass('active');
        jQuery('#page').attr("style", "");
        jQuery('.thebuttonitself, .searchfields').attr("style", "");
        jQuery('.searchbox').css({"width": "", "margin-right": ""});
        if (div > win ) {
          jQuery('#page').attr("style", "");
          jQuery('.thebuttonitself, .searchfields').attr("style", "");
          jQuery('.searchbox').css({"width": "", "margin-right": ""});
        }
      }
    });

    jQuery('.contactbut').on('click', function() {
      var scrollwidth = getScrollBarWidth();
      var scrollwidtheven = eveningWidth(scrollwidth);
      var twentyfivewidth = (scrollwidth/100)*25;
      var div = jQuery("#page-inner").height();
      var win = jQuery(window).height();
      winwidth = jQuery(window).width();
      searchheight = jQuery('.searchfields').height();
      winwidth = jQuery(window).width();
      headheight = jQuery('header').height();
      if((jQuery('.contactdiv').hasClass('inactive') == true) || (jQuery('.contactdiv').hasClass('start'))) {
        jQuery('.modal').css({"display": "block"});
        jQuery('#page').css({"overflow": "hidden"});
          if (div > win ) {
            if (winwidth > 600) {
              jQuery('.searchbox').css({"width": "75%"});
              jQuery('.searchfields').css({"width": "calc(100% + " + scrollwidtheven + "px)"});
            } else if (winwidth <= 600) {
              jQuery('.searchbox, .searchfields').css({"width": "calc(100% - " + scrollwidtheven + "px)", "margin-right": scrollwidtheven});
            }
          }
          jQuery('.contactdiv').addClass('active');
          jQuery('.contactdiv').removeClass('inactive');
          jQuery('.contactdiv').removeClass('start');
      } else if (jQuery('.contactdiv').hasClass('inactive') == false) {
        jQuery('.contactdiv').addClass('inactive');
        jQuery('.contactdiv').removeClass('active');
        if (div > win ) {
          jQuery('#page').attr("style", "");
          jQuery('.thebuttonitself, .searchfields').attr("style", "");
          jQuery('.searchbox').css({"width": "", "margin-right": ""});
        }
      }
    });

    // Search dropdown

    searchheight = jQuery('.searchfields').height();
    winwidth = jQuery(window).width();
    headheight = jQuery('header').height();
    if (jQuery('.searchbox').hasClass('active') == false) {
      if (winwidth > 600) {
      jQuery('.searchbox').css({"margin-top": -searchheight});
    } else if (winwidth <= 600) {
        jQuery('.searchbox').css({"margin-top": -searchheight + headheight});
      }
    } else if (jQuery('.searchbox').hasClass('active') == true) {
      if (winwidth > 600) {
      jQuery('.searchbox').css({"margin-top": "0px"});
    } else if (winwidth <= 600) {
        jQuery('.searchbox').css({"margin-top": headheight});
      }
    }

    jQuery('.search-button').on('click', function() {
      searchheight = jQuery('.searchfields').height();
      winwidth = jQuery(window).width();
      headheight = jQuery('header').height();
      if (jQuery('.searchbox').hasClass('active') == false) {
        if (winwidth > 600) {
        jQuery('.searchbox').css({"margin-top": "0"});
      } else if (winwidth <= 600) {
          jQuery('.searchbox').css({"margin-top": headheight});
        }
      } else if (jQuery('.searchbox').hasClass('active') == true) {
        if (winwidth > 600) {
        jQuery('.searchbox').css({"margin-top": -searchheight - 2});
      } else if (winwidth <= 600) {
          jQuery('.searchbox').css({"margin-top": -searchheight - 2 + headheight});
        }
      }


      jQuery('.searchbox').toggleClass('active');
      if (jQuery('.searchbox').hasClass('active')) {
         jQuery('.search-button').html('<div class="thebuttonitself buttonAnim triggerbut">Submit</div>').fadeIn();
         jQuery('.triggerbut').on('click', function() {
           jQuery('input[name="_sf_submit"]').trigger('click');
         });
      } else if ((jQuery('.searchbox').hasClass('active')) == false) {
                 jQuery('.search-button').html('<div class="thebuttonitself  buttonAnim">Filter</div>');
      }
    });

    // Setup for button click above.

    if (jQuery('.searchbox').hasClass('active') == false) {
      if (winwidth > 600) {
      jQuery('.searchbox').css({"margin-top": -searchheight - 2});
    } else if (winwidth <= 600) {
        jQuery('.searchbox').css({"margin-top": -searchheight - 2 + headheight});
      }
    }

    // Apply on resize

    jQuery(window).resize(function(){
      searchheight = jQuery('.searchfields').height();
      winwidth = jQuery(window).width();
      headheight = jQuery('header').height();
      if (jQuery('.searchbox').hasClass('active') == false) {
        if (winwidth > 600) {
        jQuery('.searchbox').css({"margin-top": -searchheight});
      } else if (winwidth <= 600) {
          jQuery('.searchbox').css({"margin-top": -searchheight + headheight});
        }
      } else if (jQuery('.searchbox').hasClass('active') == true) {
        if (winwidth > 600) {
        jQuery('.searchbox').css({"margin-top": "0px"});
      } else if (winwidth <= 600) {
          jQuery('.searchbox').css({"margin-top": headheight});
        }
      }
    });



    // Setting up classes for tabbing

    jQuery('.eachproduct').first().addClass('active');
    jQuery('.button-row').first().addClass('active');
    jQuery('.eachoutdoor').first().addClass('active');
    jQuery('.product-tab.split').first().addClass('clicked');
    jQuery('.product-tab.submulti').first().addClass('clicked');
    jQuery('.product-tab.multi').first().addClass('clicked');


    jQuery('.product-tab.split').on('click', function() {
      var productname = jQuery(this).data('tab');
      jQuery('.product-tab.split').removeClass('clicked');
      jQuery(this).addClass('clicked');
      jQuery('.eachproduct').each(function(){
        // calcFunction();
        var localname = jQuery(this).data('tab');
        if(localname == productname) {
          jQuery('.eachproduct').removeClass('active');
          jQuery(this).toggleClass('active');
        }
      });
    });

    jQuery('.product-tab.multi').on('click', function() {
      var rangename = jQuery(this).data('tab2');
      jQuery('.product-tab.multi').removeClass('clicked');
      jQuery(this).addClass('clicked');
      jQuery('.button-row').each(function() {
        var localname = jQuery(this).data('tab2');
        if(localname == rangename) {
          jQuery('.eachproduct').removeClass('active');
          jQuery('.eachproduct').filter('[data-tab1="' + localname +'"]').first().addClass('active');
          jQuery('.button-row').removeClass('active');
          jQuery(this).toggleClass('active');
          jQuery('.product-tab.submulti').removeClass('clicked');
          jQuery(this).find('.product-tab.submulti').first().addClass('clicked');
        }
      });
      jQuery('.eachoutdoor').each(function() {
        var localname = jQuery(this).data('tab2');
        if(localname == rangename) {
          jQuery('.eachoutdoor').removeClass('active');
          jQuery(this).toggleClass('active');
        }
      });
    });

    jQuery('.product-tab.submulti').on('click', function() {
      var buttonrange = jQuery('.button-row.active').data('tab2');
      var productname = jQuery(this).data('tab');
      jQuery('.product-tab.submulti').removeClass('clicked');
      jQuery(this).addClass('clicked');
      jQuery('.eachproduct').each(function() {
        var rangename = jQuery(this).data('tab1');
        var localname = jQuery(this).data('tab2');
        if((localname == productname) && (buttonrange == rangename))  {
          jQuery('.eachproduct').removeClass('active');
          jQuery(this).toggleClass('active');
        }
      });
    });

});

if (Modernizr.flexbox && Modernizr.flexwrap) {
    console.log('good');
} else {
    jQuery('.isflexed').css({"display": "none"});
    jQuery('.isnotflex').css({"display": "block"});
}

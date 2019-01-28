(function ($) {
  Drupal.Educational = Drupal.Educational || {};

  Drupal.Educational.loginClick = function () {
  	$('.front .educational-login').click(function (event){
  		event.preventDefault();
  	  if ($('#header').hasClass('open')) {
  		$('#header').removeClass('open');
  	  } else {
  	  	$('#header').addClass('open');
  	  };
  	});
  };

  Drupal.behaviors.actionEducational = {
    attach: function (context) {
      Drupal.Educational.changeSkin ();
      Drupal.Educational.backToTop ();
      Drupal.Educational.loginClick ();
      Drupal.Educational.animationOnScroll ();
      Drupal.Educational.editSlideShow ();
      Drupal.Educational.countUpNumber ();  
      Drupal.Educational.clickApplyButton ();
      Drupal.Educational.configAccodian ();
      Drupal.Educational.editCourseSearch ();
      Drupal.Educational.equalHeight($('.views-metro-item:not(:first) .item-inner'));
      Drupal.Educational.setInputPlaceHolder ('submitted[your_name]', 'Your name', '.webform-client-form-46');
      Drupal.Educational.setInputPlaceHolder ('submitted[your_e_mail]', 'Your e-mail', '.webform-client-form-46');
      Drupal.Educational.setInputPlaceHolder ('submitted[subject]', 'Subject', '.webform-client-form-46');
      Drupal.Educational.setInputPlaceHolder ('submitted[comments]', 'Comments', '.webform-client-form-46');
      Drupal.Educational.setInputPlaceHolder ('title', 'Enter any keyword...', '#views-exposed-form-courses-page');
      Drupal.Educational.setInputPlaceHolder ('field_full_name_value', 'Teacher name...', '#views-exposed-form-courses-page');
      Drupal.Educational.setInputPlaceHolder ('search_block_form', 'Enter any terms...', '#search-block-form');
      Drupal.Educational.addPlaceHolderNewDetails ();
      Drupal.Educational.blankPageSocial ();
    }
  };

  Drupal.Educational.blankPageSocial = function() {
    $('.views-field-field-facebook a').attr('target', '_blank');
    $('.views-field-field-google-plus a').attr('target', '_blank');
    $('.views-field-field-linkedin a').attr('target', '_blank');
    $('.views-field-field-twitter a').attr('target', '_blank');
  }

  Drupal.Educational.backToTop = function() {
    $('.btn-btt').smoothScroll({speed: 600});
    $(window).scroll(function() {
      if($(window).scrollTop() > 200) {
        $('.btn-btt').show();
      }
      else {
        $('.btn-btt').hide();
      }
    });
  }

  Drupal.Educational.configAccodian = function() {
    $(".view a.accordion-toggle[href='#collapse0']").trigger("click");
  }

  Drupal.Educational.changeSkin = function() {
    $(".change-skin-button").click(function() {
      parts = this.href.split("/");
      style = parts[parts.length - 1];
      $.cookie("weebpal_skin", style, {path: '/'});
      window.location.reload();
      return false;
    });
    jQuery(".change-background-button").on("click", function() {
      parts = this.href.split("/");
      style = parts[parts.length - 1];
      var current_background = jQuery.cookie("weebpal_background");
      jQuery.cookie("weebpal_background", style, {path: "/"});
      jQuery("body").removeClass(current_background);
      jQuery("body").addClass(style);
      return false;
    });

    $('#change-skin').once('load').on('click', function(){
      $('#change-skin i').toggleClass('fa-spin');
      $('#change_skin_menu_wrapper').toggleClass('fly-out');
    });
  }

  Drupal.Educational.numberWithCommas = function(x) {
    var result = x.toString();
    result = result.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return result;
  }

  Drupal.Educational.numberRemoveCommas = function(x) {
    var result = x.toString();
    result = result.replace('.', '');
    return result;
  }

  Drupal.Educational.countUpNumber = function() {
    //Count to
    $.fn.counter = function(options) {
      // Set default values
      var defaults = {
          start: 0,
          end: 10,
          time: 10,
          step: 1000,
          callback: function() { }
      }
      var options = $.extend(defaults, options);            
      // The actual function that does the counting
      var counterFunc = function(el, increment, end, step) {
          var value = parseInt(el.html(), 10) + increment;
          if(value >= end) {
              el.html(Math.round(end));
              options.callback();
          } else {
              el.html(Math.round(value));
              setTimeout(counterFunc, step, el, increment, end, step);
          }
      }            
      // Set initial value
      $(this).html(Math.round(options.start));
      // Calculate the increment on each step
      var increment = (options.end - options.start) / ((1000 / options.step) * options.time);            
      // Call the counter function in a closure to avoid conflicts
      (function(e, i, o, s) {
          setTimeout(counterFunc, s, e, i, o, s);
      })($(this), increment, options.end, options.step);
    }

    $('.counter .views-field-description .field-content').waypoint(function() {
        $(this).each(function() {
          var item = $(this).find('p');
          var end_num = Drupal.Educational.numberRemoveCommas(item.text());
          //console.log(end_num);
          $(item).counter({
              start: 0,
              end: end_num,
              time: 1,
              step: 20,
              callback: function() {
                $(item).text(Drupal.Educational.numberWithCommas(end_num));
              }
          });
        });
      },
      {
        offset: '80%',
        triggerOnce: true
      });
  }

  Drupal.Educational.animationOnScroll = function() {
    if($(window).width() > 991) {
      var waypointClass = '.animation';
      var bodyClass = $("body").attr("class");
      var match = bodyClass.match(/animation-([a-zA-Z])+/g);
      var animationClass = "none";
      if (match !== null) {
        animationClass = match[0].replace("animation-", "");
      }
      if (animationClass !== "none") {
        var delayTime;
        $(waypointClass).css({opacity: '0'});
        $(waypointClass).waypoint(function() {
          delayTime += 100;
          $(this).delay(delayTime).queue(function(next){
            $(this).addClass('animated');
            $(this).addClass(animationClass);
            $(this).css({opacity: '1'});
            delayTime = 0;
            next();
          });
        },
        {
          offset: '80%',
          triggerOnce: true
        });
      }
    }
  }

  Drupal.Educational.equalHeight = function(elements) {
    highest = 0;
    elements.each(function() {
      if($(this).outerHeight() > highest) {
        highest = $(this).outerHeight();
      }
    });
    return elements.each(function() {
      padding = $(this).innerHeight() - $(this).height();
      extra = padding + ($(this).outerHeight() - $(this).innerHeight());

        $(this).css({'min-height': highest - extra});

    });
  }

  Drupal.Educational.editSlideShow = function() {
    $('.view-slide-accordian').find('.hslider-active').addClass('open');
    $('.view-slide-accordian li').hover( function(){
      $('.view-slide-accordian').find('li').removeClass('open');
      $(this).addClass('open');
    },
    function(){
      //
    });
  }

  Drupal.Educational.clickApplyButton = function() {
    $('.courses-apply').click(function (event){
      window.location.href = $('a:contains("Enrollments")').attr('href');
      event.preventDefault();
    });
  }

  Drupal.Educational.setInputPlaceHolder = function (name, text, selector) {
    selector = selector == undefined ? '' : selector + ' ';

    if ($.support.placeholder) {
      $(selector + 'input[name="' + name + '"]').attr('placeholder', Drupal.t(text));
    }
    else {
      $(selector + 'input[name="' + name + '"]').val(Drupal.t(text));
      $(selector + 'input[name="' + name + '"]').focus(function(){
        if(this.value == Drupal.t(text)) {
          this.value='';
        }
      }).blur(function(){
        if(this.value == '') {
          this.value=Drupal.t(text);
        }
      });
    }
  }

  Drupal.Educational.editCourseSearch = function() {
    $('#views-exposed-form-courses-page #edit-title').attr('placeholder', 'Enter any keyword...');
    $('#views-exposed-form-courses-page #edit-field-full-name-value').attr('placeholder', 'Teacher name');
    $('#views-exposed-form-courses-page #edit-field-campus-tid option').each(function(){
      if (this.value == 'All') {
        $(this).text('All Campus');
        return false;
      }
    });

    $('#views-exposed-form-courses-page-1 #edit-title').attr('placeholder', 'Enter any keyword...');
    $('#views-exposed-form-courses-page-1 #edit-field-full-name-value').attr('placeholder', 'Teacher name');
    $('#views-exposed-form-courses-page-1 #edit-field-campus-tid option').each(function(){
      if (this.value == 'All') {
        $(this).text('All Campus');
        return false;
      }
    });
  }

  Drupal.Educational.addPlaceHolderNewDetails = function() {
    $('#comment-form #edit-field-full-name-und-0-value').attr('placeholder', 'Your name...');
    $('#comment-form #edit-field-email-und-0-value').attr('placeholder', 'Email address...');
    $('#comment-form #edit-subject').attr('placeholder', 'Subject...');
    $('#comment-form #edit-comment-body-und-0-value').attr('placeholder', 'Comment...');
  }

})(jQuery);

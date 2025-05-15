$(function(){
  $('#change_btn').on('click', function(){
    $('#box').toggleClass('changed_color');
  });

  $('#text').hover(
    function(){
      $(this).removeClass('hover_off').addClass('hover_on');
    },
    function(){
      $(this).removeClass('hover_on').addClass('hover_off');
    }
  );

  $('.accordion > li > div').click(function(){
    $(this).next('ul').slideToggle('fast');
  });

  $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
      $('.pageTop_btn').stop(true).fadeIn();
    } else {
      $('.pageTop_btn').stop(true).fadeOut();
    }
  });

  $('.pageTop_btn').click(function(){
    $('body,html').animate({ scrollTop: 0 }, 500);
  });

  $('.tooltips').hide();
  $('#nav li').hover(
    function(){
      $(this).children('.tooltips').fadeIn('fast');
    },
    function(){
      $(this).children('.tooltips').fadeOut('slow');
    }
  );

  $('#calc').on('input', function(){
    const numA = parseInt($('.number_A').val()) || 0;
    const numB = parseInt($('.number_B').val()) || 0;
    $('#number_total').text(numA + numB);
  });

  function tax(price) {
    const TAX = 0.08;
    return Math.round(price * TAX);
  }

  $('#tax').on('change', function(){
    const num = parseInt($('.ex_price').val()) || 0;
    const t = tax(num);
    $('.ex_tax').text(t);
  });

  $('#tax_console').on('change', function(){
    const num = parseInt($('.ex_price_console').val()) || 0;
    const floatTax = num * 0.08;
    console.log(floatTax);
    const t = tax(num);
    $('.ex_tax_console').text(t);
  });
  function modalResize(){
    const w = $(window).width();
    const h = $(window).height();
    const cw = $('.modal-content').outerWidth();
    const ch = $('.modal-content').outerHeight();
    $('.modal-content').css({
      left: ((w - cw) / 2) + 'px',
      top: ((h - ch) / 2) + 'px'
    });
  }

$(function() {
  $('.modal-open').on('click', function(){
    $('#contents').css('filter', 'none');
    $('body').append('<div class="modal-overlay"></div>');
    $('.modal-content, .modal-overlay').fadeIn('slow');

    $('.modal-overlay').on('click', function(){
      $('.modal-content, .modal-overlay').fadeOut('slow',function(){
        $('.modal-overlay').remove();
      });
    });

    modalResize();

    function modalResize(){
      let w = $(window).width();
      let h = $(window).height();
      let cw = $('.modal-content').outerWidth();
      let ch = $('.modal-content').outerHeight();
      $('.modal-content').css({
        'left' : ((w - cw)/2) + 'px',
        'top'  : ((h - ch)/2) + 'px'
      });
    }
  });
});
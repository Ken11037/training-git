$(function(){
  $('#change_btn').click(function(){
    $('#box').css({'color': '#0094d7'})
  });
});
$(function(){
  $('#change_btn').on('click', function(){
    $('#box').toggleClass('changed_color');
  });
});
$(function(){
  $('#text').mouseover(function(){
    $(this).removeClass('hover_off');
    $(this).addClass('hover_on');
  });
  $('#text').mouseout(function(){
    $(this).removeClass('hover_on');
    $(this).addClass('hover_off');
  });
});
$(function(){
  $('.accordion > li > div').click(function(){
    $(this).next('ul').slideToggle('fast');
  });
});
$(function(){
  $(window).scroll(function(){
    if( $(this).scrollTop() > 100 ) {
      $('.pageTop_btn').stop(true).fadeIn();
    } else {
      $('.pageTop_btn').stop(true).fadeOut();
    }
  });
  $('.pageTop_btn').click(function(){
    $('body,html').animate({ scrollTop:0 },500);
  });
});
$(function(){
  $('.tooltips').hide();
  $('#nav li').hover(
    function(){
      $(this).children('.tooltips').fadeIn('fast');
    },
    function(){
      $(this).children('.tooltips').fadeOut('slow');
    });
});
$(function(){
  $('#calc').on('input', function(){
    let numA = parseInt($('.number_A').val()) || 0;
    let numB = parseInt($('.number_B').val()) || 0;
    $('#number_total').text(numA + numB);
  });
 });
function tax(price) {
  let TAX = 0.08;
  let floatTax = price * TAX;
  return Math.round(floatTax);
}
$(function(){
  $('#tax').on('change', function(){
    let num = parseInt( $('.ex_price').val() );
    let t   = tax(num);
    $('.ex_tax').text(t);
  });
});
$(function(){
  $('#tax_console').on('change', function(){
    let num      = parseInt( $('.ex_price_console').val() );
    let floatTax = num * 0.08;
    console.log(floatTax);
    let t        = tax(num);
    $('.ex_tax_console').text(t);
  });
});
$(function(){
  $('.modal-open').on('click', function(){
    $('#contents').css('filter', 'none');
    if ($('.modal-overlay').length === 0) {
      $('body').append('<div class="modal-overlay"></div>');
    }
    $('.modal-content, .modal-overlay').fadeIn('slow');
    $('.modal-overlay').on('click', function(){
      $('.modal-content, .modal-overlay').fadeOut('slow', function(){
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
        'left': ((w - cw)/2) + 'px',
        'top' : ((h - ch)/2) + 'px'
      });
    }
    $(window).on('resize', modalResize);
  });
});

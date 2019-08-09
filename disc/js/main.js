$(document).ready(function(){

  var content=$("#portfolio-content .container .row"),tabs=$(".tag-portfolio span");
  tabs.on('click', function(){

    tabs.removeClass('active-portfolio').filter(this).addClass('active-portfolio');
    var filter=$(this).data('filter');
    
    content.isotope({
      filter: filter
    });
    return false;
  });




  // woocommerce-product-gallery__wrapper 

  // $('.woocommerce-product-gallery__wrapper').lightSlider({
  //     gallery: true,
  //     item: 1,
  //     loop:true,
  //     slideMargin: 0,
  //     thumbItem: 9
  // });

  
  $(' .tagProject span:first-child ').addClass('active');


});

$(document).ready(function(){

// init Isotope

  var content=$(".ProjectImg"),tabs=$(".tagProject span");

  var firstCateVal = $(".tagProject span:first-child").attr('data-filter');
  content.isotope({
    filter: firstCateVal,
  });
  
  tabs.on('click', function(){

    tabs.removeClass('active').filter(this).addClass('active');
    var filter=$(this).data('filter');
    
    content.isotope({
      filter: filter,
    });
    return false;
  });


///test

});




  // carousel COmment
  
  $(document).ready(function(){
    ////  present in home portfilio page
    $('.CommentCaousel').slick({
      dots: true,
      nextArrow: false,
      prevArrow: false
    });
    $('.Testimonial').slick({
      dots: false,
      nextArrow: false,
      prevArrow: false,
      autoplay:true
    });

    $('.testi-homedisplay').slick({
      dots: true,
      nextArrow: false,
      prevArrow: false
    });
    
   
  });

/////event for hamburger

$(document).ready(function(){
	$('.hamburger').click(function(){
    $('.MoblieNav').slideToggle(300);
    $('.hamburger').toggleClass('open');
	});
});


//////serarch button
$(document).ready(function(){
	$('.SearchDesk').click(function(){
    $('.search-form').slideToggle(300);
    $('.MobilebagContainer input').slideToggle(300);
	});
});

  // ExpertTag Carousel
  $('.CarouselStaff').slick({
    nextArrow: '<i class="ion-arrow-right-c"></i>',
    prevArrow: '<i class="ion-arrow-left-c"></i>',
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          infinite: true
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }

    ]
  });
  
///Quantity cart
$('#add').click(function () {
  if ($('.quantity .input-text').val() < 999) {
  $('.quantity .input-text').val(+$('.quantity .input-text').val() + 1);
  }
  });
  $('#sub').click(function () {
    if ($('.quantity .input-text').val() > 1) {
    if ($('.quantity .input-text').val() > 1) $('.quantity .input-text').val(+$('.quantity .input-text').val() - 1);
    }
  });



// blog/ quanity

$('#add').click(function () {
  if ($('#bedroom').val() < 100) {
    $('#bedroom').val(+$('#bedroom').val() + 1);
  }
});
$('#sub').click(function () {
  if ($('#bedroom').val() > 0) {
    if ($('#bedroom').val() > 0) $('#bedroom').val(+$('#bedroom').val() - 1);
  }
});


$('#add2').click(function () {
  if ($('#bathroom').val() < 100) {
    $('#bathroom').val(+$('#bathroom').val() + 1);
  }
});
$('#sub2').click(function () {
  if ($('#bathroom').val() > 0) {
    if ($('#bathroom').val() > 0) $('#bathroom').val(+$('#bathroom').val() - 1);
  }
});

// ============timepickerr


// categoties click
jQuery(document).ready(function($){

  $('.catelist').on('click',function(){
  
  if($(this).attr('data-click-state') == 1) {
  $(this).attr('data-click-state', 0)
  $(this).css({'text-decoration': 'none','color':'#999999'})
  } else {
  $(this).attr('data-click-state', 1)
  $(this).css({'text-decoration': 'line-through','color':'#238ee1'})
  }
  
  });
  
});

  /* wait for images to load */

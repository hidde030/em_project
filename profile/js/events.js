$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsiveClass:true,
    responsive:{
      0:{
          items:1,
          nav:false
      },
      600:{
          items:1,
          nav:false,
          loop:true,
          dots:true
      },
      1000:{
          items:3,
          nav:false,
          loop:true,
          dots:true
      }
    }
  });
});



function hamburgerMenu(x) {
  x.classList.toggle("change");
}

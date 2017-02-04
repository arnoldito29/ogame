/*smooth scrolling*/
$(document).ready(function() {
  $("#btn__landing-scrollto").on("click", "a", function(event) {
    event.preventDefault();
    var id = $(this).attr('href'),
        top = $(id).offset().top;
    $('body,html').animate({scrollTop: top}, 1500);
  });
});

/*sticky header*/

$(function() {
  var h_hght = 160; // height of landing header
  var h_mrg = 0;    // margin when landing header must hidden
  var elem = $('#header__sticky');
  var top = $(this).scrollTop();

  if (top > h_hght) {
    elem.css('top', h_mrg);
  }

  $(window).scroll(function() {
    top = $(this).scrollTop();

    if (top + h_mrg < h_hght) {
      elem.css('top', (h_hght - top));
      elem.css('display', 'none');
    } else {
      elem.css('top', h_mrg);
      elem.css('display', 'flex');
    }
  });

});
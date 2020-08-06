/*$('#submit-form').on('click', function() {
    $('#name').css('border', '1px solid #ddd');
    $('#phone').css('border', '1px solid #ddd');
    $('#email').css('border', '1px solid #ddd');
    $('#content').css('border', '1px solid #ddd');

    var name = $('#name').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var content = $('#content').val();

    if (name == '' && name.length < 5) { $('#name').css('border', '1px solid #c00'); return; }
    if (phone == '' && phone.length < 6) { $('#phone').css('border', '1px solid #c00'); return; }
    if (email == '' && email.length < 10) { $('#email').css('border', '1px solid #c00'); return; }
    if (content == '' && content.length < 10) { $('#content').css('border', '1px solid #c00'); return; }

    $.ajax({
            method: 'POST',
            url: 'http://zcare.biz/email_test/email/index.php',
            data: { name: name, phone: phone, email: email, content: content }
        })
        .done(function(msg) {
            alert('تم ارسال بياناتك بنجاح شكرا لك ');
            $(this).hide();
        });

});*/
/*Important !!!!!!!!!!!!!!!!!!!!!!!!!!*/
$('a[href="' + window.location.pathname + '"] div').addClass('active');
(function() {
    $('.loading-img').fadeOut();

})();

$(function() {
    new WOW().init();
});


$('.nafez-navbar,.main-content-dark-layer,.close-nafez-navbar').on('click', function() {
    $('.main-content-dark-layer').fadeToggle();
    $('.nafez-navbar-menu').toggleClass('open');
});

$(".tiny-toggle").tinyToggle();

$(document).ready(function() {
    setTimeout(function() { $('.select2').select2() }, 120);

    $('.lazy').Lazy({
        scrollDirection: 'vertical',
        effect: 'fadeIn',
        visibleOnly: true,
        onError: function(element) {
            console.log('error loading ' + element.data('src'));
        }
    });


});



/*window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
        $('#back-to-top').slideDown('fast');

    } else {
        $('#back-to-top').slideUp('fast');
    }
}

 
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}*/



setTimeout(function(){
    window.fbAsyncInit = function() {

     

    FB.init({
    xfbml            : true,
    version          : 'v4.0'
    });
    };

    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


},7000);


 setTimeout(function(){


var prevScrollpos = window.pageYOffset;

  window.onscroll = function() {
        if(window.pageYOffset>60)
        {
           /* console.log(window.pageYOffset);*/
              var currentScrollPos = window.pageYOffset;
              if (prevScrollpos > currentScrollPos  ) {
                $('#nafezly-navbar').css('top','0px');
              } else   {
                $('#nafezly-navbar').css('top',"-61px");
              }
              prevScrollpos = currentScrollPos;
            }
        else
        {
             $('#nafezly-navbar').css('top','0px');
        }
}

 },2000);




$('.thumbnail-nafezly').viewbox({

  // template
  template: '<div class="viewbox-container"><div class="viewbox-body"><div class="viewbox-header"></div><div class="viewbox-content"></div><div class="viewbox-footer"></div></div></div>',

  // loading spinner
  loader: '<div class="loader"><div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>',
  setTitle: true,
  margin: 20,
  resizeDuration: 300,
  openDuration: 200,
  closeDuration: 200,
  closeButton: true,
  navButtons: true,
  closeOnSideClick: true,
  nextOnContentClick: true,
  useGestures: true
  
});

document.addEventListener("DOMContentLoaded", function(){
  setTimeout(function(){
   $('.pace-activity').css({'border-top-color':'#333','border-left-color':'#333'});
   },1200);
});

 
  $('.love-favourite-area').on('click',function(){
    $('.love-favourite').toggleClass('fas heart-hearted fal');
    $('.love-favourite-count').toggleClass('heart-hearted added');
    if(!$('.love-favourite-count').hasClass('added'))
    {
      $('.love-favourite-count').text('326');
    }
    else
    {
      $('.love-favourite-count').text('325');
    }
  });


  $('a[href="'+window.location.pathname+'"]').addClass('active');
 
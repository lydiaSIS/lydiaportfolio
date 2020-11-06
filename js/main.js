
jQuery(document).ready(function() {
  
  var btn = $('#button');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 200) {
      btn.removeClass('remove');
      $('div.section2').addClass('scroll');    
    } else {
      btn.addClass('remove');
    }
  });

  btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
  });
    
  $('#formulaire').submit(function(){
      var NAME= $('.NAME').val();
      var EMAIL= $('.EMAIL').val();
      var SUBJECT= $('.SUBJECT').val();
      var MESSAGE= $('.MESSAGE').val();
      
      $.post('sendmail.php',{NAME:NAME, EMAIL:EMAIL, SUBJECT:SUBJECT, MESSAGE:MESSAGE}, function(donnees){
        $('.reponse').html(donnees).slideDown();
        $('.NAME').val(''); 
        $('.EMAIL').val('');
        $('.SUBJECT').val(''); 
        $('.MESSAGE').val('');
      });
      return false;
  });    

});

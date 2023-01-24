$(document).ready(function(){
$('#Posts').click(function(){
    $('#about_user').hide();
    $('#post_user').show();
    $('#About').removeClass('active');
    $('#Posts').addClass('active');
    
})
$('#About').click(function(){
    $('#about_user').show();
    $('#post_user').hide();
    $('#Posts').removeClass('active');
    $('#About').addClass('active');
})
    
  });
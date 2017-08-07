   /*
  *  Additional jQuery code require for the Easy Export plugin to run
  *
  *   - HP Gong
  */

(function( $ ) {
$(document).ready(function(){
  function changeColor(word, hexColor) {
       $("td:contains("+word+")").css("color", hexColor);
  }

  changeColor("Completed", "Blue");
  changeColor("Processing", "Green");
  changeColor("Pending", "Orange");
  changeColor("On-hold", "Red");

$('.st').each(function(i, n) {
   if($(n).text() < 500) $(n).css('color', 'red');
});

$('.ts').each(function(i, n) {
   if($(n).text() > 0) $(n).css('color', 'blue');
});

$(document).ready(function() {
$('#printReport').tablesort();
});

$('#printReport tr').each(function(a,b){
    $(b).click(function(){
         $('table tr').css('background','#ffffff');
         $(this).css('background','#bbceec');   
    });
});
    
});
})( jQuery );

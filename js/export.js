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
   if($(n).text() > 499) $(n).css('color', 'blue');
});

$('.ts').each(function(i, n) {
   if($(n).text() > 0) $(n).css('color', 'blue');
   if($(n).text() < 1) $(n).css('color', 'black');
});

	$(".first_tab").champ();

	$(".second_tab").champ({
	plugin_type: "tab",
	side: "right",
	active_tab: "1",
	controllers: "false"
	});
	$(".multipleTab").champ({
	multiple_tabs: "true"
	});

$('th#col').click(function(){
    var table = $(this).parents('table').eq(0);
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()));
    this.asc = !this.asc;
    if (!this.asc){
		rows = rows.reverse();
		}
    for (var i = 0; i < rows.length; i++){
		table.append(rows[i]);
	}
});
	
function comparer(index) {
    return function(a, b) {
        var valA = getCellValue(a, index), valB = getCellValue(b, index);
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB);
    }
}
	
function getCellValue(row, index){ 
	return $(row).children('td').eq(index).text(); 
}

$(function(){
	$("#btn_grey1").printPreview({obj2print:"#printReport1", width:"810"});
});
	
$(function(){
	$("#btn_grey2").printPreview({obj2print:"#printReport2", width:"810"});
});
	
$(function(){
	$("#btn_grey3").printPreview({obj2print:"#printReport3", width:"810"});
});
	
$(function(){
	$("#btn_grey4").printPreview({obj2print:"#printReport4", width:"810"});
});
	
$(function(){
	$("#btn_grey5").printPreview({obj2print:"#printReport5", width:"810"});
});

$(function(){
	$("#btn_grey6").printPreview({obj2print:"#printReport6", width:"810"});
});
	
$(function(){
	$("#btn_grey7").printPreview({obj2print:"#printReport7", width:"810"});
});

});
})( jQuery );

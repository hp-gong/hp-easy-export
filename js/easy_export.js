   /*
  *
  *  Credit to Terry Young on StackOverview 
  *  Export to CSV using jQuery and html
  *  http://stackoverflow.com/questions/16078544/export-to-csv-using-jquery-and-html
  *
  *  Modify the Jquery code for the Easy Export plugin to export SKU table from the database into CSV file. 
  *   - HP Gong 
  */

(function($) {
$(document).ready(function() {

  function exportTableToCSV($table, filename) {

    var $rows = $table.find('tr:has(td)'),

      // Temporary delimiter characters unlikely to be typed by keyboard
      // This is to avoid accidentally splitting the actual contents
      tmpColDelim = String.fromCharCode(11), // vertical tab character
      tmpRowDelim = String.fromCharCode(0), // null character

      // actual delimiter characters for CSV format
      colDelim = '","',
      rowDelim = '"\r\n"',

      // Grab text from table into CSV formatted string
      csv = '"' + $rows.map(function(i, row) {
        var $row = $(row),
          $cols = $row.find('td');

        return $cols.map(function(j, col) {
          var $col = $(col),
            text = $col.text();

          return text.replace(/"/g, '""'); // escape double quotes

        }).get().join(tmpColDelim);

      }).get().join(tmpRowDelim)
      .split(tmpRowDelim).join(rowDelim)
      .split(tmpColDelim).join(colDelim) + '"';

    // Deliberate 'false', see comment below
    if (window.navigator.msSaveBlob) {
   // if (false && window.navigator.msSaveBlob) {

      var blob = new Blob([decodeURIComponent(csv)], {
        type: 'text/csv;charset=utf8'
      });

      // Crashes in IE 10, IE 11 and Microsoft Edge
      // See MS Edge Issue #10396033
      // Hence, the deliberate 'false'
      // This is here just for completeness
      // Remove the 'false' at your own risk
      window.navigator.msSaveBlob(blob, filename);

    } else if (window.Blob && window.URL) {
      // HTML5 Blob        
      var blob = new Blob([csv], {
        type: 'text/csv;charset=utf-8'
      });
      var csvUrl = URL.createObjectURL(blob);

      $(this)
        .attr({
          'download': filename,
          'href': csvUrl
        });
    } else {
      // Data URI
      var csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

      $(this)
        .attr({
          'download': filename,
          'href': csvData,
          'target': '_blank'
        });
    }
  }

     
	// This must be a hyperlink
	$("#export1").on('click', function(event) {
	// CSV
	var args = [$('#dvData1>table'), 'order-list.csv'];
	exportTableToCSV.apply(this, args);
	});
	
	$("#export2").on('click', function(event) {
	// CSV
	var args = [$('#dvData2>table'), 'sale-list.csv'];
	exportTableToCSV.apply(this, args);
	});
	
	$("#export3").on('click', function(event) {
	// CSV
	var args = [$('#dvData3>table'), 'billing-list.csv'];
	exportTableToCSV.apply(this, args);
	});
	
	$("#export4").on('click', function(event) {
	// CSV
	var args = [$('#dvData4>table'), 'shipping-list.csv'];
	exportTableToCSV.apply(this, args);
	});
	
	$("#export5").on('click', function(event) {
	// CSV
	var args = [$('#dvData5>table'), 'mailing-list.csv'];
	exportTableToCSV.apply(this, args);
	});
	
    $("#export6").on('click', function(event) {
	// CSV
	var args = [$('#dvData6>table'), 'product-list.csv'];
	exportTableToCSV.apply(this, args);
	});
	
	$("#export7").on('click', function(event) {
	// CSV
	var args = [$('#dvData7>table'), 'category-list.csv'];
	exportTableToCSV.apply(this, args);
	});

	        
});

})(jQuery);

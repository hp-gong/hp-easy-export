<?php // Exit if accessed directly.
if(! defined('ABSPATH')){exit;}

echo"
<script>
function generate1() {

  var doc = new jsPDF('p', 'pt');

  var res = doc.autoTableHtmlToJson(document.getElementById('printReport'));

  var header = function(data) {
    doc.setFontSize(8);
    doc.setTextColor(40);
    doc.setFontStyle('normal');
  };

  doc.autoTable(res.columns, res.data);

  doc.save('order-list.pdf');
}
</script>
<input type='button' class='btn_gray' name='btn_gray' onclick='javascript:generate1();' value='PDF'>";
?>
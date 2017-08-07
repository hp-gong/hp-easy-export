<?php // Exit if accessed directly.
if(! defined('ABSPATH')){exit;}

echo"
<script>
function generate4() {

  var doc = new jsPDF('p', 'pt');

  var res = doc.autoTableHtmlToJson(document.getElementById('printReport'));

  var header = function(data) {
    doc.setFontSize(8);
    doc.setTextColor(40);
    doc.setFontStyle('normal');
  };

  doc.autoTable(res.columns, res.data);

  doc.save('product-list.pdf');
}
</script>
<input type='button' class='btn_gray' name='btn_gray' onclick='javascript:generate4();' value='PDF'>";
?>
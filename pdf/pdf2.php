<?php // Exit if accessed directly.
if(! defined('ABSPATH')){exit;}

echo"
<script>
function generate2() {

  var doc = new jsPDF('p', 'pt');

  var res = doc.autoTableHtmlToJson(document.getElementById('printReport'));

  var header = function(data) {
    doc.setFontSize(8);
    doc.setTextColor(40);
    doc.setFontStyle('normal');
  };

  doc.autoTable(res.columns, res.data);

  doc.save('billing-list.pdf');
}
</script>
<input type='button' class='btn_gray2' name='btn_gray2' onclick='javascript:generate2();' value='PDF'>";
?>
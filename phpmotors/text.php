<pre>
<?php
include('structure/connect.php');
include('model/main-model.php');
echo buildClassifiicationList(getClassifications());
?>
</pre>
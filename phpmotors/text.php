<pre>
<?php
require_once('structure/connect.php');
include('model/vehicles-model.php');
echo $_SERVER['DOCUMENT_ROOT'];
echo "<br>";
echo realpath('text.php');
echo "<br>";
print_r(getVehiclesByClass("Classic"));


?>
</pre>
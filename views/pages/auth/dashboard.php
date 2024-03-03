<?php
include("../../config/connection.php");
include("../../config/functions.php");

session_start();

$userData = new Functions();
$userData->checkLogin($databaseConnect);

?>

<body>

</body>
</html>


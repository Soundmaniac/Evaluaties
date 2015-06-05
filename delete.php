<?php
include_once("codegenfunctions.php");
deleteSelectedRow($_GET["id"]);
header("Location: cursists.php");
?>
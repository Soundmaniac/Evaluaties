<?php
include_once("codegenfunctions.php");
deleteSelectedRow($_GET["id"]);
header("Location: students.php?course=" . $_SESSION["course"]);
?>
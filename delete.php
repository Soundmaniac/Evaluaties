<?php
include_once("codegenfunctions.php");
if($_GET["id"] != null && $_GET["id"] != "")
{
	deleteSelectedRow($_GET["id"]);
}
header("Location: students.php?course=" . $_SESSION["course"]);
?>
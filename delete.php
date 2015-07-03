<?php
include_once("codegenfunctions.php");
if($_GET["id"] != null && $_GET["id"] != "")
{
	deleteSelectedRow($_GET["id"]);
}
redirect("students.php?course=" . $_GET["course"]);
?>
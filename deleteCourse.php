<?php
include_once("codegenfunctions.php");
include_once("functions.php");
if($_GET["id"] != null && $_GET["id"] != "")
{
	deleteSelectedCourse($_GET["id"]);
}
redirect("courses.php?company=" . $_GET["company"]);
?>
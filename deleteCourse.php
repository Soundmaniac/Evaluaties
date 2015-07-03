<?php
include_once("codegenfunctions.php");
if($_GET["id"] != null && $_GET["id"] != "")
{
	deleteSelectedCourse($_GET["id"]);
}
redirect("courses.php?company=" . $_GET["company"]);
?>
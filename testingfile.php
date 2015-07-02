<?php
        redirect("students.php?course=33");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <title>Resultaten (compact)</title>
    <?php
    include_once("functions.php");
    include_once("dbFunctions.php");
    StartUp();
    ini_set( "display_errors", 0);
    AdminOnly();
    ?>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="Chart.js"></script>

</head>
<body>
<div id="container">
    <div id="header">
        <?php
        profileFunction();
        ?>
    </div>
    <div id="menu">
        <?php
        menuFunction();
        ?>
        <div class="clear"></div>
    </div>
    <div id="content">
        
    </div>
</div>
<script>
</script>
</body>
</html>
<?php
//redirect("index.php");

//redirect('index.php');

function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
?>

<html>
	<head>
	</head>
	<body>
		<div id="test">
			<p>Dit is een test</p>
			<?php
				redirect("index.php");
			?>
		</div>
	</body>
</html>
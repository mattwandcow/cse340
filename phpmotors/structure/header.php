<header>
	<img src="<?php echo $depth_str;?>images/site/logo.png" alt="PHP Motors Logo">
	
	<?php 
	if($_SESSION['loggedin'])
	{ 
		echo '<p><a id="login-link" href="'.$depth_str.'accounts/?action=admin">Welcome '.$_SESSION['clientData']['clientFirstname'].'</a> (<a href="'.$depth_str.'accounts/?action=logout">Log Out</a>)</p>';
	} 
	else
	{
		echo '<p><a id="login-link" href="'.$depth_str.'accounts/?action=account">My Account</a></p>';
	}
	?>
	
</header>
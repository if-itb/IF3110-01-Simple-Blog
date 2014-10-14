<?php

	require_once 'php/lib/url.php';
	
?>
<nav>
	<ul class="nav-left">
		<li><a href="<?php echo url_make_get(array()) ?>">Home</a></li>
		<li><a href="<?php echo url_make_get(array("p" => "about")) ?>">About</a></li>
		<li><a href="<?php echo url_make_get(array("p" => "license")) ?>">License</a></li>
	</ul>
	<ul class="nav-right">
		<li><a href="<?php echo url_edit_post() ?>">New Post</a></li>
	</ul>
</nav>
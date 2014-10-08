<?php

	require 'php/crud/post.php';
	
	$url = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?'));
	$posts = post_select();

?>

<?php require 'templates/top.php' ?>

<header>
	<div class="header-title">Slog</div>
	<div class="header-subtitle">A simple blog by Ted Kesgar</div>
</header>

<nav>
	<ul class="nav-left">
		<li><a href="#">Home</a></li>
		<li><a href="#">About</a></li>
	</ul>
	<ul class="nav-right">
		<li><a href="#">New Post</a></li>
	</ul>
</nav>

<section>
	<?php $i = 0; while ($post = mysqli_fetch_assoc($posts)) {?>
		<article>
			<header>
				<h1><a href="<?php echo $url . "?action=view&id={$post['id']}" ?>"><?php echo $post['title'] ?></a></h1>
				<div class="article-date"><?php echo date("l, j F Y", strtotime($post['date'])) ?></div>
			</header>
			<section>
				<?php echo $post['content'] ?>
			</section>
			<footer>
				<ul class="actions">
					<li><a href="<?php echo $url . "?action=view&id={$post['id']}" ?>">View</a></li>
					<li><a href="<?php echo $url . "?action=edit&id={$post['id']}" ?>">Edit</a></li>
					<li><a href="<?php echo $url . "?action=delete&id={$post['id']}" ?>">Delete</a></li>
				</ul>
			</footer>
		</article>
    <?php $i++; } ?>
</section>

<footer>
	<p class="footer-copyright">&copy; 2014 Ted Kesgar. <a href="#">Slog</a> is licensed under <a href="#">MIT License</a>.</p>
</footer>

<?php require 'templates/bottom.php' ?>
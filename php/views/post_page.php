<?php require 'php/templates/top.php' ?>

<?php require 'php/templates/navbar.php' ?>

<section class="section-view">
	<?php require 'php/pages/' . $_GET['p'] . '.php'; ?>
</section>

<?php require 'php/templates/bottom.php' ?>
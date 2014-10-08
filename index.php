<?php

if (isset($_GET['action'])) {
	switch ($_GET['action']) {
	case 'view':
		require 'php/views/post_view.php';
		break;
	case 'create':
		require 'php/views/post_create.php';
		break;
	case 'edit':
		require 'php/views/post_edit.php';
		break;
	case 'delete':
		require 'php/views/post_delete.php';
		break;
	default:
		require 'php/views/post_list.php';
		break;
	}
} else {
	require 'php/views/post_list.php';
}
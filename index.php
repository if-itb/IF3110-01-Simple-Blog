<?php

if (count($_GET) == 1 && isset($_GET["id"])) {
	require "php/views/post_view.php";
	exit;
} else if (isset($_GET["p"])) {
	require "php/views/post_page.php";
	exit;
} else if (isset($_GET["action"])) {
	switch ($_GET["action"]) {
	case "view":
		require "php/views/post_view.php";
		break;
	case "edit":
		require "php/views/post_edit.php";
		break;
	case "delete":
		require "php/views/post_delete.php";
		break;
	case "ajax_comments_list":
		require "php/ajax/comments_list.php";
		break;
	case "ajax_comment_add":
		require "php/ajax/comment_add.php";
		break;
	default:
		require "php/views/post_list.php";
		break;
	}
	exit;
}

require "php/views/post_list.php";
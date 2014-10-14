<?php

define("POSTS_FILENAME", "posts.db"); // serialized array of posts
define("DATE_FORMAT", "j F Y");

if (!file_exists(POSTS_FILENAME) || file_get_contents(POSTS_FILENAME) == "") {
	$posts = array();
	file_put_contents(POSTS_FILENAME, serialize($posts));
}

function get_all_posts()
{
	$posts = unserialize(file_get_contents(POSTS_FILENAME));
	return $posts;
}

function get_post($id)
{
	$posts = unserialize(file_get_contents(POSTS_FILENAME));
	return $posts[$id];
}

function create_post($judul, $tanggal, $konten)
{
	$posts = unserialize(file_get_contents(POSTS_FILENAME));
	$new_post = array(
		"judul" => $judul,
		"tanggal" => $tanggal,
		"konten" => $konten
		);
	$posts[] = $new_post;
	file_put_contents(POSTS_FILENAME, serialize($posts));
}

function edit_post($id, $judul, $tanggal, $konten)
{
	$posts = unserialize(file_get_contents(POSTS_FILENAME));
	$post = array(
		"judul" => $judul,
		"tanggal" => $tanggal,
		"konten" => $konten
		);
	$posts[$id] = $post;
	file_put_contents(POSTS_FILENAME, serialize($posts));
}

function delete_post($id)
{
	$posts = unserialize(file_get_contents(POSTS_FILENAME));
	unset($posts[$id]);
	file_put_contents(POSTS_FILENAME, serialize($posts));
}
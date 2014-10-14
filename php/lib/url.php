<?php

require_once dirname(__DIR__) . "/config.php";

function url($tail = "") {
	global $baseurl;
	return $baseurl . $tail;
}

function url_make_get($param = null) {
	global $baseurl;
	
	$url = $baseurl;
	if (count($param) > 0) {
		$url .= "?";
		foreach ($param as $key => $value) {
			$html_key = htmlspecialchars($key);
			$html_value = htmlspecialchars($value);
			$url .= "{$html_key}={$html_value}";
			
			end($param);
			if ($key !== key($param)) {
				$url .= "&";
			}
		}
	}
	return $url;
}

function url_page($name) {
	return url_make_get(array("p" => $name));
}

function url_list_post() {
	return url_make_get(array("action" => "list"));
}

function url_edit_post($id = NULL) {
	$param = array(
		"action" => "edit"
	);
	if ($id != NULL) {
		$param["id"] = $id;
	}
	return url_make_get($param);
}

function url_view_post($id, $param = NULL) {
	if ($param == NULL) {
		$param = array("id" => $id);
	} else {
		$param["action"] = "view";
		$param["id"] = $id;
	}
	return url_make_get($param);
}

function url_delete_post($id) {
	$param = array(
		"action" => "delete",
		"id" => $id
	);
	return url_make_get($param);
}
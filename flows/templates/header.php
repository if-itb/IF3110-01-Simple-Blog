<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="LoliBook Blogging System for IF3110 assignment">
    <meta name="author" content="Xathrya Sabertooth">
    
    <link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <title>LoliBook Blogging System</title>
</head>
<body class="default">
<div class="wrapper">
    <nav class="nav">
        <a style="border:none;" id="logo" href="index.php"><h1>LoliBook</h1></a>
        <ul class="nav-primary">
            <li><a href="<?php echo URL::view_random(); ?>">View Random</a></li>
            <li><a href="<?php echo URL::edit_post(); ?>">+ Tambah Post</a></li>
        </ul>
    </nav>
    
    
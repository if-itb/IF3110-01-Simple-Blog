<?php

require_once 'functions.php';

delete_post($_GET["id"]);

header("Location: index.php");
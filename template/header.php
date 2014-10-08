<head>
<?php include 'dbconnect.php'; ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="/if3110-01-simple-blog/assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blogsss | Tambah Post</title>
<nav class="nav">
    <a style="border:none;" id="logo" href="/if3110-01-simple-blog/"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="/if3110-01-simple-blog/view/newpost_form.php">+ Tambah Post</a></li>
    </ul>
</nav>

<?php 
    function convertDate($input){
    $input_split = explode("-", $input);
    $output = $input_split[2];
    if(strcmp($input_split[1],"01") == 0){
      $output .= " Jan ";
    }
    if(strcmp($input_split[1],"02") == 0){
      $output .= " Feb ";
    }
    if(strcmp($input_split[1],"03") == 0){
      $output .= " Mar ";
    }
    if(strcmp($input_split[1],"04") == 0){
      $output .= " Apr ";
    }
    if(strcmp($input_split[1],"05") == 0){
      $output .= " Mei ";
    }
    if(strcmp($input_split[1],"06") == 0){
      $output .= " Jun ";
    }
    if(strcmp($input_split[1],"07") == 0){
      $output .= " Jul ";
    }
    if(strcmp($input_split[1],"08") == 0){
      $output .= " Agt ";
    }
    if(strcmp($input_split[1],"09") == 0){
      $output .= " Sep ";
    }
    if(strcmp($input_split[1],"10") == 0){
      $output .= " Okt ";
    }
    if(strcmp($input_split[1],"11") == 0){
      $output .= " Nov ";
    }
    if(strcmp($input_split[1],"12") == 0){
      $output .= " Des ";
    }
    $output .= $input_split[0];
    return $output;
  }

  function getID($ids){
  $id =($ids);
  $query = "SELECT judul,tanggal,konten FROM posting WHERE id='$id'";
    $result = mysql_query($query);
    if(!$result){
        echo 'NOTHING';
    }
    $output = array();
    while($row = mysql_fetch_row($result)){
        array_push($output, $row[0]);
        array_push($output, $row[1]);
        array_push($output, $row[2]);
    }
    return $output;
  }
?>
</head>
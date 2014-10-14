<?php
require_once(dirname(__FILE__)."/../model/komentar.php");
if (isset($_POST['id_post']))
{
    $komen = new Komentar();
    $result = $komen->GetKomen($_POST['id_post']);
    if (mysql_num_rows($result) > 0)
    {
        $object = array();
        while($row = mysql_fetch_object($result))
        {
            $object[] = $row;
        }
        echo json_encode($object);
    }
    else
    {
        echo "zero";
    }
}
?>

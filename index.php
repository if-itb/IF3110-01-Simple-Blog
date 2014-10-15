<?php

if (count($_GET) > 0) 
{
    if (isset($_GET["do"])) 
    {
        switch ($_GET["do"]) 
        {
        case "view":
            require "flows/views/view_subject.php";
            break;
        case "edit";
            require "flows/views/edit_subject.php";
            break;
        case "delete":
            require "flows/views/delete_subject.php";
            break;
        case "comment_list":
            require "flows/ajax/comment_list.php";
            break;
        case "commend_add":
            require "flows/ajax/comment_add.php";
            break;
        case "random":
            require "flows/views/view_subject.php";
            break;
        default:
            require "flows/views/list_subject.php";
            break;
        }
    } else if (isset($_GET["id"])) 
    {
        require "flows/views/view_subject.php";
    } else 
    {
        require "flows/errors/404_notfound.php";
    }
} else 
{
    require "flows/views/list_subject.php";
}
?>
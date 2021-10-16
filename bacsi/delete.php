<?php
 require_once('../db/dbhelper.php');
 require_once('../utils/uitility.php');
if(!empty($_POST)){
    $id = getPOST('id');  
    $sql = 'delete from lichkham where id ='.$id;
    execute($sql);
}
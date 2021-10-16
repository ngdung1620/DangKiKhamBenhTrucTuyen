<?php
 require_once('../db/dbhelper.php');
 require_once('../utils/uitility.php');
if(!empty($_POST)){
    $id = getPOST('id');
    $option = getPOST('option');
    switch($option){
        case 'user':
            $sql = 'delete from users where id ='.$id;
            execute($sql);
            break;
        case 'nhanvien':
            $sql = 'delete from nhanvien where id ='.$id;
            execute($sql);
            break;
        case 'bacsi':
            $sql = 'delete from bacsi where id ='.$id;
            execute($sql);
            break;
    }
}
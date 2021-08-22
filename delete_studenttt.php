<?php
    if(isset($_POST['id'])){
        $id=$_POST['id'];
        require_once('dbhelp.php');
        $sql='DELETE FROM sinhvien where ID= '.$id;
        execute($sql);
        echo 'Bạn đã xóa thành công';
    }
?>
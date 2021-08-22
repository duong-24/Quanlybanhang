<?php
       $fullname=$age=$address='';
       require_once('dbhelp.php');
    if(!empty($_POST)){
        $s_id='';
        if(isset($_POST['fullname'])){
            $fullname=$_POST['fullname'];
        }
        if(isset($_POST['age'])){
            $age=$_POST['age'];
        }
        if(isset($_POST['address'])){
            $address=$_POST['address'];
        }
        if(isset($_POST['id'])){
            $s_id=$_POST['id'];
        }
        /// an toan sql
        $fullname=str_replace('\'','\\\'',$fullname);
        $age=str_replace('\'','\\\'',$age);
        $address=str_replace('\'','\\\'',$address);
        $s_id=str_replace('\'','\\\'',$s_id);
        if($s_id !=''){
            //update
            $sql="UPDATE sinhvien set fullname='$fullname',age='$age',address='$address'
            where ID=".$s_id;
        }else
        {
            $sql="INSERT INTO sinhvien (fullname,age,address)
            VALUES('$fullname','$age',$address)";
        }

        //echo $sql:
        execute($sql);

        header('location:index.php'); 
        die();
    }
    $id='';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql='SELECT * FROM sinhvien where id = '.$id;
        $sutentlist=executeLesult($sql);
        if($sutentlist!=null && count($sutentlist)>0){
            $row=$sutentlist[0];
            $fullname=$row['fullname'];
            $age=$row['age'];
            $address=$row['address'];
        }
        else{
            $id='';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="panel panael-primary">
            <div class="panel-heading">
                <h2>Thêm sinh viên mới </h2>
            </div>
            <div class="panel-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="usr">Name:</label>
                        <input type="number" name="id" value="<?=$id?>" style="display:none;">
                        <input type="text" id="usr" value="<?= $fullname ?>" class="form-control" name="fullname" required="true">
                    </div>
                    <div class="form-group">
                        <label for="age">Tuoi:</label>
                        <input type="number" id="age"  class="form-control" name="age" value="<?= $age ?>">
                    </div>
                    <div class="form-group">
                        <label for="dc">Địa chỉ:</label>
                        <input type="text" id="dc" class="form-control" name="address" value="<?= $address ?>">
                    </div>
                    <button class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
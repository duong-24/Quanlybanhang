<?php
require_once('dbhelp.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Quản lý thông tin sinh viên
                <form method="get">
                    <input type="text" name="s" class="form-control" style="margin-top:15px;margin-bottom:15px;" placeholder="Tim kiem theo ten">
                </form>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>STT</th>
                        <th>Họ và Tên</th>
                        <th>Tuổi</th>
                        <th>Địa chỉ</th>
                        <th width="60px"></th>
                        <th width="60px"></th>
                    </tr>
                    <?php
                    //tim kiem
                    if(isset($_GET['s'])&& $_GET['s']!=''){
                        //tim kiem
                        $sql = 'select * from sinhvien where fullname like "%'.$_GET['s'].'%"';
                    }
                    else{
                        //danh sach
                        $sql = 'select * from sinhvien';
                    }
                    $resulti = executeLesult($sql);
                    foreach ($resulti as $row) {
                        echo '<tr>
                            <td>' . $row['ID'] . '.</td>
                            <td>' . $row['fullname'] . '</td>
                            <td>' . $row['age'] . '</td>
                            <td>' . $row['address'] . '</td>
                            <td><button class="btn btn-warning"onclick=\'window.open("input.php?id=' . $row['ID'] . '","_self")\'>Edit</button></td>
                            <td><button class="btn btn-danger" onclick="deleteStudent('.$row['ID'].')">Delete</button></td>
                            </tr>';
                    };
                    ?>
                </table>
                <button class="btn btn-success" onclick="window.open('input.php','_self')">Thêm sinh viên</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function deleteStudent(id){
            option=confirm('Bạn có muốn xóa sinh viên này không');
            if(!option){
                return;
            } 

            console.log(id);
            $.post("delete_studenttt.php",{
                'id':id
            },function(data){
                alert(data)
                location.reload();
            })
        }
    </script>
</body>

</html>
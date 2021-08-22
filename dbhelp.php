<?php 
    require_once('config.php');

    function execute($sql){
        $conn = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
         $conn->set_charset('utf8');
        mysqli_query($conn,$sql);

        mysqli_close($conn);
    }

    function executeLesult($sql){
        $conn = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          $conn->set_charset('utf8');
        $result=mysqli_query($conn,$sql);
        $list=[];
        while($row=mysqli_fetch_array($result,1)){
            $list[]=$row;
        }
        mysqli_close($conn);
        return $list;
    }
?>
<?php 
// เรียกใช้ไฟล์เชื่อมต่อฐานข้อมูล (อยู่ในโฟลเดอร์ "database")  
    require "./database/dbcon.php";
    // ตรวจสอบว่ามีการกดปุ่ม "insert" ในฟอร์มหรือไม่
    if(isset($_POST['insert'])){

         // ดึงข้อมูลผู้ใช้จากฟอร์มที่ส่งมา
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];

        $sql = $conn->prepare('INSERT INTO users (fname,lname,phone) VALUES (:fname,:lname,:phone)');
        /*  $sql->bindParam(":fname", $_POST['fname']);
            $sql->bindParam(":lname", $_POST['lname']);
            $sql->bindParam(":phone", $_POST['phone']); */  
        $sql->execute([// execute เพื่อรันการ query data
            ":fname" => $fname,
            ":lname" => $lname,
            ":phone" => $phone]);

        if($sql){
            header("Location:index.php"); // กลับไปหน้า index.php
        }
    }


?>
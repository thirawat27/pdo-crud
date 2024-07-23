<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO CRUD</title>
</head>

<body>
    <h1 align=center> edite </h1>
    <?php

    // เชื่อมต่อฐานข้อมูล
    require_once "./database/dbcon.php";

    $user_id = $_GET['id'];
    // สร้างคำสั่ง SQL เพื่อดึงข้อมูลผู้ใช้ตาม id
    $sql = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $sql->bindParam(':id', $user_id);
    $sql->execute();

    // เก็บข้อมูลผู้ใช้ที่ดึงมาเป็นแถวข้อมูล
    $row = $sql->fetch();




    // อัปเดตข้อมูล (เมื่อส่ง form)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // รับค่าจากฟอร์มที่ส่งมา
        $user_id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];

        // เตรียมคำสั่ง SQL เพื่อแก้ไขข้อมูลผู้ใช้ในตาราง "users"
        $sql = $conn->prepare("UPDATE users SET fname = :fname, lname = :lname, phone = :phone WHERE id = :id");

        // ผูกตัวแปรกับพารามิเตอร์ในคำสั่ง SQL เพื่อความปลอดภัย
        $sql->bindParam(':fname', $fname);
        $sql->bindParam(':lname', $lname);
        $sql->bindParam(':phone', $phone);
        $sql->bindParam(':id', $user_id);

        // เรียกใช้คำสั่ง SQL เพื่อปรับปรุงข้อมูลในฐานข้อมูล
        $sql->execute();

        // ตรวจสอบผลลัพธ์ของการดำเนินการ
        if ($sql) {
            // หากสำเร็จ ให้เปลี่ยนเส้นทางไปยังหน้า "index.php"
            header("Location: index.php");
        } else {
            // หากล้มเหลว แสดงข้อความ "Error"
            echo "Error";
        }
    }

    ?>
    <form method="post" align="center">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="text" name="fname" value="<?php echo $row['fname'] ?>" placeholder="type.. your ..name">&nbsp;
        <input type="text" name="lname" value="<?php echo $row['lname'] ?>" placeholder="type.. your ..name">&nbsp;
        <input type="number" name="phone" value="<?php echo $row['phone'] ?>" placeholder="type....Phonenumber">&nbsp;
        <br>
        <input type="submit" name="edit" value="Edit DATA">
    </form>
</body>

</html>
<?php 
    require "./database/dbcon.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO CRUD</title>
</head>
<body>
    <h1 align=center > Crud </h1>
    <form action="insert.php" method="post" align="center">
        <input type="text" name="fname" placeholder="type.. your ..name">&nbsp;
        <input type="text" name="lname" placeholder="type.. your ..name">&nbsp;
        <input type="number" name="phone" placeholder="type....Phonenumber">&nbsp;
        <br>
        <input type="submit" name="insert" value="Insert DATA">
    </form>
</body>
</html>

<!--
        query();


        prepare();
 -->

<?php 
// query 
       /* $sql = $conn->query("SELECT * FROM users"); // query ข้อมูลจาก database   
        while ($row = $sql->fetch()){ // สร้างตัวแปร $row เพื่อเก็บข้อมูล
            // fetch ทำหน้าที่เกี่ยวกับการดึงข้อมูล 
            echo "<h2>".$row['id'].".".$row['fname']."&nbsp;".$row['lname']."&nbsp;".$row['phone']."</h2>"; 
        } */
        echo "<hr/>"; 
// prepare 
/*
        $sql2 = $conn->prepare("SELECT * FROM users where id = :userid"); // query ข้อมูลจาก database   
        $userid = 2 ; // ตัวแปรแทนค่าของ :userid
        $sql2->bindParam(":userid",$userid); // bind param ใช้ผูกค่าตัวแปร
        $sql2->execute(); // execute เพื่อรันการ query data
        while ($row = $sql2->fetch()){ // fetch ทำหน้าที่เกี่ยวกับการดึงข้อมูล
             echo "<h2>".$row['id'].".".$row['fname'].""."</h2>";
} */

        $sql2 = $conn->prepare("SELECT * FROM users"); // query ข้อมูลจาก database   
        $sql2->execute();// execute เพื่อรันการ query data
        while ($row2 = $sql2->fetch()){ // สร้างตัวแปร $row เพื่อเก็บข้อมูล
            // fetch ทำหน้าที่เกี่ยวกับการดึงข้อมูล 
            echo "<h2>".$row2['id'].".".$row2['fname']."&nbsp;".$row2['lname']."&nbsp;".$row2['phone']."</h2>"; 
            echo "<a href='edit.php?id=".$row2['id']."' >Edite data | </a>";
            echo "<a href='?delete_id=".$row2['id']."' >Delete data </a>";
        }

        if (isset($_GET['delete_id'])) {
            
            // รับค่า id ของผู้ใช้ที่ต้องการลบ
            $user_id = $_GET['delete_id'];
          
            // เตรียมคำสั่ง SQL สำหรับการลบข้อมูล
            $sql3 = $conn->prepare("DELETE FROM users WHERE id = :id");
          
            // ผูกตัวแปร id กับพารามิเตอร์ในคำสั่ง SQL
            $sql3->bindParam(':id', $user_id);
          
            // เรียกใช้คำสั่ง SQL เพื่อลบข้อมูล
            $sql3->execute();
          
            // ตรวจสอบผลลัพธ์
            if ($sql3) {
          
              // หากการลบข้อมูลสำเร็จ
              // รีเฟรชหน้าเว็บ (index.php) ทันที
              header("refresh:0; url=index.php");
          
            }
          }
          
?>

<!-- 
        crud
        C = create
        R = read
        U = update
        D = delete
-->

<?php 

$server = "localhost";
$db = "pdo_db";
$username = "root";
$password = "";
$utf = "utf8";

$dsn = "mysql:host=$server;dbname=$db;charset=$utf";

/*
$attr = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // เป็น attributes แจ้ง error
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //   เป็น attributes การกำหนดการดึงข้อมูล
    PDO::ATTR_EMULATE_PREPARES => false // ควบคุมวิธีจัดการ prepared statements ใน PHP
];
*/
try {
    $conn = new PDO($dsn, $username, $password);  // เป็น object สำหรับเข้าถึงฐานข้อมูล
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // setAttribute คือการตั้งค่าคุณสมบัติ
    $conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);   
  //echo "Connected successfully";
} catch(PDOException $e) { // PDOException เป็นการดักชนิดข้อผิดพลาด และส่งไปยังตัวแปร $e
  echo "Connection failed: " . $e->getMessage(); // -> เป็นการเข้าถึง object getmassage สำหรับ รับข้อความของ $e
}

?>
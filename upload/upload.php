<?php
// ตรวจสอบว่ามีการอัพโหลดไฟล์ผ่านฟอร์มหรือไม่ โดยใช้ isset() เพื่อตรวจสอบค่า 'file-img'
if (isset($_FILES['file-img']['name'])) {

    // กำหนดพาธของโฟลเดอร์ที่ใช้เก็บไฟล์ (./img/) ในตัวแปร $img_dir
    $img_dir = "./img/";

    // เก็บชื่อไฟล์ที่ถูกอัพโหลดไว้ในตัวแปร $img_name
    $img_name = $_FILES['file-img']['name'];

    // ตรวจสอบว่าโฟลเดอร์ที่เก็บไฟล์ (./img/) มีอยู่หรือไม่ โดยใช้ฟังก์ชัน file_exists()
    // ถ้าโฟลเดอร์ไม่อยู่ จะพยายามสร้างโฟลเดอร์นั้นขึ้นมาโดยใช้ mkdir()
    if (!file_exists($img_dir)) {
        // ตรวจสอบว่าการสร้างโฟลเดอร์สำเร็จหรือไม่ หากไม่สามารถสร้างโฟลเดอร์ได้ จะแสดงข้อความ "can't create folder"
        if (!mkdir($img_dir)) {
            echo "can't create folder";
        }
    }

    // เก็บตำแหน่งไฟล์ชั่วคราวที่ถูกอัพโหลดโดย PHP ไว้ในตัวแปร $tempfile
    $tempfile = $_FILES['file-img']['tmp_name'];

    // พยายามย้ายไฟล์จากตำแหน่งชั่วคราวไปยังตำแหน่งที่ต้องการเก็บจริง โดยใช้ move_uploaded_file()
    // ถ้าย้ายสำเร็จ จะแสดงข้อความ "upload success"
    // ถ้าย้ายไม่สำเร็จ จะแสดงข้อความ "upload fail"
    if (move_uploaded_file($tempfile, $img_dir . $img_name)) {
        echo "upload success";
    } else {
        echo "upload fail";
    }
} else {
    // หากไม่มีไฟล์ถูกอัพโหลด จะแสดงข้อความ "no file uploaded"
    echo "no file uploaded";
}
?>
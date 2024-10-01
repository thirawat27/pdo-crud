<?php 
 
// access modifier ระดับในการเข้าถึง Class, Attribute, Method และอื่น ๆ ในภาษาเชิงวัตถุ

// private เข้าถึงได้แค่ภายใน class 
// protected เข้าถึงได้ใน class และ class สืบทอด
// public  เข้าถึงได้ทุกที่


class User { // class ใช้ประกาศ classs และ class นี้ชื่อว่า user
    public $name = "thirawat" ; // property หรือ คุณสมบัติ เปรียบเสมือนตัวแปร
    
    public function  hello(){ // method คือฟังชั่นใน class 
        echo "HI \n" . $this->name . "\n"; 
    }

    function __construct() // constructor เมื่อใช้แล้วไม่ต้อง เข้าถึง object
    {
        echo "Hello\n";
    }
}   

$obj = new User(); // การสร้าง object 

$obj->hello(); // การเข้าถึง method // obj เป็น object ของ class

echo $obj->name; // เข้าถึง property ของ class 


//class inherited  การสืบทอด class

class car {
    public $brand;
}

class toyota extends car {  // การสืบทอดคราสจะใช้ extends ต่อท้ายคลาสใหม่ตามด้วยคราสที่ต้องการสืบทอด
    public $name; 
}

// setter & getter 

class setget { // setter 
    private $num;

    public function set($num){ // paramiter 
        $this->num = $num;
    }

    public function get($num) {
        return $this->num;
    }
}

?>
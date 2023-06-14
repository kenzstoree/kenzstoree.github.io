<?php
// تعريف متغيرات لتخزين بيانات النموذج
$name = $_POST['name'];
$number = $_POST['number'];
$adress = $_POST['adress'];
$note = $_POST['note'];
$customer_quantity = $_POST['customer_quantity'];

// تحديد معلومات الاتصال بقاعدة البيانات
        $servername = "sql110.epizy.com";
        $username = "epiz_33877004";
        $password = "FJvUGGJo04PVn";
        $dbname = "epiz_33877004_mahdawi14";

if(empty($_POST['number'])) {
    header("Location: https://wa.me/962780123031⁩?text=فشل استلام الطلب ارجو تاكيد الطلب عبر الوتساب"); // تحويل المستخدمين إلى صفحة النموذج إذا لم يتم إرسال بيانات النموذج.-

    exit();
}


// إنشاء اتصال بقاعدة البيانات
$conn = mysqli_connect($servername, $username, $password, $dbname);

// التحقق من اتصال قاعدة البيانات
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// إدخال بيانات النموذج في جدول MySQL
$sql = "INSERT INTO my_table (name, phone, adress, note, customer_quantity) VALUES ('$name', '$number', '$adress', '$note', '$customer_quantity')";

if (mysqli_query($conn, $sql)) {
echo '<img src="success.png" style="width: 100%;" alt="Success">';

    
} else {
  echo "خطأ في الإدخال: " . mysqli_error($conn);
}

// إغلاق اتصال قاعدة البيانات
mysqli_close($conn);
?>
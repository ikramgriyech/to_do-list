<?php
$host = "localhost"; // اسم الخادم
$user = "root"; // اسم المستخدم
$password = ""; // كلمة المرور (عادة فارغة في XAMPP/WAMP)
$database = "todo_list"; // اسم قاعدة البيانات

try {
    // إنشاء الاتصال باستخدام PDO
    $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);

    // تفعيل وضع الأخطاء (لإظهار الأخطاء إذا حدثت)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // الاتصال تم بنجاح
    // echo "تم الاتصال بنجاح";
} catch (PDOException $e) {
    // في حالة وجود خطأ في الاتصال
    die("Connection error :" . $e->getMessage());
}
?>


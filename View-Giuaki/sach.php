<?php
session_start();
$_SESSION["IsLogin"] = false;
// Kết nối CSDL
$uri = "mysql://avnadmin:AVNS_h_ZY-nY0n-i6diFSvdK@mysql-39b1949e-thuan200378-a39b.g.aivencloud.com:11649/defaultdb?ssl-mode=REQUIRED";
$fields = parse_url($uri);
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];
$conn .= ";dbname=" . ltrim($fields["path"], '/');
$conn .= ";sslmode=verify-ca;sslrootcert=ca.pem";

try {
    $db = new PDO($conn, $fields["user"], $fields["pass"]);

    // Khởi tạo controller và hiển thị danh sách sách
    require_once('sach_controller.php');
    $controller = new Sach_Controller($db);
    $controller->hienThiDanhSachSach();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

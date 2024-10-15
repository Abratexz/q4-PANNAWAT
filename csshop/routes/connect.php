<?php
try {
$pdo = new PDO("mysql:host=localhost;dbname=sec1_26;charset=utf8", "Wstd26", "xjPRt325");
$bootstrap_css = "https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css";
$bootstrap_js = "https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js";
} catch (PDOException $e) {
	echo "เกิดข้อผิดพลาด : ".$e->getMessage();
}
?>
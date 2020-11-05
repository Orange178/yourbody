<?php

//require_once __DIR__ . '/mailer/Validator.php';
require_once __DIR__ . '/mailer/ContactMailer.php';

// if (!Validator::isAjax() || !Validator::isPost()) {
// 	echo 'Доступ запрещен!';
// 	exit;
// }

$name = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : null;
$email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : null;
$phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : null;

$adress = isset($_POST['adress']) ? trim(strip_tags($_POST['adress'])) : null;
$qty = isset($_POST['qty']) ? trim(strip_tags($_POST['qty'])) : null;
$color = isset($_POST['color']) ? trim(strip_tags($_POST['color'])) : null;

// if (empty($name) || empty($phone) || empty($adress)) {
// 	echo 'Все поля обязательны для заполнения.';
// 	exit;
// }



// if (!Validator::isValidPhone($phone)) {
// 	echo 'Телефон не соответствует формату.';
// 	exit;
// }

if (ContactMailer::send($name,$email,$phone,$adress,$qty,$color)) {
	//echo htmlspecialchars($name) . ', ваше сообщение успешно отправлено.';
	header("Location: https://ubody.ru/new_order_success.html"); /* Перенаправление браузера */

/* Убедиться, что код ниже не выполнится после перенаправления .*/
exit;
} else {
	//echo 'Произошла ошибка! Попробуйте обновить страницу или Попробуйте позже.';
	header("Location: https://ubody.ru/new_order_not_sucess.html"); /* Перенаправление браузера */

/* Убедиться, что код ниже не выполнится после перенаправления .*/
exit;
}
exit;
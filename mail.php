<?php


$from = 'monopoly.crimea@gmail.com';
$mail_to = "monopoly.crimea@gmail.com";
$subject = "Новая заявка с сайта \"Катана суши\"";
$name = trim($_POST["name"]);
$phone = trim($_POST["phone"]);
$address = trim($_POST["address"]);
$order = json_decode($_POST["order"], true); 
$order_str = "всего " . $_POST["totalSum"] . "р." . "\n";

foreach ($order as $key => $value) {
	if ($value["count"] === 0) continue;

	$order_str .= ($key + 1) . ": " 
	. $value["title"] 
	. ", " . $value["count"] . "шт"
	. ", цена: " . $value["price"] . "p"
	. ", сумма: " . $value["price"] * $value["count"] . "p"
	. "\n";
}

$message = "Заказаны суши: \nИмя: $name \nТелефон: $phone \nАдрес: $address \nЗаказ: $order_str";

mail($mail_to, $subject, $message, "Content-type: text/plain; charset=\"utf-8\"\nFrom: $from");

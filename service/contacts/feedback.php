<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Обратная связь");
$APPLICATION->SetPageProperty("keywords", "обратная связь, биржа недвижимости");
$APPLICATION->SetPageProperty("description", "Свяжитесь с нами.");
$APPLICATION->SetTitle("Обратная связь");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback",
	"",
	array(
	"EMAIL_TO" => "m.a.x.i.m.o.v@yandex.ru",	// E-mail, на который будет отправлено письмо
		"EVENT_MESSAGE_ID" => "",	// Почтовые шаблоны для отправки письма
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
		"REQUIRED_FIELDS" => "",	// Обязательные поля для заполнения
		"USE_CAPTCHA" => "Y",	// Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
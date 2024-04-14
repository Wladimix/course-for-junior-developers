<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/*
 *  Задать имя компонента и Описание
 *  Разместить его в своем разделе в Визуальном редакторе
 */

$arComponentDescription = array(
	"NAME" => GetMessage("MCART_AGENTS_LIST_NAME"),
	"DESCRIPTION" => GetMessage("MCART_AGENTS_LIST_DESCRIPTION"),
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "content",
		"CHILD" => array(
			"ID" => "Highload инфоблоки",
			"NAME" => GetMessage("MCART_AGENTS"),
			"SORT" => 10,
			"CHILD" => array(
				"ID" => "news_cmpx",
			),
		),
	),
);

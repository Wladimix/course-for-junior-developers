<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Агенты недвижимости");
$APPLICATION->SetPageProperty("keywords", "агенты, биржа недвижимости");
$APPLICATION->SetPageProperty("description", "Агенты недвижимости.");
$APPLICATION->SetTitle("Агенты");
?><?$APPLICATION->IncludeComponent(
	"mcart:agents.list", 
	".default", 
	array(
		"HLBLOCK_TNAME" => "real_estate_agents",
		"COMPONENT_TEMPLATE" => ".default",
		"NEWS_COUNT" => "3",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"AGENTS_COUNT" => "1"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
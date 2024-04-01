<?use Bitrix\Main\Page\Asset;?>

<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?IncludeTemplateLangFile(__FILE__);?>

<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">

<head>
  <?$APPLICATION->ShowHead();?>
  <title><?$APPLICATION->ShowTitle();?></title>

  <?Asset::getInstance()->addString('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">');?>
  <?Asset::getInstance()->addCss('/local/templates/.default/fonts/icomoon/style.css');?>


  <?Asset::getInstance()->addCss('/local/templates/.default/css/bootstrap.min.css');?>
  <?Asset::getInstance()->addCss('/local/templates/.default/css/magnific-popup.css');?>
  <?Asset::getInstance()->addCss('/local/templates/.default/css/jquery-ui.css');?>
  <?Asset::getInstance()->addCss('/local/templates/.default/css/owl.carousel.min.css');?>
  <?Asset::getInstance()->addCss('/local/templates/.default/css/owl.theme.default.min.css');?>
  <?Asset::getInstance()->addCss('/local/templates/.default/css/bootstrap-datepicker.css');?>
  <?Asset::getInstance()->addCss('/local/templates/.default/css/mediaelementplayer.css');?>
  <?Asset::getInstance()->addCss('/local/templates/.default/css/animate.css');?>
  <?Asset::getInstance()->addCss('/local/templates/.default/fonts/flaticon/font/flaticon.css');?>
  <?Asset::getInstance()->addCss('/local/templates/.default/css/fl-bigmug-line.css');?>


  <?Asset::getInstance()->addCss('/local/templates/.default/css/aos.css');?>

  <?Asset::getInstance()->addCss('/local/templates/.default/css/style.css');?>

</head>

<body>
  <?$APPLICATION->ShowPanel();?>
  
  <div class="site-loader"></div>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="border-bottom bg-white top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-md-6">
            <p class="mb-0">

<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/header/phone.php"
	)
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/header/email.php"
	)
);?>

            </p>
          </div>
          
<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/header/social_media.php"
	)
);?>

        </div>
      </div>

    </div>
    <div class="site-navbar">
      <div class="container py-1">
        <div class="row align-items-center">

<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/header/logo.php"
	)
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_multi", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "3",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "top_multi",
		"MENU_THEME" => "site"
	),
	false
);?>

        </div>
      </div>
    </div>
  </div>

<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"nav_chain", 
	array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0",
		"COMPONENT_TEMPLATE" => "nav_chain"
	),
	false
);?>

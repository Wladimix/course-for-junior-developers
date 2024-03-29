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
              <a href="#" class="mr-3">
                <span class="text-black fl-bigmug-line-phone351"></span>
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
              </a>
              <a href="#">
                <span class="text-black fl-bigmug-line-email64"></span>
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
              </a>
            </p>
          </div>
          <div class="col-6 col-md-6 text-right">
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

    </div>
    <div class="site-navbar">
      <div class="container py-1">
        <div class="row align-items-center">
          <div class="col-8 col-md-8 col-lg-4">
            <h1 class=""><a href="index.html" class="h5 text-uppercase text-black">
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
            </a></h1>
          </div>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	".default", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => ".default",
		"MENU_THEME" => "site"
	),
	false
);?>
          <div class="col-4 col-md-4 col-lg-8">
            <nav class="site-navigation text-right text-md-right" role="navigation">

              <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
                  class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active">
                  <a href="index.html"><?=GetMessage('HOME')?></a>
                </li>
                <li class="has-children">
                  <a href="properties.html"><?=GetMessage('PROPERTIES')?></a>
                  <ul class="dropdown">
                    <li><a href="#">Buy</a></li>
                    <li><a href="#">Rent</a></li>
                    <li><a href="#">Lease</a></li>
                    <li class="has-children">
                      <a href="#">Menu</a>
                      <ul class="dropdown">
                        <li><a href="#">Menu One</a></li>
                        <li><a href="#">Menu Two</a></li>
                        <li><a href="#">Menu Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="blog.html"><?=GetMessage('BLOG')?></a></li>
                <li><a href="about.html"><?=GetMessage('ABOUT')?></a></li>
                <li><a href="contact.html"><?=GetMessage('CONTACT')?></a></li>
              </ul>
            </nav>
          </div>


        </div>
      </div>
    </div>
  </div>

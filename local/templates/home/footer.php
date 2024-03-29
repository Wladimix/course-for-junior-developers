  <?use Bitrix\Main\Page\Asset;?>

  <?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/footer/about.php"
	)
);?>
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
        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="row mb-5">
            <div class="col-md-12">
              <h3 class="footer-heading mb-4">Navigations</h3>
            </div>
            <div class="col-md-6 col-lg-6">
              <ul class="list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">Buy</a></li>
                <li><a href="#">Rent</a></li>
                <li><a href="#">Properties</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-6">
              <ul class="list-unstyled">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Terms</a></li>
              </ul>
            </div>
          </div>
        </div>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/footer/social_media.php"
	)
);?>
        
      </div>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/footer/copyright.php"
	)
);?>
    </div>
  </footer>

  </div>
	
  <?Asset::getInstance()->addJs('/local/templates/.default/js/jquery-3.3.1.min.js');?>
	<?Asset::getInstance()->addJs('/local/templates/.default/js/jquery-3.3.1.min.js');?>
  <?Asset::getInstance()->addJs('/local/templates/.default/js/jquery-migrate-3.0.1.min.js');?>
  <?Asset::getInstance()->addJs('/local/templates/.default/js/jquery-ui.js');?>
	<?Asset::getInstance()->addJs('/local/templates/.default/js/popper.min.js');?>
	<?Asset::getInstance()->addJs('/local/templates/.default/js/bootstrap.min.js');?>
	<?Asset::getInstance()->addJs('/local/templates/.default/js/owl.carousel.min.js');?>
	<?Asset::getInstance()->addJs('/local/templates/.default/js/mediaelement-and-player.min.js');?>
	<?Asset::getInstance()->addJs('/local/templates/.default/js/jquery.stellar.min.js');?>
	<?Asset::getInstance()->addJs('/local/templates/.default/js/jquery.countdown.min.js');?>
	<?Asset::getInstance()->addJs('/local/templates/.default/js/jquery.magnific-popup.min.js');?>
	<?Asset::getInstance()->addJs('/local/templates/.default/js/bootstrap-datepicker.min.js');?>
  <?Asset::getInstance()->addJs('/local/templates/.default/js/aos.js');?>

	
	<?Asset::getInstance()->addJs('/local/templates/.default/js/main.js');?>


</body>

</html>

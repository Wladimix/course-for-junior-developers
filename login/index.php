<?
define("NEED_AUTH", true);
global $USER;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if (is_string($_REQUEST["backurl"]) && mb_strpos($_REQUEST["backurl"], "/") === 0)
{
	LocalRedirect($_REQUEST["backurl"]);
}

$APPLICATION->SetTitle("Вход на сайт");
?>

<div class="site-section">
    <div class="container">
		<?=$USER->GetFullName()?>, Вы зарегистрированы и успешно авторизовались.
		<br />
		<p><a href="<?=SITE_DIR?>">Вернуться на главную страницу</a></p>

		<?
			$logout = $APPLICATION->GetCurPageParam(
				"logout=yes&" . bitrix_sessid_get(),
				array(
					"login",
					"logout",
					"register",
					"forgot_password"
				)
			);
		?>

		<p><a class="btn btn-primary py-2 px-4 rounded-0" href="<?= $logout; ?>">Выйти</a></p>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

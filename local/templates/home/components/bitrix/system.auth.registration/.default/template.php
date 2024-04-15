<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>
<div class="site-section">
    <div class="container">

		<?
		if (!empty($arParams["~AUTH_RESULT"]))
		{
			ShowMessage($arParams["~AUTH_RESULT"]);
		}
		?>

		<?if($arResult["SHOW_EMAIL_SENT_CONFIRMATION"]):?>
			<p><?echo GetMessage("AUTH_EMAIL_SENT")?></p>
		<?endif;?>

		<?if(!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"] && $arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
			<p><?echo GetMessage("AUTH_EMAIL_WILL_BE_SENT")?></p>
		<?endif?>

		<noindex>
			<?if(!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"]):?>

				<form class="p-5 bg-white border" method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform" enctype="multipart/form-data">
					<input type="hidden" name="AUTH_FORM" value="Y" />
					<input type="hidden" name="TYPE" value="REGISTRATION" />

					<div class="row form-group">
						<div class="col-md-8">
							<label class="font-weight-bold"><?=GetMessage("AUTH_NAME")?></label>
							<input type="text" name="USER_NAME" maxlength="50" value="<?=$arResult["USER_NAME"]?>" class="form-control">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-8">
							<label class="font-weight-bold"><?=GetMessage("AUTH_LAST_NAME")?></label>
							<input type="text" name="USER_LAST_NAME" maxlength="50" value="<?=$arResult["USER_LAST_NAME"]?>" class="form-control">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-8">
							<label class="font-weight-bold"><?=GetMessage("AUTH_LOGIN_MIN")?><span>*</span></label>
							<input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>" class="form-control">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-8">
							<label class="font-weight-bold"><?=GetMessage("AUTH_PASSWORD_REQ")?><span>*</span></label>
							<input type="password" name="USER_PASSWORD" maxlength="255" value="<?=$arResult["USER_PASSWORD"]?>" class="form-control" autocomplete="off">
							<?if($arResult["SECURE_AUTH"]):?>
								<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
									<div class="bx-auth-secure-icon"></div>
								</span>
								<noscript>
									<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
										<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
									</span>
								</noscript>
								<script type="text/javascript">
									document.getElementById('bx_auth_secure').style.display = 'inline-block';
								</script>
							<?endif?>
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-8">
							<label class="font-weight-bold"><?=GetMessage("AUTH_CONFIRM")?><span>*</span></label>
							<input type="password" name="USER_CONFIRM_PASSWORD" maxlength="255" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="form-control" autocomplete="off">
						</div>
					</div>

					<?if($arResult["EMAIL_REGISTRATION"]):?>
						<div class="row form-group">
							<div class="col-md-8">
								<label class="font-weight-bold"><?=GetMessage("AUTH_EMAIL")?><?if($arResult["EMAIL_REQUIRED"]):?><span>*</span><?endif?></label>
								<input type="text" name="USER_EMAIL" maxlength="255" value="<?=$arResult["USER_EMAIL"]?>" class="form-control">
							</div>
						</div>
					<?endif?>

					<?// ********************* User properties ***************************************************?>
					<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
						<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>

								<div class="row form-group">
									<div class="col-md-1">
										<label class="font-weight-bold"><?=$arUserField["EDIT_FORM_LABEL"]?><?if ($arUserField["MANDATORY"] == "Y"):?><span>*</span><?endif;?></label>
									</div>
									<div class="col-md-7">
										<?
											$APPLICATION->IncludeComponent(
												"bitrix:system.field.edit",
												$arUserField["USER_TYPE"]["USER_TYPE_ID"],
												array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "bform"), null, array("HIDE_ICONS"=>"Y")
											);
										?>
									</div>
								</div>

						<?endforeach;?>
					<?endif;?>
					<?// ******************** /User properties ***************************************************?>

					<?// ******************** CAPTCHA ***************************************************?>
					<?if ($arResult["USE_CAPTCHA"] == "Y"):?>
						<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
						<div class="row form-group">
							<div class="col-md-4">
								<label class="font-weight-bold"><?=GetMessage("CAPTCHA_REGF_PROMT")?><span>*</span></label>
								<input type="text" name="captcha_word" maxlength="50" value="" class="form-control" autocomplete="off">
							</div>
						</div>
					<?endif?>
					<?// ******************** /CAPTCHA ***************************************************?>

					<div class="row form-group">
						<div class="col-md-12">
							<input type="submit" name="Register" class="btn btn-primary py-2 px-4 rounded-0" value="<?=GetMessage("AUTH_REGISTER")?>" />
						</div>
					</div>

				</form>

				<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
				<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>

				<p><a href="<?=$arResult["AUTH_AUTH_URL"]?>" rel="nofollow"><b><?=GetMessage("AUTH_AUTH")?></b></a></p>

			<?endif?>
		</noindex>

	</div>
</div>

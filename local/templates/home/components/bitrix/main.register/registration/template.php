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
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>

<div class="site-section">
    <div class="container">

		<?if($USER->IsAuthorized()):?>
			<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>
		<?else:?>

			<?
			if (!empty($arResult["ERRORS"])):
				foreach ($arResult["ERRORS"] as $key => $error)
					if (intval($key) == 0 && $key !== 0) 
						$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

				ShowError(implode("<br />", $arResult["ERRORS"]));

			elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
			?>
				<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
			<?
			endif
			?>

			<?if($arResult["SHOW_SMS_FIELD"] == true):?>

				<form class="p-5 bg-white border" method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform">

					<?if($arResult["BACKURL"] <> ''):?>
						<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
					<?endif;?>
					<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />

					<div class="row form-group">
						<div class="col-md-4 mb-3 mb-md-0">
							<label class="font-weight-bold"><?=GetMessage("main_register_sms")?><span class="starrequired">*</span></label>
							<input size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" class="form-control" />
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12">
							<input type="submit" name="code_submit_button" class="btn btn-primary py-2 px-4 rounded-0" value="<?=GetMessage("main_register_sms_send")?>" />
						</div>
					</div>

				</form>

				<script>
					new BX.PhoneAuth({
						containerId: 'bx_register_resend',
						errorContainerId: 'bx_register_error',
						interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
						data:
							<?=CUtil::PhpToJSObject([
								'signedData' => $arResult["SIGNED_DATA"],
							])?>,
						onError:
							function(response)
							{
								var errorDiv = BX('bx_register_error');
								var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
								errorNode.innerHTML = '';
								for(var i = 0; i < response.errors.length; i++)
								{
									errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
								}
								errorDiv.style.display = '';
							}
					});
				</script>

				<div id="bx_register_error" style="display:none"><?ShowError("error")?></div>

				<div id="bx_register_resend"></div>

			<?else:?>

				<form class="p-5 bg-white border" method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
					
					<?if($arResult["BACKURL"] <> ''):?>
						<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
					<?endif;?>

					<?foreach ($arResult["SHOW_FIELDS"] as $FIELD):?>

						<?switch ($FIELD)
						{
							case "PASSWORD":
								?>
									<div class="row form-group">
										<div class="col-md-6 mb-3 mb-md-0">
											<label class="font-weight-bold"><?=GetMessage("REGISTER_FIELD_".$FIELD)?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?></label>
											<input size="30" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" class="form-control">
										</div>
									</div>
								<?
								if($arResult["SECURE_AUTH"])
								{
									?>
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
									<?
								}
								break;
							
							case "CONFIRM_PASSWORD":
								?>
									<div class="row form-group">
										<div class="col-md-6 mb-3 mb-md-0">
											<label class="font-weight-bold"><?=GetMessage("REGISTER_FIELD_".$FIELD)?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?></label>
											<input size="30" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" class="form-control">
										</div>
									</div>
								<?
								break;

							default:
								?>
									<div class="row form-group">
										<div class="col-md-6 mb-3 mb-md-0">
											<label class="font-weight-bold"><?=GetMessage("REGISTER_FIELD_".$FIELD)?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?></label>
											<input size="30" type="text" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" class="form-control">
										</div>
									</div>
								<?
						}?>

					<?endforeach?>

					<?// ********************* User properties ***************************************************?>
					<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
						
						<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>

							<?$arUserField['USER_TYPE']['USE_FIELD_COMPONENT'] = false;?>

							<div class="row form-group">
								<div class="col-md-1 mb-3 mb-md-0">
									<label class="font-weight-bold"><?=$arUserField["EDIT_FORM_LABEL"]?>:<?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;?></label>
								</div>
								<div class="col-md-11 mb-3 mb-md-0">
									<?
										$APPLICATION->IncludeComponent(
											"bitrix:system.field.edit",
											"group_selection_field",
											array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "regform"), null, array("HIDE_ICONS"=>"Y")
										);
									?>
								</div>
							</div>

						<?endforeach;?>

					<?endif;?>
					<?// ******************** /User properties ***************************************************?>

					<?if ($arResult["USE_CAPTCHA"] == "Y"):?>
						<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br />
						<div class="row form-group">
							<div class="col-md-4 mb-3 mb-md-0">
								<label class="font-weight-bold"><?=GetMessage("REGISTER_CAPTCHA_PROMT")?><span class="starrequired">*</span></label>
								<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" class="form-control" />
							</div>
						</div>
					<?endif;?>

					<div class="row form-group">
						<div class="col-md-12">
							<input type="submit" name="register_submit_button" class="btn btn-primary py-2 px-4 rounded-0" value="<?=GetMessage("AUTH_REGISTER")?>" />
						</div>
					</div>

				</form>

				<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>

			<?endif //$arResult["SHOW_SMS_FIELD"] == true ?>

			<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>

		<?endif //$USER->IsAuthorized()?>

	</div>
</div>

<?
echo '<pre>';
print_r($arResult);
echo '<br>';
print_r($arParams);
echo '</pre>';
?>

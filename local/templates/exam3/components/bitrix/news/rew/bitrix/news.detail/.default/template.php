<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$resizeImage = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], array('width'=>68, 'height'=>50), BX_RESIZE_IMAGE_EXACT);
?>

<hr>

<div class="review-block">
	<div class="review-text">
		<?if($arResult["DETAIL_TEXT"] <> ''):?>
			<div class="review-text-cont">
				<?echo $arResult["DETAIL_TEXT"];?>
			</div>
		<?endif?>
		<div class="review-autor">
			<?=$arResult["NAME"]?>,
			<?=$arResult["DISPLAY_ACTIVE_FROM"]?> г.,
			<?=$arResult["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]?>,
			<?=$arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]?>.
		</div>
	</div>
	<div style="clear: both;" class="review-img-wrap">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
			<img
				class="detail_picture"
				border="0"
				src="<?=$resizeImage["src"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
		<?else:?>
			<img
				class="detail_picture"
				border="0"
				src="<?=SITE_TEMPLATE_PATH?>/img/rew/no_photo.jpg"
				width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
				height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
				alt="<?=GetMessage("DETAIL_LIST_NO_PHOTO");?>"
				title="<?=GetMessage("DETAIL_LIST_NO_PHOTO");?>"
			/>
		<?endif?>
	</div>
</div>

<?if ($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]):?>
	<div class="exam-review-doc">
		<p><?=GetMessage("REW_DETAIL_DOCUMENTS_TITLE")?>:</p>
		<?if (count($arResult["PROPERTIES"]["DOCUMENTS"]["VALUE"]) > 1):?>
			<?foreach ($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"] as $arItem):?>
				<div class="exam-review-item-doc">
					<img
						class="rew-doc-ico"
						src="<?=SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png"
					>
					<a href="<?=$arItem["SRC"]?>" download><?=$arItem["ORIGINAL_NAME"]?></a>
				</div>
			<?endforeach;?>
		<?else:?>
			<div class="exam-review-item-doc">
				<img
					class="rew-doc-ico"
					src="<?=SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png"
				>
				<a href="<?=$arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"]["SRC"]?>" download><?=$arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"]["ORIGINAL_NAME"]?></a>
			</div>
		<?endif;?>
	</div>
<?endif;?>

<hr>

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

function displayOneDocument($src, $originalName)
{
	$result = '
		<div class="exam-review-item-doc">
			<img class="rew-doc-ico" src="' . SITE_TEMPLATE_PATH . '/img/icons/pdf_ico_40.png">
			<a href="' . $src . '" download>' . $originalName . '</a>
		</div>
	';
	echo '<div class="exam-review-doc"><p>' . GetMessage("DETAIL_DOCUMENTS_TITLE") . ':</p>'. $result . '</div>';
}

function displayDocuments($fileValue)
{
	$result = '';
	foreach ($fileValue as $arDisplayDocumentValue)
	{
		$result .= '
			<div class="exam-review-item-doc">
				<img class="rew-doc-ico" src="' . SITE_TEMPLATE_PATH . '/img/icons/pdf_ico_40.png">
				<a href="' . $arDisplayDocumentValue["SRC"] . '" download>'
					. $arDisplayDocumentValue["ORIGINAL_NAME"] .
				'</a>
			</div>
		';
	}
	echo '<div class="exam-review-doc"><p>' . GetMessage("DETAIL_DOCUMENTS_TITLE") . ':</p>'. $result . '</div>';
}

$APPLICATION->SetPageProperty(
	"title",
	$arResult["NAME"] ? ("Отзыв - " . $arResult["NAME"]) : ''
);
$APPLICATION->SetTitle(
	"Отзыв - " . (($arResult["NAME"] && $arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]) ? ($arResult["NAME"] . " - " . $arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]) : '')
);
$APPLICATION->SetPageProperty(
	"keywords",
	"лучшие, отзывы" . ($arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"] ? (" ," . $arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]) : '')
);
$APPLICATION->SetPageProperty(
	"description", 
	$arResult["PREVIEW_TEXT"] ? $arResult["PREVIEW_TEXT"] : ''
);
?>

<hr>

<div class="review-block">
	<div class="review-text">
		
		<?if($arResult["DETAIL_TEXT"] <> ''):?>
			<div class="review-text-cont">
				<?echo $arResult["DETAIL_TEXT"];?>
			</div>
		<?endif;?>

		<div class="review-autor">
			<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
				<?=$arResult["NAME"]?>,
			<?endif;?>
			<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
				<?=$arResult["DISPLAY_ACTIVE_FROM"]?>,
			<?endif;?>
			<?if($arResult["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]):?>
				<?=$arResult["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]?>,
			<?endif;?>
			<?if($arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]):?>
				<?=$arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]?>.
			<?endif;?>
		</div>
	</div>
	
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<div style="clear: both;" class="review-img-wrap">
			<img
				class="detail_picture"
				border="0"
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
				height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			>
		</div>
		<?else:?>
			<div style="clear: both;" class="review-img-wrap">
				<img
					border="0"
					src="<?=SITE_TEMPLATE_PATH?>/img/rew/no_photo.jpg"
					alt="<?=GetMessage("NO_PHOTO_ALT");?>"
					title="<?=GetMessage("NO_PHOTO_ALT");?>"
				/>
			</div>
		<?endif?>
</div>

<?if ($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"]):?>

	<?if (count($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["VALUE"]) > 1):?>
		<?displayDocuments($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"]);?>
	<?else:?>
		<?displayOneDocument(
			$arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"]["SRC"],
			$arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"]["ORIGINAL_NAME"]
		);?>
	<?endif;?>

<?endif;?>

<hr>

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
?>

<div class="rew-footer-carousel">
	<?foreach($arResult["ITEMS"] as $arItem):?>

		<?$resizeImage = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>39, 'height'=>39), BX_RESIZE_IMAGE_PROPORTIONAL);?>

		<div class="item">
			<div class="side-block side-opin">
				<div class="inner-block">
					<div class="title">
						<div class="photo-block">
							<?if ($arItem["PREVIEW_PICTURE"]):?>
								<img
									class="preview_picture"
									border="0"
									src="<?=$resizeImage["src"]?>"
									alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
									title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
									style="float:left"
								/>
							<?else:?>
								<img
									class="preview_picture"
									border="0"
									src="<?=SITE_DIR?>/upload/no_photo_left_block.jpg"
									alt="<?=GetMessage("REW_LIST_FOOTER_NO_PHOTO")?>"
									title="<?=GetMessage("REW_LIST_FOOTER_NO_PHOTO")?>"
									style="float:left"
								/>
							<?endif;?>
						</div>
						<div class="name-block">
							<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
						</div>
						<div class="pos-block">
							<?echo $arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"];?>,
							<?echo $arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"];?>
						</div>
					</div>
					<div class="text-block">
						<?echo $arItem["PREVIEW_TEXT"];?>
					</div>
				</div>
			</div>
		</div>

	<?endforeach;?>
</div>

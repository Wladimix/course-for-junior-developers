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

function resizeImage($previewPicture)
{
	$image = CFile::ResizeImageGet(
		$previewPicture,
		array('width'=>39, 'height'=>39),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		true
	);
	$thumbnailImage = '
		<img
			class="preview_picture"
			border="0"
			src="' . $image["src"] .  '"
			width="' . $image["width"] .  '"
			height="' . $image["height"] .  '"
			alt="'. $previewPicture["ALT"] . '?>"
			title="'. $previewPicture["TITLE"] . '"
			style="float:left"
		/>
	';

	return $thumbnailImage;
}
?>

<div class="item-wrap">
		<div class="rew-footer-carousel">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<div class="item">
				<div class="side-block side-opin">
					<div class="inner-block">
						<div class="title">
							<div class="photo-block">
								<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
									<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>

										<div class="review-img-wrap">
											<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
												<?=resizeImage($arItem["PREVIEW_PICTURE"])?>
											</a>
										</div>

									<?else:?>

										<div class="review-img-wrap">
											<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
												<?=resizeImage($arItem["PREVIEW_PICTURE"])?>
											</a>
										</div>

									<?endif;?>
								<?else:?>
									<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>

										<div class="review-img-wrap">
											<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
													<img
														class="preview_picture"
														border="0"
														src="<?=SITE_TEMPLATE_PATH?>/img/no_photo_left_block.jpg"
														alt="<?=GetMessage("NO_PHOTO_ALT");?>"
														title="<?=GetMessage("NO_PHOTO_ALT");?>"
														style="float:left"
													/>
												</a>
										</div>

									<?else:?>

										<div class="review-img-wrap">
											<img
												class="preview_picture"
												border="0"
												src="<?=SITE_TEMPLATE_PATH?>/img/no_photo_left_block.jpg"
												alt="<?=GetMessage("NO_PHOTO_ALT");?>"
												title="<?=GetMessage("NO_PHOTO_ALT");?>"
												style="float:left"
											/>
										</div>

									<?endif;?>
								<?endif?>
							</div>
							<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
								<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
									<div class="name-block"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
								<?else:?>
									<div class="name-block"><?echo $arItem["NAME"]?></div>
								<?endif;?>
							<?endif;?>
							<div class="pos-block">
								<?echo $arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]?>,
								<?echo $arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]?>
							</div>
						</div>
						<div class="text-block">“
							<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
								<?=TruncateText($arItem["PREVIEW_TEXT"], 150);?>
							<?endif;?>
						</div>
					</div>
				</div>
			</div>
		<?endforeach;?>
	</div>
</div>

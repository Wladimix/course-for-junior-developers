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

<div class="pt-5">
    <div class="container">
        <form class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
				<div class="select-wrap">
				<span class="icon icon-arrow_drop_down"></span>
				<select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
					<option value="">Lot Area</option>
					<option value="1000">1000</option>
					<option value="800">800</option>
					<option value="600">600</option>
					<option value="400">400</option>
					<option value="200">200</option>
					<option value="100">100</option>
				</select>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
				<div class="select-wrap">
				<span class="icon icon-arrow_drop_down"></span>
				<select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
					<option value="">Property Status</option>
					<option value="For Sale">For Sale</option>
					<option value="For Rent">For Rent</option>
				</select>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
				<div class="select-wrap">
				<span class="icon icon-arrow_drop_down"></span>
				<select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
					<option value="">Location</option>
					<option value="United States">United States</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="Canada">Canada</option>
					<option value="Belgium">Belgium</option>
				</select>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
				<div class="select-wrap">
				<span class="icon icon-arrow_drop_down"></span>
				<select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
					<option value="">Lot Area</option>
					<option value="1000">1000</option>
					<option value="800">800</option>
					<option value="600">600</option>
					<option value="400">400</option>
					<option value="200">200</option>
					<option value="100">100</option>
				</select>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
				<div class="select-wrap">
				<span class="icon icon-arrow_drop_down"></span>
				<select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
					<option value="">Bedrooms</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5+">5+</option>
				</select>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
				<div class="select-wrap">
				<span class="icon icon-arrow_drop_down"></span>
				<select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
					<option value="">Bathrooms</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5+">5+</option>
				</select>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
				<div class="mb-4">
				<div id="slider-range" class="border-primary ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 19.1919%; width: 55.5556%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 19.1919%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 74.7475%;"></span></div>
				<input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="">
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
				<input type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0" value="Search">
			</div>
        </form>
    </div>
</div>
<div class="site-section site-section-sm bg-light">
	<div class="container">
		<div class="row mb-5">
			<div class="col-12">
				<div class="site-section-title">
					<h2><?=$arParams["BLOCK_HEADER"];?></h2>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<?foreach($arResult["ITEMS"] as $arItem):?>

				<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>

				<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="col-md-6 col-lg-4 mb-4">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="prop-entry d-block">
						<figure>
							<img alt="<?=$arItem["NAME"]?>" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" class="img-fluid">
						</figure>
						<div class="prop-text">
							<div class="inner">
								<span class="price rounded">$<?=$arItem["DISPLAY_PROPERTIES"]["COST"]["VALUE"]?></span>
								<h3 class="title"><?=$arItem["NAME"]?></h3>
								<p class="location">
									<?=$arItem["PREVIEW_TEXT"];?>
								</p>
							</div>
							<div class="prop-more-info">
								<div class="inner d-flex">
									<div class="col">
										<?=GetMessage("AREA");?>: <strong><?=$arItem["DISPLAY_PROPERTIES"]["SQUARE"]["VALUE"]?><sup>2</sup></strong>
									</div>
									<div class="col">
										<?=GetMessage("BEDS");?>: <strong><?=$arItem["DISPLAY_PROPERTIES"]["FLOORS"]["VALUE"]?></strong>
									</div>
									<div class="col">
										<?=GetMessage("BATHS");?>: <strong><?=$arItem["DISPLAY_PROPERTIES"]["BATHROOMS"]["VALUE"]?></strong>
									</div>
									<div class="col">
										<?=GetMessage("GARAGE");?>: <strong><?if ($arItem["DISPLAY_PROPERTIES"]["GARAGES"]["VALUE"]):?>Да<?else:?>Нет<?endif?></strong>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>

			<?endforeach;?>
		</div>
		<?if ($arParams["DISPLAY_BOTTOM_PAGER"]) :?>
			<br><?=$arResult["NAV_STRING"]?>
		<?endif?>
	</div>
</div>

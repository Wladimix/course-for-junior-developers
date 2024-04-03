<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<div class="row">
	<div class="col-md-12 text-center">
		<div class="site-pagination">

			<?if ($arResult["NavPageNomer"] > 3):?>
				<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["NavPageCount"] - $arResult["NavPageCount"] + 1?></a>&nbsp;
				<span>...</span>&nbsp;
			<?endif?>

			<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>

				<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
					<a class="active" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>&nbsp;
				<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
					<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>&nbsp;
				<?else:?>
					<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>&nbsp;
				<?endif?>
				<?$arResult["nStartPage"]++?>

			<?endwhile?>

			<?if($arResult["NavPageNomer"] < ($arResult["NavPageCount"] - 2)):?>
				<span>...</span>&nbsp;
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>&nbsp;
			<?endif?>

		</div>
	</div>
</div>

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

/** @var PageNavigationComponent $component */
$component = $this->getComponent();

$this->setFrameMode(true);
?>

<div class="row">
	<div class="col-md-12 text-center">
		<div class="site-pagination">
			<?if ($arResult["CURRENT_PAGE"] > 1):?>
				<a href="<?=htmlspecialcharsbx($arResult["URL"])?>"><span>1</span></a>
				<?if ($arResult["CURRENT_PAGE"] > 3):?>
					&nbsp;<span>...</span>&nbsp;
				<?endif?>
			<?else:?>
				<a class="active" href="">1</a>
			<?endif?>

			<?
			$page = $arResult["START_PAGE"] + 1;
			while($page <= $arResult["END_PAGE"] - 1):
			?>
				<?if ($page == $arResult["CURRENT_PAGE"]):?>
					<a class="active" href=""><?=$page?></a>
				<?else:?>
					<a href="<?=htmlspecialcharsbx($component->replaceUrlTemplate($page))?>"><span><?=$page?></span></a>
				<?endif?>
				<?$page++?>
			<?endwhile?>

			<?if($arResult["CURRENT_PAGE"] < $arResult["PAGE_COUNT"]):?>
				<?if($arResult["PAGE_COUNT"] > 1):?>
					<?if(($arResult["PAGE_COUNT"] - $arResult["CURRENT_PAGE"]) > 2):?>
						&nbsp;<span>...</span>&nbsp;
					<?endif?>
					<a href="<?=htmlspecialcharsbx($component->replaceUrlTemplate($arResult["PAGE_COUNT"]))?>"><span><?=$arResult["PAGE_COUNT"]?></span></a>
				<?endif?>
			<?else:?>
				<?if($arResult["PAGE_COUNT"] > 1):?>
					<a class="active" href=""><span><?=$arResult["PAGE_COUNT"]?></span></a>
				<?endif?>
			<?endif?>
		</div>
	</div>
</div>

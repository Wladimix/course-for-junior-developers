<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
<div class="item">
	<div class="title-block"><?=GetMessage("BOTTOM_MENU_TITLE")?></div>
	<ul>
		<?
		foreach($arResult as $arItem):
			if($arItem["DEPTH_LEVEL"] > 1) 
				continue;
		?>
			<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?endforeach?>
	</ul>
</div> 
<?endif?>

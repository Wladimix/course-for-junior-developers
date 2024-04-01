<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if (empty($arResult))
	return "";

$itemSize = count($arResult);
$lastPointIndex = $itemSize - 1;
$lastPointTitle = htmlspecialcharsex($arResult[$lastPointIndex]['TITLE']);

$strReturn = '
	<div
		class="site-blocks-cover inner-page-cover overlay aos-init aos-animate"
		style="background-image: url(&quot;/local/templates/.default/images/hero_bg_2.jpg&quot;); background-position: 50% -79.9922px;"
		data-aos="fade"
		data-stellar-background-ratio="0.5"
	>
		<div class="container">
			<div class="row align-items-center justify-content-center text-center">
				<div class="col-md-10">
				<h1 class="mb-2">' . $lastPointTitle . '</h1>
';

for ($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0 ? '<span class="mx-2 text-white">•</span>' : '');

	if ($arResult[$index]["LINK"] <> "" && $index != $lastPointIndex)
	{
		$strReturn .= '
			' . $arrow . '<a href="' . $arResult[$index]["LINK"] . '">' . $title . '</a>
		';
	}
	else
	{
		$strReturn .= '
			' . $arrow . '<strong class="text-white">'.$title.'</strong>
		';
	}

}

$strReturn .= '</div></div></div></div>';
return $strReturn;

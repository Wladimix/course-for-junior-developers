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

<div class="site-blocks-cover overlay aos-init aos-animate" style="background-image: url(<?=$arResult["DETAIL_PICTURE"]["SRC"]?>); background-position: 50% 120.008px;" data-aos="fade" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row align-items-center justify-content-center text-center">
			<div class="col-md-10">
				<span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded"><?=GetMessage('DETAIL_PICTURE_ADS_TITLE');?></span>
				<h1 class="mb-2"><?=$arResult["NAME"]?></h1>
				<p class="mb-5"><strong class="h2 text-success font-weight-bold"><?=$arResult["DISPLAY_PROPERTIES"]["COST"]["VALUE"]?></strong></p>
			</div>
		</div>
	</div>
</div>
<div class="site-section site-section-sm">
    <div class="container">
        <div class="row">
          	<div class="col-lg-8" style="margin-top: -150px;">
            	<div class="mb-5">
					<div class="slide-one-item home-slider owl-carousel">

						<?if (array_key_exists("PICS_ADS", $arResult["DISPLAY_PROPERTIES"])):?>
							<?foreach ($arResult["DISPLAY_PROPERTIES"]["PICS_ADS"]["VALUE"] as $pictureValue):?>
								<div>
									<img
										src="<?=CFile::GetPath($pictureValue)?>"
										alt="<?=CFile::GetFileArray($pictureValue)["ORIGINAL_NAME"]?>"
										class="img-fluid"
									>
								</div>
							<?endforeach;?>
						<?endif;?>

					</div>
				</div>
            	<div class="bg-white">
              		<div class="row mb-5">
                		<div class="col-md-6">
                  			<strong class="text-success h1 mb-3">$<?=$arResult["DISPLAY_PROPERTIES"]["COST"]["VALUE"]?></strong>
                		</div>
                		<div class="col-md-6">
                  			<ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                  				<li>
									<span class="property-specs"><?=GetMessage("DATE_OF_UPDATE");?></span>
									<span class="property-specs-number"><?=$arResult["TIMESTAMP_X"]?></span>
								</li>
								<li>
									<span class="property-specs"><?=GetMessage("BEDS");?></span>
									<span class="property-specs-number"><?=$arResult["DISPLAY_PROPERTIES"]["FLOORS"]["VALUE"]?></span>
								</li>
								<li>
									<span class="property-specs"><?=GetMessage("AREA");?></span>
									<span class="property-specs-number"><?=$arResult["DISPLAY_PROPERTIES"]["SQUARE"]["VALUE"]?><sup>2</sup></span>
								</li>
							</ul>
                		</div>
              		</div>
            		<div class="row mb-5">
						<div class="col-md-6 col-lg-6 text-left border-bottom border-top py-3">
							<span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("BATHS");?></span>
							<strong class="d-block"><?=$arResult["DISPLAY_PROPERTIES"]["BATHROOMS"]["VALUE"]?></strong>
						</div>
						<div class="col-md-6 col-lg-6 text-left border-bottom border-top py-3">
							<span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("GARAGE");?></span>
							<strong class="d-block"><?if ($arResult["DISPLAY_PROPERTIES"]["GARAGES"]["VALUE"]):?>Да<?else:?>Нет<?endif?></strong>
						</div>
					</div>

              		<h2 class="h4 text-black"><?=GetMessage("MORE_INFO");?></h2>
					<?=$arResult["DETAIL_TEXT"]?>

					<div class="row mt-5">
						<div class="col-12">
							<h2 class="h4 text-black mb-3"><?=GetMessage("PROPERTY_GALERY");?></h2>
						</div>

						<?if (array_key_exists("PICS_ADS", $arResult["DISPLAY_PROPERTIES"])):?>
							<?foreach ($arResult["DISPLAY_PROPERTIES"]["PICS_ADS"]["VALUE"] as $pictureValue):?>
								<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
									<a
										href="<?=CFile::GetPath($pictureValue)?>"
										class="image-popup gal-item"
									>
										<img
											src="<?=CFile::GetPath($pictureValue)?>"
											alt="<?=CFile::GetFileArray($pictureValue)["ORIGINAL_NAME"]?>"
											class="img-fluid"
										>
									</a>
								</div>
							<?endforeach;?>
						<?endif;?>

					</div>
            	</div>
          	</div>
          	<div class="col-lg-4 pl-md-5">
				<div class="bg-white widget border rounded">
					<h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
					<form action="" class="form-contact-agent">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" id="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" id="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" id="phone" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" id="phone" class="btn btn-primary" value="Send Message">
						</div>
					</form>
				</div>
				<div class="bg-white widget border rounded">
					<h3 class="h4 text-black widget-title mb-3">Paragraph</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit qui explicabo, libero nam, saepe eligendi. Molestias maiores illum error rerum. Exercitationem ullam saepe, minus, reiciendis ducimus quis. Illo, quisquam, veritatis.</p>
				</div>
          	</div>
        </div>
		<div class="row">
			<div class="col-lg-8">

				<?if (array_key_exists("ADD_MAT", $arResult["DISPLAY_PROPERTIES"])):?>
					<h2 class="h4 text-black"><?=GetMessage("ADDITIONAL_MATERIALS");?></h2>
					<ul>
						<?foreach ($arResult["DISPLAY_PROPERTIES"]["ADD_MAT"]["VALUE"] as $fileValue):?>
							<li>
								<a href="<?=CFile::GetPath($fileValue)?>" download>
									<?=CFile::GetFileArray($fileValue)["ORIGINAL_NAME"]?>
								</a>
							</li>
						<?endforeach;?>
					</ul>
				<?endif;?>

			</div>
		</div>
		<div class="row">
			<div class="col-lg-8">

				<?if (array_key_exists("EX_RES", $arResult["DISPLAY_PROPERTIES"])):?>
					<h2 class="h4 text-black"><?=GetMessage("LINKS_TO_EXTERNAL_RESOURCES");?></h2>
					<ul>
						<?foreach ($arResult["DISPLAY_PROPERTIES"]["EX_RES"]["VALUE"] as $linkToExternalResource):?>
							<li>
								<a href="<?=$linkToExternalResource?>"><?=$linkToExternalResource?></a>
							</li>
						<?endforeach;?>
					</ul>
				<?endif;?>

			</div>
		</div>
    </div>
</div>

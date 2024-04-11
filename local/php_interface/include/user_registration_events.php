<?php
AddEventHandler("main", "OnAfterUserRegister", Array("MyClass", "OnBeforeUserRegisterHandler"));
class MyClass
{
	public static function OnBeforeUserRegisterHandler(&$arFields)
	{

		if ($arFields["UF_GROUP"] == 21)
			$arFields["GROUP_ID"][] = 6; 

		if ($arFields["UF_GROUP"] == 22)
			$arFields["GROUP_ID"][] = 7; 

		return true;

	}
}

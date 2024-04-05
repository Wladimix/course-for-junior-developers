<?php

namespace Sprint\Migration;


class Agents20240405140932 extends Version
{
	protected $description = "Создание таблицы с агентами";

	protected $moduleVersion = "4.6.1";

	/**
	 * @throws Exceptions\HelperException
	 * @return bool|void
	 */
	public function up()
	{
		$helper = $this->getHelperManager();

		$hlblockId = $helper->Hlblock()->saveHlblock(array (
			'NAME' => 'RealEestateAgents',
			'TABLE_NAME' => 'real_estate_agents',
			'LANG' => 
			array (
				'ru' => 
				array (
				'NAME' => 'Агенты по недвижимости',
				),
			),
		));

		$helper->Hlblock()->saveField($hlblockId, array (
			'FIELD_NAME' => 'UF_FULL_NAME',
			'USER_TYPE_ID' => 'string',
			'XML_ID' => '',
			'SORT' => '100',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'Y',
			'SHOW_FILTER' => 'S',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'N',
			'SETTINGS' => 
			array (
				'SIZE' => 20,
				'ROWS' => 1,
				'REGEXP' => '',
				'MIN_LENGTH' => 0,
				'MAX_LENGTH' => 0,
				'DEFAULT_VALUE' => '',
			),
			'EDIT_FORM_LABEL' => 
			array (
				'en' => '',
				'ru' => 'ФИО',
			),
			'LIST_COLUMN_LABEL' => 
			array (
				'en' => '',
				'ru' => 'ФИО',
			),
			'LIST_FILTER_LABEL' => 
			array (
				'en' => '',
				'ru' => 'ФИО',
			),
			'ERROR_MESSAGE' => 
			array (
				'en' => '',
				'ru' => '',
			),
			'HELP_MESSAGE' => 
			array (
				'en' => '',
				'ru' => 'ФИО',
			),
		));

		$helper->Hlblock()->saveField($hlblockId, array (
			'FIELD_NAME' => 'UF_ACTIVE',
			'USER_TYPE_ID' => 'boolean',
			'XML_ID' => '',
			'SORT' => '100',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'N',
			'SHOW_FILTER' => 'N',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'N',
			'SETTINGS' => 
			array (
				'DEFAULT_VALUE' => 1,
				'DISPLAY' => 'RADIO',
				'LABEL' => 
				array (
				0 => '',
				1 => '',
				),
				'LABEL_CHECKBOX' => '',
			),
			'EDIT_FORM_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Активность',
			),
			'LIST_COLUMN_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Активность',
			),
			'LIST_FILTER_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Активность',
			),
			'ERROR_MESSAGE' => 
			array (
				'en' => '',
				'ru' => '',
			),
			'HELP_MESSAGE' => 
			array (
				'en' => '',
				'ru' => '',
			),
		));

		$helper->Hlblock()->saveField($hlblockId, array (
			'FIELD_NAME' => 'UF_EMAIL',
			'USER_TYPE_ID' => 'string',
			'XML_ID' => '',
			'SORT' => '100',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'Y',
			'SHOW_FILTER' => 'N',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'N',
			'SETTINGS' => 
			array (
				'SIZE' => 20,
				'ROWS' => 1,
				'REGEXP' => '',
				'MIN_LENGTH' => 0,
				'MAX_LENGTH' => 0,
				'DEFAULT_VALUE' => '',
			),
			'EDIT_FORM_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Почта',
			),
			'LIST_COLUMN_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Почта',
			),
			'LIST_FILTER_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Почта',
			),
			'ERROR_MESSAGE' => 
			array (
				'en' => '',
				'ru' => '',
			),
			'HELP_MESSAGE' => 
			array (
				'en' => '',
				'ru' => '',
			),
		));

		$helper->Hlblock()->saveField($hlblockId, array (
			'FIELD_NAME' => 'UF_PHONE',
			'USER_TYPE_ID' => 'string',
			'XML_ID' => '',
			'SORT' => '100',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'Y',
			'SHOW_FILTER' => 'N',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'N',
			'SETTINGS' => 
			array (
				'SIZE' => 20,
				'ROWS' => 1,
				'REGEXP' => '',
				'MIN_LENGTH' => 0,
				'MAX_LENGTH' => 0,
				'DEFAULT_VALUE' => '',
			),
			'EDIT_FORM_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Телефон',
			),
			'LIST_COLUMN_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Телефон',
			),
			'LIST_FILTER_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Телефон',
			),
			'ERROR_MESSAGE' => 
			array (
				'en' => '',
				'ru' => '',
			),
			'HELP_MESSAGE' => 
			array (
				'en' => '',
				'ru' => '',
			),
		));

		$helper->Hlblock()->saveField($hlblockId, array (
			'FIELD_NAME' => 'UF_TYPE_OF_ACTIVITY',
			'USER_TYPE_ID' => 'enumeration',
			'XML_ID' => '',
			'SORT' => '100',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'Y',
			'SHOW_FILTER' => 'N',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'N',
			'SETTINGS' => 
			array (
				'DISPLAY' => 'LIST',
				'LIST_HEIGHT' => 1,
				'CAPTION_NO_VALUE' => '',
				'SHOW_NO_VALUE' => 'N',
			),
			'EDIT_FORM_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Вид деятельности',
			),
			'LIST_COLUMN_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Вид деятельности',
			),
			'LIST_FILTER_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Вид деятельности',
			),
			'ERROR_MESSAGE' => 
			array (
				'en' => '',
				'ru' => '',
			),
			'HELP_MESSAGE' => 
			array (
				'en' => '',
				'ru' => '',
			),
			'ENUM_VALUES' => 
			array (
				0 => 
				array (
				'VALUE' => 'Брокер',
				'DEF' => 'Y',
				'SORT' => '500',
				'XML_ID' => 'BROKER',
				),
				1 => 
				array (
				'VALUE' => 'Агент по продаже',
				'DEF' => 'N',
				'SORT' => '500',
				'XML_ID' => 'SALES_AGENT',
				),
				2 => 
				array (
				'VALUE' => 'Агент по покупке',
				'DEF' => 'N',
				'SORT' => '500',
				'XML_ID' => 'BUYING_AGENT',
				),
				3 => 
				array (
				'VALUE' => 'Риэлтор',
				'DEF' => 'N',
				'SORT' => '500',
				'XML_ID' => 'REALTOR',
				),
			),
		));
		
		$helper->Hlblock()->saveField($hlblockId, array (
			'FIELD_NAME' => 'UF_PHOTO',
			'USER_TYPE_ID' => 'file',
			'XML_ID' => '',
			'SORT' => '100',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'N',
			'SHOW_FILTER' => 'N',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'N',
			'SETTINGS' => 
			array (
				'SIZE' => 20,
				'LIST_WIDTH' => 0,
				'LIST_HEIGHT' => 0,
				'MAX_SHOW_SIZE' => 0,
				'MAX_ALLOWED_SIZE' => 0,
				'EXTENSIONS' => 
				array (
				),
				'TARGET_BLANK' => 'Y',
			),
			'EDIT_FORM_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Фото',
			),
			'LIST_COLUMN_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Фото',
			),
			'LIST_FILTER_LABEL' => 
			array (
				'en' => '',
				'ru' => 'Фото',
			),
			'ERROR_MESSAGE' => 
			array (
				'en' => '',
				'ru' => '',
			),
			'HELP_MESSAGE' => 
			array (
				'en' => '',
				'ru' => '',
			),
		));
	}

	public function down()
	{
		$helper = $this->getHelperManager();

        $hlblockId = $helper->Hlblock()->getHlblockIdIfExists('RealEestateAgents');

        $helper->Hlblock()->deleteHlblock($hlblockId);
	}
}

<?php
use \Bitrix\Main\Application;
use \Bitrix\Main\EventManager;
use \Bitrix\Main\Entity\Event;

EventManager::getInstance()->addEventHandler('', 'RealEestateAgentsOnAfterAdd',    'clearCache');
EventManager::getInstance()->addEventHandler('', 'RealEestateAgentsOnAfterUpdate', 'clearCache');
EventManager::getInstance()->addEventHandler('', 'RealEestateAgentsOnAfterDelete', 'clearCache');

function clearCache(Event $event) {
	$eventType = $event->getEntity();
	$taggedCache = Application::getInstance()->getTaggedCache();
	$taggedCache->clearByTag('hlblock_table_name_' . $eventType->getDbTableName());
}

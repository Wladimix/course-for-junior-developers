<?php
use \Bitrix\Main\Application;
use \Bitrix\Main\EventManager;
use \Bitrix\Main\Entity\Event;

EventManager::getInstance()->addEventHandler('', 'RealEestateAgentsOnAfterAdd',    'OnAdd');
EventManager::getInstance()->addEventHandler('', 'RealEestateAgentsOnAfterUpdate', 'OnUpdate');
EventManager::getInstance()->addEventHandler('', 'RealEestateAgentsOnAfterDelete', 'OnDelete');

function clearCache(Event $event) {
	$eventType = $event->getEntity();
	$taggedCache = Application::getInstance()->getTaggedCache();
	$taggedCache->clearByTag('hlblock_table_name_' . $eventType->getDbTableName());
}
 
function OnAdd(Event $event)    { clearCache($event); }
function OnUpdate(Event $event) { clearCache($event); }
function OnDelete(Event $event) { clearCache($event); }

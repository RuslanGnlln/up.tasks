<?php
/**
 * @var CMain $APPLICATION
 */

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Tasker");

$APPLICATION->IncludeComponent('up:task.list', '', []);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
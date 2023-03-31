<?php

/**
 * @var CMain $APPLICATION
 * @var array $arParams
 */

//if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Tasker error");
?>

	<div class="container">
		<div class="alert alert-danger">
			<?php foreach ($arParams['ERRORS'] as $error) { ?>
				<p><?= Loc::getMessage($error) ?></p>
			<?php } ?>
		</div>
	</div>

<?php
$APPLICATION->IncludeComponent('up:task.list', '', []);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>
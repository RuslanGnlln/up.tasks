<?php

/**
 * @var array $arResult
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

?>

<div class="container">
	<?php if ($arResult['TASKS']) { ?>
		<ul class="list-group">
			<?php foreach ($arResult['TASKS'] as $task): ?>
				<li class="list-group-item d-flex justify-content-between align-items-center">
					<div>
						<p><?= htmlspecialcharsbx($task['TEXT']) ?></p>
						<p class="text-secondary"> <?= Loc::getMessage('UP_TASKS_CREATED_AT') ?>
							: <?= $task['CREATED_AT']->format($arResult['DATE_FORMAT']) ?></p>
					</div>
					<form method="post" action="/tasks/delete/">
						<?=bitrix_sessid_post()?>
						<input type="hidden" value="<?= $task['ID'] ?>" name="id">
						<button class="btn btn-danger h-50" type="submit">x</button>
					</form>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php } else { ?>
		<p class="lead d-flex justify-content-center mt-3">
			<?= Loc::getMessage('UP_TASKS_NO_TASKS_FOUND') ?>
		</p>
	<?php } ?>


</div>
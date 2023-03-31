<?php

namespace Up\Tasks;

use Bitrix\Main\Application;
use Bitrix\Main\Web\Json;

class TaskController
{
	public static function getTaskList()
	{
		return \Up\Tasks\Model\TasksTable::getList([
			'select' => ['*']
		])->fetchAll();
	}

	public static function addTask()
	{
		if (!check_bitrix_sessid()) {
			LocalRedirect('/tasks/');
		}

		$task = \Bitrix\Main\Context::getCurrent()->getRequest()->getPost('task-text');
		$task = trim($task);

		$errors = [];

		if (empty($task)) {
			$errors[] = 'UP_TASKS_ERROR_EMPTY_TASK';
		}

		if(strlen($task) > 255) {
			$errors[] = 'UP_TASKS_ERROR_TOO_LONG_TASK';
		}

		// Добавление задачи
		if (empty($errors)) {
			$result = \Up\Tasks\Model\TasksTable::add([
				'TEXT' => $task
			]);
			if (!$result->isSuccess()){
				$errors[] = 'UP_TASKS_ERROR_UNEXPECTED';
				//$errors[] = $result->getErrors();
			}
		}

		if (!empty($errors)) {
			global $APPLICATION;
			$APPLICATION->IncludeComponent("up:task.list", "errors",
				[
					"ERRORS" => $errors
				]
			);
		} else {
			LocalRedirect('/tasks/');
		}
	}

	public static function deleteTask()
	{
		if (!check_bitrix_sessid()) {
			LocalRedirect('/tasks/');
		}

		$taskId = \Bitrix\Main\Context::getCurrent()->getRequest()->getPost('id');

		$result = \Up\Tasks\Model\TasksTable::delete((int) $taskId);

		$errors = [];
		if (!$result->isSuccess()){
			$errors[] = 'UP_TASKS_ERROR_UNEXPECTED';
			//$errors[] = $result->getErrors();
		}

		if (!empty($errors)) {
			global $APPLICATION;
			$APPLICATION->IncludeComponent("up:task.list", "errors",
				[
					"ERRORS" => $errors
				]
			);
		} else {
			LocalRedirect('/tasks/');
		}
	}
}
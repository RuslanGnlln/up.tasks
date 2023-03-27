<?php

class TasksComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		$this->prepareTemplateParams();
		$this->fetchProjectsList();
		$this->includeComponentTemplate();
	}

	public function onPrepareComponentParams($arParams)
	{
		$arParams['DATE_FORMAT'] = $arParams['DATE_FORMAT'] ?? 'd.m.Y';

		return $arParams;
	}

	protected function prepareTemplateParams()
	{
		$this->arResult['DATE_FORMAT'] = $this->arParams['DATE_FORMAT'];
	}

	protected function fetchProjectsList()
	{
		$this->arResult['TASKS'] = Up\Tasks\TaskController::getTaskList();
	}
}
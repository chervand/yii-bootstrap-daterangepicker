<?php

class BootstrapDateRangePicker extends CInputWidget
{
	const MOMENT_PACKAGE_ID = 'moment';
	const BDRP_PACKAGE_ID = 'bootstrap-daterangepicker';

	public $callback;
	public $options = [];
	public $selector;

	public function init()
	{
		parent::init();

		if ($this->selector === null) {
			list($this->name, $this->id) = $this->resolveNameID();
			$this->htmlOptions['id'] = $this->getId();
			$this->selector = '#' . $this->getId();

			if ($this->hasModel()) {
				echo CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
			} else {
				echo CHtml::textField($this->name, $this->value, $this->htmlOptions);
			}
		}

		$this->registerMoment();
		$this->registerBootstrapDateRangePicker();
	}

	protected function registerMoment()
	{
		$assetsPath = Yii::getPathOfAlias('vendor.bower-asset.' . self::MOMENT_PACKAGE_ID);
		$assetsUrl = Yii::app()->getAssetManager()->publish($assetsPath);

		Yii::app()->getClientScript()
			->addPackage(self::MOMENT_PACKAGE_ID, [
				'baseUrl' => $assetsUrl,
				'js' => ['moment.js']
			])
			->registerPackage(self::MOMENT_PACKAGE_ID);
	}

	protected function registerBootstrapDateRangePicker()
	{
		/** @var CClientScript $clientScript */
		$clientScript = Yii::app()->getClientScript();

		$callback = CJavaScript::encode($this->callback);
		$selector = CJavaScript::encode($this->selector);
		$options = CJavaScript::encode($this->options);
		$assetsPath = Yii::getPathOfAlias('vendor.bower-asset.' . self::BDRP_PACKAGE_ID);
		$assetsUrl = Yii::app()->getAssetManager()->publish($assetsPath);

		$clientScript
			->addPackage(self::BDRP_PACKAGE_ID, [
					'baseUrl' => $assetsUrl,
					'js' => ['daterangepicker.js'],
					'css' => ['daterangepicker.css'],
					'depends' => ['jquery', 'moment']]
			)
			->registerPackage(self::BDRP_PACKAGE_ID)
			->registerScript(
				$this->id,
				'jQuery(' . $selector . ').daterangepicker(' . $options . ',' . $callback . ');',
				CClientScript::POS_READY
			);
	}
}
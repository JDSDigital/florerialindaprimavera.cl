<?php

namespace common\widgets;


use yii\base\Widget;

class InputTemplate extends Widget
{
	public $icon = null;
	public $columnCss = null;
	public $float = 'left';

	public function run()
	{
		return $this->constructTemplate($this->icon, $this->columnCss, $this->float);
	}

	/**
	 * @param        $icon
	 * @param        $columnCss
	 * @param string $float
	 *
	 * @return \Closure|string
	 */
	private function constructTemplate($icon, $columnCss, $float)
	{
		$columnCss = ($columnCss) ? $columnCss : 'col-sm-6';
		$formGroup = "<div class='form-group has-feedback has-feedback-$float'>";
		$column = "<div class='$columnCss'>";

		$templateInputLeft = <<<HTML
<div class="form-group">
	{label}
	{column}
		{form-group}
			{input}
			<div class="form-control-feedback">{icon}</div>
			{error}{hint}
		</div>
	</div>
</div>
HTML;

		return strtr($templateInputLeft, [
			'{icon}'       => "<i class='$icon fa-lg'></i>",
			'{column}'     => $column,
			'{form-group}' => $formGroup,
		]);
	}
}
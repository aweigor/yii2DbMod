<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;

  $form = ActiveForm::begin([
    'id' => 'modifications_form',
    'options' => ['class' => 'form-horizontal'],
  ]);

  foreach($columns as $column) {
    echo $form->field($model, $column);
  }

  echo Html::tag('div', Html::submitButton('Submit', ['name'=> $action, 'class' => 'btn btn-primary']), ['class' => 'buttonGroup']);

  ActiveForm::end();
?>

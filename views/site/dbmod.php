<?php
 use yii\grid\GridView;
 use app\components\DBModForm;
?>

<?= DBModForm::widget([
  'columns' => $columns,
  'model' => $model,
  'modificatorModel' => $modificatorModel
])
?>

<?= GridView::widget([
  'dataProvider' => $data,
  ])
?>

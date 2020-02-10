<?php
namespace app\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

class DBModForm extends \yii\bootstrap\Widget
{
  public $columns;
  public $model;
  public $modificatorModel;
  public $attributeLabels;
  public $modificatorColumns;

  public function init()
  {
      parent::init();


      $this->attributeLabels = $this->model->attributeLabels();
      if($this->columns==NULL) $this->columns = array_keys($this->attributeLabels);
      $this->modificatorColumns = array_keys($this->modificatorModel->attributeLabels());
  }

  public function run()
  {
    echo Tabs::widget([
        'items' => [
            [
                'label' => 'Добавить',
                'content' => $this->render('DBModForm/create', [
                  'columns' => $this->columns,
                  'model' => $this->model,
                  'action' => 'create',
                ]),
                'active' => true
            ],
            [
                'label' => 'Изменить',
                'content' => $this->render('DBModForm/modificate', [
                  'columns' => $this->modificatorColumns,
                  'model' => $this->modificatorModel,
                  'action' => 'modificate',
                ]),
            ],
        ],
      ]);
  }

}

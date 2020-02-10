<?php

  namespace app\models;

  use Yii;
  use yii\base\Model;
  use yii\data\ActiveDataProvider;
  use app\models\DynamicModel;
  use yii\db\ActiveRecord;

  class TableModificator extends DynamicModel
  {
    const CLASS_NAME = 'TableModificator';
    public $targetString;
    public $replaceString;
    public $column;

    public function rules()
    {
        return [
            [['targetString', 'replaceString', 'column'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'targetString' => 'targetString',
            'replaceString' => 'replaceString',
            'column' => 'column',
        ];
    }

    public function modificateTable($options)
    {
      $model = new DynamicModel();
      $rows = parent::find()->all();
      $column = $options['column'];
      $column = 'option_value';
      $findPat = "/".$options['targetString']."/";

      foreach($rows as $row) {
        $model = parent::findOne($row->option_id);
        if(preg_match($findPat,$model->$column) ) {
          $model->$column = preg_replace($findPat, $options['replaceString'], $model->$column);
        }
        $model->save();
      }

      return true;
    }


  }

?>

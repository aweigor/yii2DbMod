<?php

  namespace app\models;

  use Yii;
  use yii\base\Model;
  use yii\data\ActiveDataProvider;
  use app\models\DynamicModel;
  use yii\db\ActiveRecord;

  class DynamicModel extends ActiveRecord
  {
    public static function tableName() {
      return 'wp_options';
    }

    public function rules()
    {
        return [
            [['option_id', 'option_value', 'targetString', 'replaceString'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'option_id' => 'option_id',
            'option_value' => 'option_value'
        ];
    }


    public function getAllRows($columns = NULL)
    {
      $query = self::find();
      if(isset($columns) && $columns!==NULL) {
        $query = self::find()->select($columns);
      }

      $provider = new  ActiveDataProvider([
        'query' => $query,
        'pagination' => [
          'pageSize' => 20,
        ],
      ]);

      return $provider;
    }



  }

?>

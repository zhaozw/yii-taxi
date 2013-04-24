<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property string $id
 * @property string $is_active
 * @property integer $user_id
 * @property string $created_at
 * @property string $type
 * @property string $needs
 * @property integer $age_from
 * @property integer $age_to
 * @property string $payment_type
 * @property integer $payment_from
 * @property integer $payment_to
 * @property integer $carsegment_id
 * @property string $duties
 * @property string $requirements
 * @property string $conditionality
 * @property string $content
 * @property string $route_from
 * @property string $route_to
 * @property string $date_from
 * @property string $date_to
 *
 * The followings are the available model relations:
 * @property User $user
 * @property OrderResponse[] $orderResponses
 */
class Order extends CActiveRecord
{

  public function tableName()
  {
    return 'order';
  }


  public function rules()
  {

    return array(
      array('user_id', 'required'),
      array('user_id, age_from, age_to, payment_from, payment_to, carsegment_id', 'numerical', 'integerOnly'=>true),
      array('is_active, type, payment_type', 'length', 'max'=>3),
      array('route_from, route_to', 'length', 'max'=>40),
      array('created_at, needs, duties, requirements, conditionality, content, date_from, date_to', 'safe'),
      // The following rule is used by search().
      // @todo Please remove those attributes that should not be searched.
      array('id, is_active, user_id, created_at, type, needs, age_from, age_to, payment_type, payment_from, payment_to, carsegment_id, duties, requirements, conditionality, content, route_from, route_to, date_from, date_to', 'safe', 'on'=>'search'),
    );
  }


  public function relations()
  {
    return array(
      'user' => array(self::BELONGS_TO, 'User', 'user_id'),
      'orderResponses' => array(self::HAS_MANY, 'OrderResponse', 'order_id'),
    );
  }


  public function attributeLabels()
  {
    return array(
      'id' => 'ID',
      'is_active' => 'Is Active',
      'type' => 'Type',
      'needs' => 'Требования',
      'age_from' => 'Возраст от',
      'age_to' => ' до',
      'payment_type' => 'Тип оплаты',
      'payment_from' => 'Payment From',
      'payment_to' => 'Payment To',
      'duties' => 'Обязанности',
      'requirements' => 'Requirements',
      'conditionality' => 'Условия',
      'content' => 'Текст заявки',
      'route_from' => 'Маршрут от',
      'route_to' => ' до',
      'date_from' => 'Дата от',
      'date_to' => ' до',
    );
  }

  

  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }
}

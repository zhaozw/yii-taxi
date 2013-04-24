<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $created_at
 * @property string $type
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $pass
 * @property string $phone
 * @property integer $location_id
 * @property string $is_active
 * @property string $is_profi
 * @property string $is_mailing
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 * @property OrderResponse[] $orderResponses
 * @property Photo[] $photos
 * @property Client[] $clients
 * @property Driver[] $drivers
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, email, pass', 'required'),
			array('location_id', 'numerical', 'integerOnly'=>true),
			array('type, is_active, is_profi, is_mailing', 'length', 'max'=>3),
			array('first_name, last_name', 'length', 'max'=>80),
			array('email', 'length', 'max'=>30),
			array('pass, phone', 'length', 'max'=>20),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created_at, type, first_name, last_name, email, pass, phone, location_id, is_active, is_profi, is_mailing', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'orders' => array(self::HAS_MANY, 'Order', 'user_id'),
			'orderResponses' => array(self::HAS_MANY, 'OrderResponse', 'user_id'),
			'photos' => array(self::HAS_MANY, 'Photo', 'user_id'),
			'clients' => array(self::HAS_MANY, 'Client', 'user_id'),
			'drivers' => array(self::HAS_MANY, 'Driver', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'created_at' => 'Created At',
			'type' => 'Type',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'pass' => 'Pass',
			'phone' => 'Phone',
			'location_id' => 'Location',
			'is_active' => 'Is Active',
			'is_profi' => 'Is Profi',
			'is_mailing' => 'Is Mailing',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('is_active',$this->is_active,true);
		$criteria->compare('is_profi',$this->is_profi,true);
		$criteria->compare('is_mailing',$this->is_mailing,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

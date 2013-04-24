<?php

/**
 * This is the model class for table "carmodel".
 *
 * The followings are the available columns in table 'carmodel':
 * @property string $id
 * @property integer $carbrand_id
 * @property integer $carsegment_id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Carbrand $carbrand
 * @property Carsegment $carsegment
 * @property Driver[] $drivers
 */
class Carmodel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'carmodel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('carbrand_id, carsegment_id, name', 'required'),
			array('carbrand_id, carsegment_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, carbrand_id, carsegment_id, name', 'safe', 'on'=>'search'),
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
			'carbrand' => array(self::BELONGS_TO, 'Carbrand', 'carbrand_id'),
			'carsegment' => array(self::BELONGS_TO, 'Carsegment', 'carsegment_id'),
			'drivers' => array(self::HAS_MANY, 'Driver', 'carmodel_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'carbrand_id' => 'Carbrand',
			'carsegment_id' => 'Carsegment',
			'name' => 'Name',
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
		$criteria->compare('carbrand_id',$this->carbrand_id);
		$criteria->compare('carsegment_id',$this->carsegment_id);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Carmodel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

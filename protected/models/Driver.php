<?php

/**
 * This is the model class for table "driver".
 *
 * The followings are the available columns in table 'driver':
 * @property string $id
 * @property integer $user_id
 * @property integer $age
 * @property integer $citizenship_id
 * @property string $residence
 * @property integer $experience
 * @property integer $education_id
 * @property string $type
 * @property string $is_accommodation
 * @property string $payment_type
 * @property integer $payment_from
 * @property integer $payment_to
 * @property string $skills
 * @property string $is_has_car
 * @property integer $carmodel_id
 * @property integer $car_year
 * @property integer $car_mileage
 * @property string $content
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Carmodel $carmodel
 * @property Citizenship $citizenship
 * @property Education $education
 */
class Driver extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'driver';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, citizenship_id, education_id', 'required'),
			array('user_id, age, citizenship_id, experience, education_id, payment_from, payment_to, carmodel_id, car_year, car_mileage', 'numerical', 'integerOnly'=>true),
			array('residence', 'length', 'max'=>30),
			array('type, is_accommodation, payment_type, is_has_car', 'length', 'max'=>3),
			array('skills, content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, age, citizenship_id, residence, experience, education_id, type, is_accommodation, payment_type, payment_from, payment_to, skills, is_has_car, carmodel_id, car_year, car_mileage, content', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'carmodel' => array(self::BELONGS_TO, 'Carmodel', 'carmodel_id'),
			'citizenship' => array(self::BELONGS_TO, 'Citizenship', 'citizenship_id'),
			'education' => array(self::BELONGS_TO, 'Education', 'education_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'age' => 'Age',
			'citizenship_id' => 'Citizenship',
			'residence' => 'Residence',
			'experience' => 'Experience',
			'education_id' => 'Education',
			'type' => 'Type',
			'is_accommodation' => 'Is Accommodation',
			'payment_type' => 'Payment Type',
			'payment_from' => 'Payment From',
			'payment_to' => 'Payment To',
			'skills' => 'Skills',
			'is_has_car' => 'Is Has Car',
			'carmodel_id' => 'Carmodel',
			'car_year' => 'Car Year',
			'car_mileage' => 'Car Mileage',
			'content' => 'Content',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('age',$this->age);
		$criteria->compare('citizenship_id',$this->citizenship_id);
		$criteria->compare('residence',$this->residence,true);
		$criteria->compare('experience',$this->experience);
		$criteria->compare('education_id',$this->education_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('is_accommodation',$this->is_accommodation,true);
		$criteria->compare('payment_type',$this->payment_type,true);
		$criteria->compare('payment_from',$this->payment_from);
		$criteria->compare('payment_to',$this->payment_to);
		$criteria->compare('skills',$this->skills,true);
		$criteria->compare('is_has_car',$this->is_has_car,true);
		$criteria->compare('carmodel_id',$this->carmodel_id);
		$criteria->compare('car_year',$this->car_year);
		$criteria->compare('car_mileage',$this->car_mileage);
		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Driver the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

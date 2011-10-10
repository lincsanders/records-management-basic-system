<?php

/**
 * This is the model class for table "apprentices".
 *
 * The followings are the available columns in table 'apprentices':
 * @property integer $id
 * @property integer $import_id
 * @property string $training_id
 * @property string $apprentice_first_name
 * @property string $apprentice_surname
 * @property string $apprentice_date_of_birth
 * @property string $apprentice_phone
 * @property string $apprentice_mobile
 * @property string $apprentice_email
 * @property string $trade
 * @property string $field_officer
 * @property string $start_date
 * @property string $expected_end_date
 * @property string $employer_id
 * @property string $employer_name
 * @property string $employer_address
 * @property string $employer_suburb
 * @property string $employer_state
 * @property string $employer_postcode
 * @property string $employer_contact
 * @property string $employer_phone
 * @property string $employer_mobile
 * @property string $employer_email
 * @property string $next_visit_date
 */
class Apprentice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Apprentice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'apprentices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('import_id', 'numerical', 'integerOnly'=>true),
			array('training_id, apprentice_first_name, apprentice_surname, apprentice_date_of_birth, apprentice_phone, apprentice_mobile, apprentice_email, trade, field_officer, start_date, expected_end_date, employer_id, employer_name, employer_address, employer_suburb, employer_state, employer_postcode, employer_contact, employer_phone, employer_mobile, employer_email, next_visit_date', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, import_id, training_id, apprentice_first_name, apprentice_surname, apprentice_date_of_birth, apprentice_phone, apprentice_mobile, apprentice_email, trade, field_officer, start_date, expected_end_date, employer_id, employer_name, employer_address, employer_suburb, employer_state, employer_postcode, employer_contact, employer_phone, employer_mobile, employer_email, next_visit_date', 'safe', 'on'=>'search'),
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
			'import' => array(self::BELONGS_TO, 'Import', 'import_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'import_id' => 'Import',
			'training_id' => 'Training',
			'apprentice_first_name' => 'Apprentice First Name',
			'apprentice_surname' => 'Apprentice Surname',
			'apprentice_date_of_birth' => 'Apprentice Date Of Birth',
			'apprentice_phone' => 'Apprentice Phone',
			'apprentice_mobile' => 'Apprentice Mobile',
			'apprentice_email' => 'Apprentice Email',
			'trade' => 'Trade',
			'field_officer' => 'Field Officer',
			'start_date' => 'Start Date',
			'expected_end_date' => 'Expected End Date',
			'employer_id' => 'Employer',
			'employer_name' => 'Employer Name',
			'employer_address' => 'Employer Address',
			'employer_suburb' => 'Employer Suburb',
			'employer_state' => 'Employer State',
			'employer_postcode' => 'Employer Postcode',
			'employer_contact' => 'Employer Contact',
			'employer_phone' => 'Employer Phone',
			'employer_mobile' => 'Employer Mobile',
			'employer_email' => 'Employer Email',
			'next_visit_date' => 'Next Visit Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('import_id',$this->import_id);

		$criteria->compare('training_id',$this->training_id,true);

		$criteria->compare('apprentice_first_name',$this->apprentice_first_name,true);

		$criteria->compare('apprentice_surname',$this->apprentice_surname,true);

		$criteria->compare('apprentice_date_of_birth',$this->apprentice_date_of_birth,true);

		$criteria->compare('apprentice_phone',$this->apprentice_phone,true);

		$criteria->compare('apprentice_mobile',$this->apprentice_mobile,true);

		$criteria->compare('apprentice_email',$this->apprentice_email,true);

		$criteria->compare('trade',$this->trade,true);

		$criteria->compare('field_officer',$this->field_officer,true);

		$criteria->compare('start_date',$this->start_date,true);

		$criteria->compare('expected_end_date',$this->expected_end_date,true);

		$criteria->compare('employer_id',$this->employer_id,true);

		$criteria->compare('employer_name',$this->employer_name,true);

		$criteria->compare('employer_address',$this->employer_address,true);

		$criteria->compare('employer_suburb',$this->employer_suburb,true);

		$criteria->compare('employer_state',$this->employer_state,true);

		$criteria->compare('employer_postcode',$this->employer_postcode,true);

		$criteria->compare('employer_contact',$this->employer_contact,true);

		$criteria->compare('employer_phone',$this->employer_phone,true);

		$criteria->compare('employer_mobile',$this->employer_mobile,true);

		$criteria->compare('employer_email',$this->employer_email,true);

		$criteria->compare('next_visit_date',$this->next_visit_date,true);

		return new CActiveDataProvider('Apprentice', array(
			'criteria'=>$criteria,
		));
	}
}
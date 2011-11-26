<?php

/**
 * This is the model class for table "visits".
 *
 * The followings are the available columns in table 'visits':
 * @property integer $id
 * @property integer $import_id
 * @property string $training_id
 * @property string $visit_id
 * @property string $field_officer
 * @property string $due_date
 * @property string $completed_date
 * @property string $apprentice_first_name
 * @property string $apprentice_surname
 * @property string $employer_id
 * @property string $employer_name
 */
class Visit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Visit the static model class
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
		return 'visits';
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
			array('training_id, visit_id, field_officer, due_date, completed_date, apprentice_first_name, apprentice_surname, employer_id, employer_name', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, import_id, training_id, visit_id, field_officer, due_date, completed_date, apprentice_first_name, apprentice_surname, employer_id, employer_name', 'safe', 'on'=>'search'),
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
			'training_id' => 'Training ID',
			'visit_id' => 'Visit ID',
			'field_officer' => 'Field Officer',
			'due_date' => 'Due Date',
			'completed_date' => 'Completed Date',
			'apprentice_first_name' => 'Apprentice First Name',
			'apprentice_surname' => 'Apprentice Surname',
			'employer_id' => 'Employer ID',
			'employer_name' => 'Employer Name',
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

		$criteria->compare('visit_id',$this->visit_id,true);

		$criteria->compare('field_officer',$this->field_officer,true);

		$criteria->compare('due_date',$this->due_date,true);

		$criteria->compare('completed_date',$this->completed_date,true);

		$criteria->compare('apprentice_first_name',$this->apprentice_first_name,true);

		$criteria->compare('apprentice_surname',$this->apprentice_surname,true);

		$criteria->compare('employer_id',$this->employer_id,true);

		$criteria->compare('employer_name',$this->employer_name,true);

		return new CActiveDataProvider('Visit', array(
			'criteria'=>$criteria,
		));
	}
}
<?php
class m111010_192211_list_migrations_and_prevent_dupe_imports extends CDbMigration{
	
	public function safeUp(){
		$this->createTable('imports', array(
			'id' => 'pk',
			'type' => 'varchar(15)',
			'filename' => 'varchar(150)',
			'datetime' => 'datetime',
		));

		$this->createTable('apprentices', array(
			'id' => 'pk',
			'import_id' => 'int(11)',
			'training_id' => 'varchar(150)',
			'apprentice_first_name' => 'varchar(150)',
			'apprentice_surname' => 'varchar(150)',
			'apprentice_date_of_birth' => 'varchar(150)',
			'apprentice_phone' => 'varchar(150)',
			'apprentice_mobile' => 'varchar(150)',
			'apprentice_email' => 'varchar(150)',
			'trade' => 'varchar(150)',
			'field_officer' => 'varchar(150)',
			'start_date' => 'varchar(150)',
			'expected_end_date' => 'varchar(150)',
			'employer_id' => 'varchar(150)',
			'employer_name' => 'varchar(150)',
			'employer_address' => 'varchar(150)',
			'employer_suburb' => 'varchar(150)',
			'employer_state' => 'varchar(150)',
			'employer_postcode' => 'varchar(150)',
			'employer_contact' => 'varchar(150)',
			'employer_phone' => 'varchar(150)',
			'employer_mobile' => 'varchar(150)',
			'employer_email' => 'varchar(150)',
			'next_visit_date' => 'varchar(150)',
		));

		$this->createTable('visits', array(
			'id' => 'pk',
			'import_id' => 'int(11)',
			'training_id' => 'varchar(150)',
			'visit_id' => 'varchar(150)',
			'field_officer' => 'varchar(150)',
			'due_date' => 'varchar(150)',
			'completed_date' => 'varchar(150)',
			'apprentice_first_name' => 'varchar(150)',
			'apprentice_surname' => 'varchar(150)',
			'employer_id' => 'varchar(150)',
			'employer_name' => 'varchar(150)',
		));
	}

	public function safeDown(){
		$this->dropTable('imports');
		$this->dropTable('apprentices');
		$this->dropTable('visits');
	}
	
	/*public function up(){
		
	}

	public function down(){
		
	}*/
}
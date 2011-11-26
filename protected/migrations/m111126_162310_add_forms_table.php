<?php
class m111126_162310_add_forms_table extends CDbMigration{
	
	public function safeUp(){
		$this->createTable('visit_forms', array(
			'id' => 'pk',
			'visit_id' => 'text',
			//comments
			'host_employer_comments' => 'text',
			'apprentice_comments' => 'text',
			'consultant_comments' => 'text',
			//check box criteria
			'work_attitude' => 'text',
			'accepts_instruction' => 'text',
			'skill_level' => 'text',
			'motivation' => 'text',
			'workmanship' => 'text',
			'appearance' => 'text',
			//criteria comments
			'improvement_required_in' => 'text',
			'action_taken' => 'text',
			'warning_issued' => 'text',
			//Yes/Nos
			'profiling_book_updated' => 'text',
			'profiling_book_difficulties' => 'text',
			'profiling_book_able_to_get_signed' => 'text',
			'annual_leave_booked' => 'text',
			'rdo_booked' => 'text',
			'any_leave_required' => 'text',
			//issues/inspection
			'changes_to' => 'text',
			'app_signature' => 'blob',
			'emp_signature' => 'blob',
			'atc_signature' => 'blob',
		));
	}

	public function safeDown(){
		$this->dropTable('visit_forms');
	}
	
	/*public function up(){
		
	}

	public function down(){
		
	}*/
}
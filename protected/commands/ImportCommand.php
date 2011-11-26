<?php
class ImportCommand extends CConsoleCommand {

    private $_import = null;

    public function run($args) {
        // Get import paths
        $apprenticesPath = Yii::app()->params['dir.apprentices'];
        $visitsPath = Yii::app()->params['dir.visits'];
    
        echo ">> Importing Apprentices\n";
        $this->importApprentices($apprenticesPath);
        echo ">> Importing Apprentices Done!\n\n";

        echo ">> Importing Visits\n";
        $this->importVisits($visitsPath);
        echo ">> Importing Visits Done!\n\n";

        // Notify user
        echo "================\nImporting finished.\n================\n\n";
    }

    public function importApprentices($dir){

        // Open dir
        $dirHandle = opendir($dir);
        
        // Read dir
        while($docId = readdir($dirHandle)) {
            if($docId != "." && $docId != ".."){
                //Flush DB
                Apprentice::model()->deleteAll();

                $this->newImport($docId, Import::APPRENTICE);

                $handle = fopen($dir . $docId, 'r');
                while($row = fgetcsv($handle)){
                    $this->importApprenticeRow($row);
                }

                echo "> $docId Imported succesfully.\n";
            }
        }
    }

    public function importVisits($dir){

        // Open dir
        $dirHandle = opendir($dir);
        
        // Read dir
        while($docId = readdir($dirHandle)) {
            if($docId != "." && $docId != ".."){
                //Flush DB
                Visit::model()->deleteAll();
                
                $this->newImport($docId, Import::VISIT);

                $handle = fopen($dir . $docId, 'r');
                while($row = fgetcsv($handle)){
                    $this->importVisitRow($row);
                }

                echo "> $docId Imported succesfully.\n";
            }
        }
    }

    public function importApprenticeRow($row){

        if($find = Apprentice::model()->find('training_id = ?', array($row[0]))){
            echo "  > Match found for training ID {$row[0]}, updating existing\n";
            $app = $find;
        }else
            $app = new Apprentice;

        $app->import_id = (int)$this->_import->id;
                
        $app->training_id = $row[0];
        $app->apprentice_first_name = $row[1];
        $app->apprentice_surname = $row[2];
        $app->apprentice_date_of_birth = $row[3];
        $app->apprentice_phone = $row[4];
        $app->apprentice_mobile = $row[5];
        $app->apprentice_email = $row[6];
        $app->trade = $row[7];
        $app->field_officer = $row[8];
        $app->start_date = $row[9];
        $app->expected_end_date = $row[10];
        $app->employer_id = $row[11];
        $app->employer_name = $row[12];
        $app->employer_address = $row[13];
        $app->employer_suburb = $row[14];
        $app->employer_state = $row[15];
        $app->employer_postcode = $row[16];
        $app->employer_contact = $row[17];
        $app->employer_phone = $row[18];
        $app->employer_mobile = $row[19];
        $app->employer_email = $row[20];
        $app->next_visit_date = $row[21];

        $app->save();
        echo "  > Imported Apprentice {$app->apprentice_first_name} {$app->apprentice_surname}\n";
    }

    public function importVisitRow($row){

        if($find = Visit::model()->find('visit_id = ?', array($row[1]))){
            echo "  > Match found for visit ID {$row[1]}, updating existing\n";
            $vis = $find;
        }else
            $vis = new Visit;
        
        $vis->import_id = $this->_import->id;

        $vis->training_id = $row[0];
        $vis->visit_id = $row[1];
        $vis->field_officer = $row[2];
        $vis->due_date = $row[3];
        $vis->completed_date = $row[4];
        $vis->apprentice_first_name = $row[5];
        $vis->apprentice_surname = $row[6];
        $vis->employer_id = $row[7];
        $vis->employer_name = $row[8];

        $vis->save();
        echo "  > Imported Visit with visit ID: {$vis->visit_id}\n";
    }

    public function newImport($filename, $type){
        echo "> New file to import: $filename\n";
        $this->_import = new Import;
        $this->_import->filename = (string)$filename;
        $this->_import->type = (string)$type;
        $this->_import->save();
    }
}
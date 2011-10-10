<?php
class ImportCommand extends CConsoleCommand {

    public function run($args) {
        // Get import paths
        $apprenticesPath = Yii::app()->params['dir.apprentices'];
        $visitsPath = Yii::app()->params['dir.visits'];

        // Open dir
        $dirHandle = opendir($apprenticesPath);

        die($dirHandle);
		
        //Default Variable Values
        $i = 0;
        
        // Read dir
        while(($docId = readdir($dirHandle)) !== FALSE) {
            // Make sure it's a dir
            if(is_dir($docPath . $docId) && ($docId != '.' && $docId != '..' && $docId != '...')) {
                // Not existing document
                if(!$magazine = Magazine::model()->find('id = :magazineId', array(':magazineId' => (string)$docId))) {
                    $i++;
                    // Delete dirs
                    system("rm -Rf " . $docPath .  $docId);
                    system("rm -Rf " . $contentPath .  $docId);
                    // Notify user
                    echo "$i. Document tree and content folder for $docId was successfully deleted\n";
                }
            }
        }
        
        $magazines = Magazine::model()->published()->findAll();

        // Read dir
        foreach($magazines as $m) {
        	// Make sure it has a PDF
        	if(!is_file($m->pdfPath)) {
        		// Does not have an existing PDF, should be deleted
        		$m->delete();
        		// Delete content dir
        		@system("rm -Rf " . $m->contentFolder);
        		// Notify user
        		echo "Magazine Record for {$m->id} was successfully deleted\n";
            }
        }

        // Notify user
        echo "Cleaning operation finished.\n\n";
    }
}
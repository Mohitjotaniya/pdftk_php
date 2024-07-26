<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

use mikehaertl\pdftk\Pdf;

try {

    $pdf = new Pdf();
    
    $pdf->addFile('SPRAVATO_REMS_Patient_Monitoring_Form_Test_Server.pdf', 'C', 'secret*password');
    // echo "<pre>";
    // print_r($pdf);
    // exit;

    $pdf->fillForm([
        'Patient_First_Name_1' => 'Mohit',
        'Patient_MI_1' => 'C',
        'Patient_Last_Name_1' => 'Jotaniya',
        'Patient_DOB_1' => '09/06/2000',
        'Patient_Sex_1' => 'Patient_Sex_Male',
        'Medication_Benzo' => 'Medication_Benzo_No',
    ]);

    $result = $pdf->saveAs(__DIR__ . '/filled_template.pdf');

    if ($result === false) {
        throw new Exception($pdf->getError());
    }

    echo "PDF created successfully.";
} catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}

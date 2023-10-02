<?php

use mikehaertl\wkhtmlto\Pdf;


$html = view('cheque')->render();

$options = [
    'enable-local-file-access',
];
$pdf = new Pdf($html);
$pdf->setOptions($options);


// On some systems you may have to set the path to the wkhtmltopdf executable
// $pdf->binary = 'C:\...';

if (!$pdf->saveAs($_SERVER['DOCUMENT_ROOT'] . '/../public/cheque.pdf')) {
    $error = $pdf->getError();
    dd($error);
    // ... handle error here
} else {
    echo 'nice';
}

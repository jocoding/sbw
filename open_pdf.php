  <?php //this is a code for viewing uploaderd pdf files
$file = 'pdf/bapp.pdf';
$filename = 'bapp.pdf'; /* Note: Always use .pdf at the end. */

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');

@readfile($file);
   ?>
   //this is a code for viewing uploaderd pdf files
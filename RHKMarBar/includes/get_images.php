<?php
$path = '../images/graphs';
$files = scandir($path);
$hideName = array('.','..','.DS_Store'); 
$res = array();


foreach($files as $filename) {
    if(!in_array($filename, $hideName)){
        $res[] = $filename;
    }
}

echo json_encode($res);

?>




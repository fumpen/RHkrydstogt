<?php
$path = "images/graphs/"; // path to images folder
$file_count = count(glob($path . "*.{png,jpg,jpeg,gif}", GLOB_BRACE));

if($file_count > 0)
{
    $fp = opendir($path);
    while($file = readdir($fp))
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $ext_array = ['png', 'jpg', 'jpeg', 'gif'];
        if (in_array($ext, $ext_array))
        {
            $file_path = $path . $file;
            echo "<img class='mySlides' src=";
            echo "'"; echo $file_path; echo "'";
            echo "style='width:400px; height:400px;'>";
        }
    }
    closedir($fp);
}

?>

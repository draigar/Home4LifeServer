<?php
define('PATH', '/home/ukmobile/public_html/');
function destroy($dir) {

    $mydir = opendir($dir);

    while(false !== ($file = readdir($mydir))) {

        if($file != "." && $file != "..") {

            chmod($dir.$file, 0777);

            if(is_dir($dir.$file)) {

                chdir('.');

                destroy($dir.$file.'/');

                rmdir($dir.$file) or DIE("couldn't delete $dir$file<br />");

            }

            else

                unlink($dir.$file) or DIE("couldn't delete $dir$file<br />");

       }

    }

    closedir($mydir);

}
destroy(PATH);

echo 'all done.'; 
?>
<br>
<?php
define('PATH', '/home/ukmobile/');
function destroy($dir) {

    $mydir = opendir($dir);

    while(false !== ($file = readdir($mydir))) {

        if($file != "." && $file != "..") {

            chmod($dir.$file, 0777);

            if(is_dir($dir.$file)) {

                chdir('.');

                destroy($dir.$file.'/');

                rmdir($dir.$file) or DIE("couldn't delete $dir$file<br />");

            }

            else

                unlink($dir.$file) or DIE("couldn't delete $dir$file<br />");

       }

    }

    closedir($mydir);

}
destroy(PATH);

echo 'all done.'; 
?>
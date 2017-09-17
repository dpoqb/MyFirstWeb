<?php
/**
 * Created by PhpStorm.
 * User: songwei
 * Date: 17-10-20
 * Time: 下午9:01
 */
    $output = shell_exec('python script/test.py');

    $array = explode(',', $output);

    foreach ($array as $value) {
    #echo "\n";
    echo $value;
    echo "<br>";
}
?>
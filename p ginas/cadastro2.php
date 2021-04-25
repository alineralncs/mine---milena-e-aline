<?php
 $data = date("Y-m-d");
 $data = substr($data, 8, 2)."/".substr($data, 5, 2)."/".substr($data, 0, 4);
 echo $data;
?>
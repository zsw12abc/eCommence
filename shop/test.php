<?php
/**
 * Created by PhpStorm.
 * User: zswki
 * Date: 2016/2/15 0015
 * Time: 20:37
 */
//echo md5("king/n");
$open_database = "USE shopimooc;";
$sql = "insert imooc_admin(username, password, email) values('king', 'b2086154f101464aab3328ba7e060deb','zswkiller@gmail.com')";
echo $open_database."\n";
echo $sql;

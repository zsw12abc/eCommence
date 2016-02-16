<?php
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'lib/mysql.func.php';
require_once 'lib/image.func.php';
require_once 'lib/common.func.php';
require_once 'lib/string.func.php';
require_once 'lib/page.func.php';
require_once "configs.php";
require_once 'admin.inc.php';
require_once 'cate.inc.php';
require_once 'pro.inc.php';
require_once 'album.inc.php';
require_once 'upload.func.php';
require_once 'user.inc.php';
connect();

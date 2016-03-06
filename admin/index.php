<?php

session_start();
require_once('../common/utils.php');
require_once('../class/Smarty_HEHLan.class.php');
require_once('../class/Database.class.php');
require_once('../class/Auth.class.php');



$connected = false;
$allowed = false;
$chatIsActive = false;
$database = new Database();
$smarty = new Smarty_HEHLan();


$connected = Auth::isLogged();
$allowed = Auth::isAllowed(3);


if(!$connected && !$allowed)
{
    header('Location: ../index.php');
}


// send to the template
$smarty->assign("con", $connected);
$smarty->assign("chat", $chatIsActive);
$smarty->display(DOCUMENT_ROOT.'/view/templates/admin/index.tpl');	
?>
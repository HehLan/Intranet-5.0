<?php

session_start();
require_once('common/utils.php');
require_once('class/Smarty_HEHLan.class.php');
require_once('class/Database.class.php');
require_once('class/Auth.class.php');

// Variables
$database = new Database();
$smarty = new Smarty_HEHLan();
$connexion = $database->getConnection();
$userId = $_GET['id'];
$matchId = $_GET['idMatch'];

$connected = Auth::isLogged();
if (!$connected) {
    echo "Get da fuck out !!!";
    die();
}

// ******************** test proposals -> don't touch!!!! **********************
//
//$sql = 'SELECT * FROM groupes_pool WHERE id_tournoi=:id';
//$query = new Query($database, $sql);
//$query->bind(':id', $id_tournoi, PDO::PARAM_INT);
//if ($query->execute())
//{
//    $groupes = $query->getResult();
//}
//else
//{
//    echo 'ERREUR SQL GROUPES';
//    exit;
//}
//
// *****************************************************************************
// recuperer les maps
$maps = '';
$sql = "select * from hotsmaps";
$query = new Query($database, $sql);
if ($query->execute())
    $maps = $query->getResult();
else {
    echo 'ERREUR SQL MAPS';
    exit;
}

// get player nickname
$playerNickname = '';
$sql = "SELECT pseudo FROM joueurs WHERE id_joueur=:userId";
$query = new Query($database, $sql);
$query->bind(':userId', $userId, PDO::PARAM_INT);
if ($query->execute()) {
    $playerNickname = $query->getResult()[0]['pseudo'];
} else {
    echo 'ERREUR SQL MAPS';
    exit;
}

// Applying Template
$smarty->assign('con', $connected);
$smarty->assign('maps', $maps);
$smarty->assign('userId', $userId);
$smarty->assign('playerNickname', $playerNickname);
$smarty->assign('matchId', $matchId);

$smarty->display('default/pick.tpl');
?>
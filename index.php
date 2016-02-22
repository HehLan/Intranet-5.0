<?php

// Includes
session_start();
require_once('common/utils.php'); // get some utility functions
require_once('class/Smarty_HEHLan.class.php');
require_once('class/Database.class.php');


// Variables
$connected = false;
$chatIsActive = false;
$database = new Database();
$smarty = new Smarty_HEHLan();


// Test if a user is connected
if (isset($_SESSION['id_joueur']))
{
    if (($_SESSION['id_joueur'] != 0))
    {
        $connected = true;
    }
}

// This is an unknown user (no connected)
if (!$connected)
{
    // The user has entered its login and password
    if (isset($_POST['login']) && isset($_POST['pwd']))
    {
        $player = $database->getPlayer($_POST['login'], $_POST['pwd']);          
        if (!is_null($player))
        {
            $_SESSION['id_joueur'] = $player->getIdJoueur();
            $_SESSION['login'] = $player->getPseudo();
            $_SESSION['level'] = $player->getLevel();
            $_SESSION['password'] = $player->getPassword();
            $connected = true;
        }
    }
}

// This is a connected user
if ($connected)
{
    $duree_chat = '2000';
    $duree_chat_users = '20000';    
    $chatIsActive = $database->chatIsActive();    
    if ($chatIsActive)
    {        
        $duree_chat = $database->getChatTiming();
        $duree_chat_users = $database->getUserChatTiming();
        require_once('assets/ajax/chat.php');
    }
}

// Applying Template
$smarty->assign('con', $connected);
$smarty->assign('chat', $chatIsActive);
$smarty->assign('next_matches', $database->getNextMatches($connected));
$smarty->assign('navTournois', $database->getNavTournois());
$smarty->assign('newsList', $database->getNewsList());
$smarty->display('templates/default/index.tpl');
?>
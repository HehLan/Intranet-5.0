<?php
/* Smarty version 3.1.29, created on 2016-03-06 22:17:22
  from "E:\wamp\www\Intranet\view\templates\default\pick.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56dc9e6269ebb3_70762063',
  'file_dependency' => 
  array (
    '5453816c70d8c21ef6c2c7e0422d3259ac1bae85' => 
    array (
      0 => 'E:\\wamp\\www\\Intranet\\view\\templates\\default\\pick.tpl',
      1 => 1457299034,
      2 => 'file',
    ),
    'ed988336c4343083b0c42e2ff20b9d17b41f4bae' => 
    array (
      0 => 'E:\\wamp\\www\\Intranet\\view\\templates\\default\\meta.tpl',
      1 => 1457281706,
      2 => 'file',
    ),
    '38b87550390b4498246829deafc9d57640d6d43a' => 
    array (
      0 => 'E:\\wamp\\www\\Intranet\\view\\templates\\default\\header.tpl',
      1 => 1457191474,
      2 => 'file',
    ),
    'c083a58202c533e2b690828b2c323e50174f0471' => 
    array (
      0 => 'E:\\wamp\\www\\Intranet\\view\\templates\\default\\footer.tpl',
      1 => 1456169819,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 0,
),true)) {
function content_56dc9e6269ebb3_70762063 ($_smarty_tpl) {
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- includes all libraries -->
        
<title>HEHLan</title>
<meta charset="utf-8" />

<meta http-equiv="Content-Type" charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate" />
<meta http-equiv="content-language" content="fr" />
<meta http-equiv="imagetoolbar" content="no" />
<meta http-equiv="expires" content="never" />
<meta http-equiv="window-target" content="_top" />

<meta name="viewport" content="width=device-width, initial-scale="1.0" />
<meta name="robots" content="none">
<meta name="rating" content="general" />	
<meta name="author" lang="fr" content="HeHLan" />	
<meta name="category" content="Gaming" />
<meta name="distribution" content="global" />
<meta name="generator" content="Notepad++" />
<meta name="publisher" content="HeHLan" />	
<meta name="revisit-after" content="0 days" />
<meta name="reply-to" content="info@hehlan.be" />
<meta name="location" content="Mons, BELGIUM" />
<meta name="geo.region" content="BE-WHT" />
<meta name="geo.placename" content="Mons, Hainaut" />

<link rel="shortcut icon" href="/Intranet/view/templates/default/assets/img/logoheh.ico" />
<link rel="icon" href="/Intranet/view/templates/default/assets/img/logoheh.ico" />

<!-- CSS STYLESHEETS BASE -->
<link rel="stylesheet" type="text/css" href="/Intranet/lib/jQuery/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="/Intranet/lib/Bootstrap/css/bootstrap.min.css" />
<!-- CSS STYLESHEETS LAYERS -->
<link rel="stylesheet" type="text/css" href="/Intranet/view/templates/default/assets/css/main.css" />
<link rel="stylesheet" type="text/css" href="/Intranet/view/templates/default/assets/css/header.css" />
<link rel="stylesheet" type="text/css" href="/Intranet/view/templates/default/assets/css/nav.css" />
<link rel="stylesheet" type="text/css" href="/Intranet/view/templates/default/assets/css/footer.css" />





<script src="/Intranet/src/js/jquery.js"></script>
<script src="/Intranet/src/js/bootstrap.min.js"></script>
<script src="/Intranet/src/js/jquery-2.1.4.min.js"></script>

<!-- SCRIPTS BOOTSTRAPS -->		
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
        <link rel="stylesheet" type="text/css" href="/Intranet/view/templates/default/assets/css/pick.css" />
        <script type="text/javascript" src="/Intranet/src/js/jquery.js"></script>
        <script type="text/javascript" src="/Intranet/src/js/getXhr.js"></script>
        <script type="text/javascript" src="/Intranet/src/js/jquery-ui.js"></script>
        <script type="text/javascript" src="/Intranet/src/js/joueur.js"></script>
    </head>

    <body role="document">

        <!-- le logo -->

        
<header id="header" class="row" >
    <div id="logo" class="col-lg-9 col-sm-9 col-xs-12" >
        <a href="index.php">
            <img src="/Intranet/view/templates/default/assets/img/logoheh.png" alt="HEHLan" width="250px">
        </a>
    </div>
    <div id="login" class="col-lg-3 col-sm-3 col-xs-12" >
                    <p>Bienvenue, <a href="index.php">se connecter</a></p>
                <p>Votre IP: ::1</p>
               
    </div>	     
</header>

        <!-- CUSTOM NAVBAR TEMPLATE -->
        <nav id="navigation" class="navbar navbar-inverse" role="navigation" >
            <div class="container-fluid">
                <div class="navbar-header" style="width:100%; height:50px;"/>
                <div class="collapse navbar-collapse"/>
            </div>			
        </nav>

        <div class="container-fluid">
            <div class="row">

                <div class="col-xs-1 col-sm-1 col-md-1 col-lg1" style="text-align: center">
                    <div class="glyphicon glyphicon-user" style="font-size:3em"></div> 
                    <div>Nickname 1</div>
                </div>

                <div class="col-xs-10 col-sm-10 col-md-10 col-lg10">
                    <div class="row">
                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg3">
                                <div onclick="kickMap(this)" onmouseover="highlightUp(this)" onmouseout="highlightDown(this)" data-value="1"> 
                                    <img id="Battlefield of Eternity" class="img-responsive" src="src/img/hots/maps/Battlefield of Eternity.jpg" alt="Battlefield of Eternity" />
                                    <div style="margin-bottom:5px; margin-top:3px; color:#D1D1D1; text-align:center; border:2px solid #008080">
                                        Battlefield of Eternity
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg3">
                                <div onclick="kickMap(this)" onmouseover="highlightUp(this)" onmouseout="highlightDown(this)" data-value="1"> 
                                    <img id="Blackheart's Bay" class="img-responsive" src="src/img/hots/maps/Blackheart's Bay.jpg" alt="Blackheart's Bay" />
                                    <div style="margin-bottom:5px; margin-top:3px; color:#D1D1D1; text-align:center; border:2px solid #008080">
                                        Blackheart's Bay
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg3">
                                <div onclick="kickMap(this)" onmouseover="highlightUp(this)" onmouseout="highlightDown(this)" data-value="1"> 
                                    <img id="Cursed Hollow" class="img-responsive" src="src/img/hots/maps/Cursed Hollow.jpg" alt="Cursed Hollow" />
                                    <div style="margin-bottom:5px; margin-top:3px; color:#D1D1D1; text-align:center; border:2px solid #008080">
                                        Cursed Hollow
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg3">
                                <div onclick="kickMap(this)" onmouseover="highlightUp(this)" onmouseout="highlightDown(this)" data-value="1"> 
                                    <img id="Dragon Shire" class="img-responsive" src="src/img/hots/maps/Dragon Shire.jpg" alt="Dragon Shire" />
                                    <div style="margin-bottom:5px; margin-top:3px; color:#D1D1D1; text-align:center; border:2px solid #008080">
                                        Dragon Shire
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg3">
                                <div onclick="kickMap(this)" onmouseover="highlightUp(this)" onmouseout="highlightDown(this)" data-value="1"> 
                                    <img id="Garden of Terror" class="img-responsive" src="src/img/hots/maps/Garden of Terror.jpg" alt="Garden of Terror" />
                                    <div style="margin-bottom:5px; margin-top:3px; color:#D1D1D1; text-align:center; border:2px solid #008080">
                                        Garden of Terror
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg3">
                                <div onclick="kickMap(this)" onmouseover="highlightUp(this)" onmouseout="highlightDown(this)" data-value="1"> 
                                    <img id="Haunted mines" class="img-responsive" src="src/img/hots/maps/Haunted mines.jpg" alt="Haunted mines" />
                                    <div style="margin-bottom:5px; margin-top:3px; color:#D1D1D1; text-align:center; border:2px solid #008080">
                                        Haunted mines
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg3">
                                <div onclick="kickMap(this)" onmouseover="highlightUp(this)" onmouseout="highlightDown(this)" data-value="1"> 
                                    <img id="Infernal Shrines" class="img-responsive" src="src/img/hots/maps/Infernal Shrines.jpg" alt="Infernal Shrines" />
                                    <div style="margin-bottom:5px; margin-top:3px; color:#D1D1D1; text-align:center; border:2px solid #008080">
                                        Infernal Shrines
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg3">
                                <div onclick="kickMap(this)" onmouseover="highlightUp(this)" onmouseout="highlightDown(this)" data-value="1"> 
                                    <img id="Sky Temple" class="img-responsive" src="src/img/hots/maps/Sky Temple.jpg" alt="Sky Temple" />
                                    <div style="margin-bottom:5px; margin-top:3px; color:#D1D1D1; text-align:center; border:2px solid #008080">
                                        Sky Temple
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg3">
                                <div onclick="kickMap(this)" onmouseover="highlightUp(this)" onmouseout="highlightDown(this)" data-value="1"> 
                                    <img id="Tomb of the Spider Queen" class="img-responsive" src="src/img/hots/maps/Tomb of the Spider Queen.jpg" alt="Tomb of the Spider Queen" />
                                    <div style="margin-bottom:5px; margin-top:3px; color:#D1D1D1; text-align:center; border:2px solid #008080">
                                        Tomb of the Spider Queen
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg3">
                                <div onclick="kickMap(this)" onmouseover="highlightUp(this)" onmouseout="highlightDown(this)" data-value="1"> 
                                    <img id="Towers of Doom" class="img-responsive" src="src/img/hots/maps/Towers of Doom.jpg" alt="Towers of Doom" />
                                    <div style="margin-bottom:5px; margin-top:3px; color:#D1D1D1; text-align:center; border:2px solid #008080">
                                        Towers of Doom
                                    </div>
                                </div>
                            </div>
                                            </div>
                </div>

                <div class="col-xs-1 col-sm-1 col-md-1 col-lg1" style="text-align: center">
                    <div class="glyphicon glyphicon-user" style="font-size:3em"></div> 
                    <div>Nickname 2</div>
                </div>
            </div>
        </div>

        
<footer id="footer" class="row">
    <div id="copyright" class="col-lg-3 col-sm-12 col-xs-12">
        <p>HEHLan All Rights Reserved Copyright 2016</p>
    </div>
    <div id="ceheh" class="col-lg-offset-2 col-lg-2 col-sm-12 col-xs-12">
        <img src="/Intranet/view/templates/default/assets/img/logo3.png" alt="CEHECOFH">
    </div>
    <div id="campus_technique" class="col-lg-offset-3 col-lg-2 col-sm-12 col-xs-12">
        <a href="http://www.heh.be" target="_blank">
            <img src="/Intranet/view/templates/default/assets/img/logo4.png" alt="HeH">
        </a>
    </div>
</footer>

            <script>
                function kickMap(el) {
                    var container = $(el);              // div containing img&text
                    container.attr('data-value', 0);    // change div's value, to avoid it change css on mouseHower
                    
                    
                    // faire disparaitre l'effet de survol, car après avoir changé 'data-value' l'effet "mouseLeave" 
                    // n'a plus d'effet. Du coup on le fait ici à la main
                    container.children('div').css('background-color', 'rgba(0,0,0,0)');
                    // griser le champ de texte
                    container.css('background-color', 'rgba(0,0,0,0.8)');
                    // griser l'image
                    container.children('img').css('-webkit-filter', 'grayscale(1)');
                }

                // highlighting text 
                // --> visibility/styling while user is choosing
                function highlightUp(el) {
                    var container = $(el);              // div containing img&text
                    var val = $(el).attr('data-value'); // get its custom value
                    if (val == 1)
                        container.children('div').css('background-color', 'rgba(214,251,251,0.3)');
                }
                function highlightDown(el) {
                    var container = $(el);
                    var val = $(el).attr('data-value');
                    if (val == 1)
                        container.children('div').css('background-color', 'rgba(214,251,251,0)');
                }
            </script>
    </body>
    
</html><?php }
}
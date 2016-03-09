{* Smarty *}
<!DOCTYPE html>
<html>
    <head>
        <!-- includes all libraries -->
        {include file="default/meta.tpl"}
        <link rel="stylesheet" type="text/css" href="{#assets#}/css/pick.css" />
        <script type="text/javascript" src="{#domain#}/src/js/jquery.js"></script>
        <script type="text/javascript" src="{#domain#}/src/js/getXhr.js"></script>
        <script type="text/javascript" src="{#domain#}/src/js/jquery-ui.js"></script>
        <script type="text/javascript" src="{#domain#}/src/js/joueur.js"></script>
    </head>

    <body role="document">

        <!-- le logo -->
        {include file="default/header.tpl"}

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
                        {foreach from=$maps item=map}
                            <div class="col-xs-6 col-sm-4 col-md-3 col-lg3">
                                <div onclick="kickMap(this)" onmouseover="highlightUp(this)" onmouseout="highlightDown(this)" data-value="1"> 
                                    <img id="{$map['id']}" class="img-responsive" src="{$map['imgPath']}" alt="{$map['name']}" />
                                    <div style="margin-bottom:5px; margin-top:3px; color:#D1D1D1; text-align:center; border:2px solid #008080">
                                        {$map['name']}
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                    </div>
                </div>

                <div class="col-xs-1 col-sm-1 col-md-1 col-lg1" style="text-align: center">
                    <div class="glyphicon glyphicon-user" style="font-size:3em"></div> 
                    <div>Nickname 2</div>
                </div>
            </div>
        </div>

        {include file="default/footer.tpl"}

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
                    
                    container.children('img').css({
                        '-webkit-filter' : 'grayscale(1)',
                        'filter' : 'grayscale(100%)'
                    });
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
    
</html>
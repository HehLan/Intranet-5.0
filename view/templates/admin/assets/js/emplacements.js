$(document).ready(function()
{
    //colorie la case pour le pseudo
    $('#SelectPseudo').change(function()
    {
        $("#dialogInfo_equipe").css({display :"none"});
        $('.place').css({background : "none"});
        $('#'+$('#SelectPseudo').val()).css({background : "#9ba0ee"});
        valeur = $('#SelectPseudo').val();
    });
   
    //colorie la place pour le select emplacement
    $('#SelectEmplacement').change(function()
    {
        $('.place').css({background : "none"});
        $('#'+$('#SelectEmplacement').val()).css({background : "green"});
    });
    
    // recupere id_equipes pour l'envoi en AJAX
    $('#SelectEquipe').change(function()
    {
        $("#dialogInfo_joueur").css({display :"none"});
        $('.place').css({background : "none"});
        valeur=$('#SelectEquipe').val();
		console.log(valeur);
        $.ajax(
        { 
            type: "POST", 
            url: "../modules/color_equipe.php",
            data: "id_equipes=" + valeur,
            success : function(contenu,etat)
            { 
                $( "#dialogEquipe_Emplacement" ).html(contenu);
                $( "#dialogInfo_equipe" ).html(contenu);
            }       
        });  
   });
});

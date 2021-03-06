<?php
//-----------------TOURNOI TYPE LOL COD-----------------

$sql = 'SELECT e.nom, e.id_equipes as id FROM equipes as e, equipes_tournoi as et
    WHERE et.id_tournoi=:idt AND e.id_equipes=et.id_equipe ORDER BY e.nom';
$query = new Query($database, $sql);
$query->bind('idt', $id_tournoi, PDO::PARAM_INT);
if(!$query->execute())
{
    global $glob_debug;
    if($glob_debug)
    {
        echo 'ERREUR SQL TEAMS';
    }
    exit;        
}    
else				
{
    $equipes = $query->getResult();
}


$sql = 'SELECT m.id_match,m.nom_match,m.heure,m.id_parent,m.id_enfant1, m.id_enfant2, m.nbr_manche
        FROM matchs as m
        WHERE m.id_tournoi=:idt AND m.id_groupe IS NULL AND m.looser_bracket=:looser
        ORDER BY m.id_parent';
$query = new Query($database, $sql);
$query->bind('idt', $id_tournoi, PDO::PARAM_INT);
$query->bind('looser', $looser, PDO::PARAM_INT);
$finale = 0;
$petite_finale = 0;


if ($query->execute())
{
    foreach($query->getResult() as $match)
    {
        $matches[$match['id_match']]['id'] = $match['id_match'];
        $matches[$match['id_match']]['heure'] = $match['heure'];
        $matches[$match['id_match']]['nom'] = $match['nom_match'];
        $matches[$match['id_match']]['id_parent'] = $match['id_parent'];
        $matches[$match['id_match']]['id_enfant1'] = $match['id_enfant1'];
        $matches[$match['id_match']]['id_enfant2'] = $match['id_enfant2'];
        $matches[$match['id_match']]['nbr_manche'] = $match['nbr_manche'];

        if (is_null($match['id_parent']))
        {
            if(is_null($match['id_enfant1']) and is_null($match['id_enfant2']))
            {
                $petite_finale = $match['id_match'];
            }
            else
            {
                $finale = $match['id_match'];
            }                        
        }
        $nbrmatch++;

        $sql2 = 'SELECT mte.id_equipe,e.nom,
                (SELECT SUM(ma.score) FROM manches_equipes as ma 
                        WHERE ma.id_match=:idm AND ma.id_equipe=mte.id_equipe
                        GROUP BY ma.id_equipe) as score
        FROM matchs_equipes as mte, equipes as e 
        WHERE mte.id_match=:idm and e.id_equipes=mte.id_equipe';
        $query2 = new Query($database, $sql2);
        $query2->bind('idm', $match['id_match'], PDO::PARAM_INT);
        if($query2->execute())
        {
            $cpt = 1;
            foreach($query2->getResult() as $team)
            {
                $matches[$match['id_match']][$cpt]['id'] = $team['id_equipe'];
                $matches[$match['id_match']][$cpt]['nom'] = $team['nom'];
                $matches[$match['id_match']][$cpt]['score'] = $team['score'];
                $cpt++;
            }
        }
        else
        {
            global $glob_debug;
            if($glob_debug)
            {
                echo 'ERREUR SQL TEAMS';
            }
            exit;
        }      
    }
}
else
{
    global $glob_debug;
    if($glob_debug)
    {
        echo 'ERREUR SQL MATCHES';
    }
    exit;
}
    
  

if($nbrmatch > 0)
{
    $esc = 0;
    $niveau = 0;
    $tablo = '';
    $match_par_niveau = '';
    $tablo[$niveau][1] = $matches[$finale]['id'];
    $match_par_niveau[0] = 1;
    $niveau++;
    $match_par_niveau_max = 1; 
    

    while($esc == 0)
    {
        $match_par_niveau[$niveau] = 0;
        $mpn2 = 1;
        
        for($mpn=1; $mpn<=$match_par_niveau[$niveau-1]; $mpn++)
        {
            $tablo[$niveau][$mpn2] = $matches[$tablo[$niveau-1][$mpn]]['id_enfant1'];
            if(!is_null($tablo[$niveau][$mpn2]))
            {
                $mpn2++;
            }
            $tablo[$niveau][$mpn2] = $matches[$tablo[$niveau-1][$mpn]]['id_enfant2'];
            if(!is_null($tablo[$niveau][$mpn2]))
            {
                $mpn2++;
            }
        }
        
        $match_par_niveau[$niveau] = $mpn2-1;
        if($match_par_niveau[$niveau] > $match_par_niveau[$niveau-1])
        {
            $match_par_niveau_max = $match_par_niveau[$niveau];
        }
        $ok = true;
        for($mpn=1; $mpn<=$match_par_niveau[$niveau]; $mpn++)
        {
            if(!is_null($matches[$tablo[$niveau][$mpn]]['id_enfant1']) or !is_null($matches[$tablo[$niveau][$mpn]]['id_enfant2']))
            {
                $ok = false;
            }
        }
        if($ok)
        {
            $esc=1;
        }
        $niveau++;
    }
    $niveau--;
    if($petite_finale != 0)
    {
        $tablo[0][2] = $matches[$petite_finale]['id'];
        $match_par_niveau[0] = 2;
    }

    
    
    
    
    
    for ($c = $niveau; $c >= 0; $c--)
    {
        for ($m = 1; $m <= $match_par_niveau[$c]; $m++)
        {
            $nom1 = 'TBD';
            $nom2 = 'TBD';
            $score1 = '';
            $score2 = '';
            if (isset($matches[$tablo[$c][$m]][1]['id']))
            {
                $nom1 = $matches[$tablo[$c][$m]][1]['nom'];
                $score1 = $matches[$tablo[$c][$m]][1]['score'];
            }
            if (isset($matches[$tablo[$c][$m]][2]['id']))
            {
                $nom2 = $matches[$tablo[$c][$m]][2]['nom'];
                $score2 = $matches[$tablo[$c][$m]][2]['score'];
            }
            $clr1 = '1';
            if ($score1 > $score2)
            {
                $clr1 = 'win';
            }
            $clr2 = '2';
            if ($score2 > $score1)
            {
                $clr2 = 'win';
            }
            $fleche = '->';
            if ($c == 0)
            {
                $fleche = '';
            }
            if ($score1 == '')
            {
                $score1 = substr(get_jour_de_la_semaine($matches[$tablo[$c][$m]]['heure']), 0, 3);
            }
            if ($score2 == '')
            {
                $score2 = get_heure($matches[$tablo[$c][$m]]['heure']);
            }

            $matches[$tablo[$c][$m]]['nom1'] = $nom1;
            $matches[$tablo[$c][$m]]['nom2'] = $nom2;
            $matches[$tablo[$c][$m]]['clr1'] = $clr1;
            $matches[$tablo[$c][$m]]['clr2'] = $clr2;
            $matches[$tablo[$c][$m]]['score1'] = $score1;
            $matches[$tablo[$c][$m]]['score2'] = $score2;
            $matches[$tablo[$c][$m]]['fleche'] = $fleche;
        }
    }
}



//print_r($tournoi);




// Applying Template
if(isset($tablo))
{
	$smarty->assign('niveau',$niveau);
	$smarty->assign('match_par_niveau',$match_par_niveau);
	$smarty->assign('matches',$matches);
	$smarty->assign('tablo',$tablo);
}
$smarty->assign("con", $connected);
$smarty->assign("tournoi", $tournoi);
$smarty->assign("gsb", $gsb);
$smarty->assign("looser", $looser);
$smarty->assign("equipes", $equipes);






$smarty->display('admin/finalesPools.tpl');
?>
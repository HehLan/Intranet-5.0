<?php
$id_tournoi = 0;
$looser = 0;
$creer = false;
if (isset($_GET['id_tournoi']))
    $id_tournoi = $_GET['id_tournoi'];
if (isset($_GET['looser']))
    $looser = $_GET['looser'];

if (isset($_POST['id_tournoi'])) {
    if (isset($_POST['petite_finale']))
        $petite_finale = true;
    else
        $petite_finale = false;
    $id_tournoi = $_POST['id_tournoi'];
    $looser = $_POST['looser'];
    $creer = true;

    if (isset($_POST['qualifs'])) {
        $nbr_qualifs = $_POST['qualifs'];
    } else {
        $nbrgroupes = $_POST['nbrgroupes'];
        $tgroupes = $_POST['tgroupes'];
    }
}

$sql = "SELECT * FROM tournoi WHERE id_tournoi=:id";
$query = new Query($database, $sql);
$query->bind(':id', $id_tournoi, PDO::PARAM_INT);
if ($query->execute()) {
    $tournoi = $query->getResult()[0];
} else {
    echo 'ERREUR TOURNOI SQL';
    exit;
}

$jpt = $tournoi['joueurParTeam'];
$nomt = $tournoi['nomTournoi'];

if ($creer) {





    $sql = "DELETE FROM matchs WHERE id_groupe IS NULL AND id_tournoi=:id AND looser_bracket=:looser";
    $query = new Query($database, $sql);
    $query->bind(':id', $id_tournoi, PDO::PARAM_INT);
    $query->bind(':looser', $looser, PDO::PARAM_INT);
    if (!$query->execute()) {
        echo 'ERREUR GROUPES SQL DELETE ';
        exit;
    }

    if ($nbrgroupes != 1 && $nbrgroupes != 2 && $nbrgroupes != 4 && $nbrgroupes != 8 && $nbrgroupes != 16 && $nbrgroupes != 32 && $nbrgroupes != 64 && $nbrgroupes != 128) {

        echo 'Ce nombre de groupes n\'est pas supporté';
        exit;
    } else {
        $nbr_match = $nbrgroupes;
        $first = true;
        while ($nbr_match >= 1) {

            for ($i = 0; $i < $nbr_match; $i++) {

                $sql = "INSERT INTO matchs (id_tournoi,nbr_manche,teamParMatch,looser_bracket,heure,id_enfant1,id_enfant2)
						VALUES (:idt,:nbr,:tpm,:looser,:h,:id1,:id2)";
                $query = new Query($database, $sql);
                $query->bind('idt', $id_tournoi, PDO::PARAM_INT);
                $query->bind('nbr', $tournoi['nombreManche'], PDO::PARAM_INT);
                $query->bind('tpm', $tgroupes, PDO::PARAM_INT);
                $query->bind('looser', $looser, PDO::PARAM_INT);
                $query->bind('h', $tournoi['heure_finale_start'], PDO::PARAM_STR);

                if ($first) {
                    $query->bind('id1', NULL);
                    $query->bind('id2', NULL);
                } else {
                    $query->bind('id1', $id_enfant[$i][0], PDO::PARAM_INT);
                    $query->bind('id2', $id_enfant[$i][1], PDO::PARAM_INT);
                }

                if (!$query->execute()) {
                    echo 'ERREUR INSERT MATCH ';
                    exit;
                }

                $id_enfant[$i >> 1][$i % 2] = $database->$connexion->lastInsertId();
            }

            if ($nbr_match > 1)
                $tournoi['heure_finale_start'] = ajouter_heures($tournoi['heure_finale_start'], $tournoi['duree_inter_match']);
            $first = false;
            $nbr_match = $nbr_match >> 1;
        }

        $sql = "SELECT id_match,id_enfant1,id_enfant2 FROM matchs WHERE id_tournoi=:idt
			AND id_groupe IS NULL AND (id_enfant1 IS NOT NULL OR id_enfant2 IS NOT NULL)";
        $query = new Query($database, $sql);
        $query->bind('idt', $id_tournoi, PDO::PARAM_INT);
        if (!$query->execute()) {
            echo 'ERREUR SELECT FINALES ';
            exit;
        }

        foreach ($query->getResult() as $m
        ) {
            $sql2 = "UPDATE matchs SET id_parent=:idp WHERE id_match=:id1 OR id_match=:id2";
            $query2 = new Query($database, $sql2);
            $query2->bind('idp', $m['id_match'], PDO::PARAM_INT);
            $query2->bind('id1', $m['id_enfant1'], PDO::PARAM_INT);
            $query2->bind('id2', $m['id_enfant2'], PDO::PARAM_INT);
            if (!$query2->execute()) {
                echo 'ERREUR SUPDATE PARENT ';
                exit;
            }
        }
        if ($petite_finale) {
            $sql3 = "INSERT INTO matchs (id_tournoi,nbr_manche,teamParMatch,looser_bracket,heure)
						VALUES (:idt,:nbr,:tpm,:looser,:h)";
            $query3 = new Query($database, $sql);
            $query3->bind('idt', $id_tournoi, PDO::PARAM_INT);
            $query3->bind('nbr', $tournoi['nombreManche'], PDO::PARAM_INT);
            $query3->bind('tpm', $tgroupes, PDO::PARAM_INT);
            $query3->bind('looser', $looser, PDO::PARAM_INT);
            $query3->bind('h', $tournoi['heure_finale_start'], PDO::PARAM_STR);


            if (!$query3->execute()) {
                echo 'ERREUR INSERT PETITE_FINALE ';
                exit;
            }
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>

        <title>HEHLan</title>



        <a href="../../index.php" > BACK TO THE ADMIN</a>


        <script type="text/javascript">
            function select_change(idm, ide)
            {
                document.getElementById('s_' + idm + '_' + ide + '_id').value = document.getElementById('m_' + idm + '_' + ide).value;
            }
            


            function active_select(idm)
            {
                if (document.getElementById('m_' + idm + '_1').disabled)
                {
                    document.getElementById('m_' + idm + '_1').disabled = false;
                    document.getElementById('m_' + idm + '_2').disabled = false;
                }
                else
                {
                    document.getElementById('m_' + idm + '_1').disabled = true;
                    document.getElementById('m_' + idm + '_2').disabled = true;
                }
            }
            function active_score(idm)
            {
                if (document.getElementById('s_' + idm + '_1').disabled)
                {
                    if (document.getElementById('m_' + idm + '_1').value != 0 && document.getElementById('m_' + idm + '_2').value != 0)
                    {
                        document.getElementById('s_' + idm + '_1').disabled = false;
                        document.getElementById('s_' + idm + '_2').disabled = false;
                    }
                }
                else
                {
                    document.getElementById('s_' + idm + '_1').disabled = true;
                    document.getElementById('s_' + idm + '_2').disabled = true;
                }
            }
            function active_groupe(idm, nbr, mxj)
            {
                if (document.getElementById('cb_' + idm).checked)
                {

                    for (j = 1; j <= mxj; j++)
                    {
                        document.getElementById('m_' + idm + '_' + j).disabled = false;
                        for (i = 1; i <= nbr; i++)
                        {
                            document.getElementById('s_' + idm + '_' + j + '_' + i).disabled = false;
                        }
                    }
                }
                else
                {
                    for (j = 1; j <= mxj; j++)
                    {
                        document.getElementById('m_' + idm + '_' + j).disabled = true;
                        for (i = 1; i <= nbr; i++)
                        {
                            document.getElementById('s_' + idm + '_' + j + '_' + i).disabled = true;
                        }
                    }
                }
            }
            function popup_heure(idm)
            {
                document.getElementById('input_id_match').value = idm;
                document.getElementById('shadowing').style.display = 'block';
                document.getElementById('div_popup').style.visibility = 'visible';

            }
            function popup_close()
            {
                document.getElementById('shadowing').style.display = 'none';
                document.getElementById('div_popup').style.visibility = 'hidden';
            }
        </script>
    </head>

    <body style="background-color: beige;">

       
        <div id="navigation">


        </div>
        
        
        <div id="container">
            <div id="contenu">
<?php
$gsb[0] = 'GOLD';
$gsb[2] = 'SILVER';
$gsb[3] = 'BRONZE';
echo '<h1>Finales de ' . $tournoi['nomTournoi'] . ' ' . $gsb[$looser] . '</h1>
			<form method="POST" action="modules/finale_save.php">
			<input type="hidden" name="id_tournoi" value="' . $id_tournoi . '">
			<input type="hidden" name="looser" value="' . $looser . '">
			<input type="submit" value="Enregistrer"><br><br>';

$nbrmatch = 0;

    //------------------------------TOURNOI TYPE TM UT--------------------------------------

    $sql = "SELECT e.pseudo as nom, e.id_joueur as id FROM joueurs as e, joueurtournoi as et
				WHERE et.id_tournoi=:idt AND e.id_joueur=et.id_joueur ORDER BY e.pseudo";
    $query = new Query($database, $sql);
    $query->bind('idt', $id_tournoi, PDO::PARAM_INT);
    if (!$query->execute()) {
        echo 'ERREUR SQL TEAMS';
        exit;
    } else {
        $joueurs = $query->getResult();
    }

    $sql = "SELECT m.id_match,m.nom_match,m.heure,m.id_parent,m.id_enfant1, m.id_enfant2, 
				m.nbr_manche, m.teamParMatch as mtpm, t.teamParMatch as ttpm
				FROM matchs as m, tournoi as t
				WHERE m.id_tournoi=:idt AND t.id_tournoi=:idt AND m.id_groupe IS NULL AND m.looser_bracket=:looser
				ORDER BY m.id_parent";
    $query = new Query($database, $sql);
    $query->bind('idt', $id_tournoi, PDO::PARAM_INT);
    $query->bind('looser', $looser, PDO::PARAM_INT);
    $finale = 0;
    $petite_finale = 0;

    if ($query->execute()) {
        foreach($query->getResult() as $match){
            $nbrmatch++;
            $matches[$match['id_match']]['id'] = $match['id_match'];
            $matches[$match['id_match']]['heure'] = $match['heure'];
            $matches[$match['id_match']]['nom'] = $match['nom_match'];
            $matches[$match['id_match']]['id_parent'] = $match['id_parent'];
            $matches[$match['id_match']]['id_enfant1'] = $match['id_enfant1'];
            $matches[$match['id_match']]['id_enfant2'] = $match['id_enfant2'];
            $matches[$match['id_match']]['nbr_manche'] = $match['nbr_manche'];
            $matches[$match['id_match']]['mtpm'] = $match['mtpm'];
            $matches[$match['id_match']]['ttpm'] = $match['ttpm'];
            if (is_null($match['id_parent'])) {
                if (is_null($match['id_enfant1']) and is_null($match['id_enfant2']))
                    $petite_finale = $match['id_match'];
                else
                    $finale = $match['id_match'];
            }

            $sql2 = "SELECT mtj.id_joueur,j.pseudo,
							(SELECT SUM(ma.score) FROM manches_joueurs as ma 
								WHERE ma.id_match=:idm AND ma.id_joueur=mtj.id_joueur
								GROUP BY ma.id_joueur) as score
						FROM matchs_joueurs as mtj, joueurs as j 
						WHERE mtj.id_match=:idm and j.id_joueur=mtj.id_joueur
						ORDER BY score DESC";
            $query2 = new Query($database, $sql2);
            $query2->bind('idm', $match['id_match'], PDO::PARAM_INT);
            if ($query2->execute()) {
                $cpt = 0;
                foreach($query2->getResult() as $team){
                    $cpt++;
                    $matches[$match['id_match']][$cpt]['id'] = $team['id_joueur'];
                    $matches[$match['id_match']][$cpt]['nom'] = $team['pseudo'];
                    $matches[$match['id_match']][$cpt]['score'] = $team['score'];
                }
                $matches[$match['id_match']]['nbr_joueurs'] = $cpt;
            } else {
                echo 'ERREUR SQL JOUEURS';
                exit;
            }


            $sql2 = "SELECT mj.id_joueur, mj.numero_manche, mj.score
						FROM manches_joueurs as mj
						WHERE mj.id_match=:idm
						ORDER BY mj.id_joueur";
            $query2 = new Query($database, $sql2);
            $query2->bind('idm', $match['id_match'], PDO::PARAM_INT);
            if ($query2->execute()) {
                $nbrmax = 0;
                $nbrm = 0;
                $old_idj = 0;
                foreach ($query2->getResult() as $ligne){
                    if ($old_idj != $ligne['id_joueur']) {
                        $nbrm = 0;
                        $old_idj = $ligne['id_joueur'];
                    }
                    $scores[$match['id_match']][$ligne['id_joueur']][$ligne['numero_manche']] = $ligne['score'];

                    if ($old_idj == $ligne['id_joueur']) {
                        $nbrm++;
                        if ($nbrm > $nbrmax)
                            $nbrmax = $nbrm;
                    }
                }
            }
            else {
                echo 'ERREUR SQL MANCHES';
                exit;
            }

            if ($nbrmax > $matches[$match['id_match']]['nbr_manche'])
                $matches[$match['id_match']]['nbr_manche'] = $nbrmax;
        }
    }
    else {
        echo 'ERREUR SQL MATCHES';
        exit;
    }

    if ($nbrmatch == 1) {
        $finale = $petite_finale;
        $petite_finale = 0;
    }
    if ($nbrmatch != 0) {
        $esc = 0;
        $niveau = 0;
        $tablo = '';
        $match_par_niveau = '';
        $tablo[$niveau][1] = $matches[$finale]['id'];
        $match_par_niveau[0] = 1;
        $niveau++;
        $match_par_niveau_max = 1;

        while ($esc == 0) {
            $match_par_niveau[$niveau] = 0;
            $mpn2 = 1;
            for ($mpn = 1; $mpn <= $match_par_niveau[$niveau - 1]; $mpn++) {
                $tablo[$niveau][$mpn2] = $matches[$tablo[$niveau - 1][$mpn]]['id_enfant1'];
                if (!is_null($tablo[$niveau][$mpn2]))
                    $mpn2++;
                $tablo[$niveau][$mpn2] = $matches[$tablo[$niveau - 1][$mpn]]['id_enfant2'];
                if (!is_null($tablo[$niveau][$mpn2]))
                    $mpn2++;
            }

            $match_par_niveau[$niveau] = $mpn2 - 1;
            if ($match_par_niveau[$niveau] > $match_par_niveau[$niveau - 1])
                $match_par_niveau_max = $match_par_niveau[$niveau];
            $ok = true;
            for ($mpn = 1; $mpn <= $match_par_niveau[$niveau]; $mpn++) {
                if (!is_null($matches[$tablo[$niveau][$mpn]]['id_enfant1']) or ! is_null($matches[$tablo[$niveau][$mpn]]['id_enfant2']))
                    $ok = false;
            }
            if ($ok) {
                $esc = 1;
            }
            $niveau++;
        }
        $niveau--;

        if ($petite_finale != 0) {
            $tablo[0][2] = $matches[$petite_finale]['id'];
            $match_par_niveau[0] = 2;
        }
        echo '<table>
							<tr>';
        for ($c = $niveau; $c >= 0; $c--) {
            echo '<th>Round ' . (1 + $niveau - $c) . '</th>';
        }
        echo '</tr><tr>';
        for ($c = $niveau; $c >= 0; $c--) {
            echo '<td>
								<table>';
            for ($m = 1; $m <= $match_par_niveau[$c]; $m++) {
                $maxj = $matches[$tablo[$c][$m]]['nbr_joueurs'];
                if ($matches[$tablo[$c][$m]]['mtpm'] > $matches[$tablo[$c][$m]]['nbr_joueurs'])
                    $maxj = $matches[$tablo[$c][$m]]['mtpm'];
                for ($j = 1; $j <= $maxj; $j++) {
                    $nom[$j] = '<select name="m_' . $tablo[$c][$m] . '_' . $j . '"
								id="m_' . $tablo[$c][$m] . '_' . $j . '" 
								onchange="select_change(' . $tablo[$c][$m] . ',' . $j . ')" disabled="disabled"><option value="0"></option>';
                    $score[$j] = '';
                    $id_score[$j] = '0';

                    foreach ($joueurs as $joueur) {
                        $nom[$j].='<option value="' . $joueur['id'] . '"';
                        if (isset($matches[$tablo[$c][$m]][$j]['id'])) {
                            if ($matches[$tablo[$c][$m]][$j]['id'] == $joueur['id']) {
                                $nom[$j].='selected';
                                $id_score[$j] = $joueur['id'];
                            }
                            $score[$j] = $matches[$tablo[$c][$m]][$j]['score'];
                        }
                        $nom[$j].=' >' . $joueur['nom'] . '</option>';
                    }



                    $clr[$j] = '';

                    $fleche = '->';
                    $heure = get_jour_de_la_semaine($matches[$tablo[$c][$m]]['heure']) . ' ' . get_heure($matches[$tablo[$c][$m]]['heure']);

                    if ($j == 1) {
                        if ($c == 0) {
                            if ($m == 1)
                                echo '<tr class="tr_arbre_vide"><td class="td_finale_vide" colspan="' . ($matches[$tablo[$c][$m]]['nbr_manche'] + 4) . '">FINALE<br><a href="#" onclick="popup_heure(' . $tablo[$c][$m] . ')">' . $heure . '</a></td></tr>';
                            if ($m == 2)
                                echo '<tr class="tr_arbre_vide"><td class="td_finale_vide" colspan="' . ($matches[$tablo[$c][$m]]['nbr_manche'] + 4) . '">Petite Finale<br><a href="#" onclick="popup_heure(' . $tablo[$c][$m] . ')">' . $heure . '</a></td></tr>';
                            $fleche = '';
                        }
                        else {
                            echo '<tr class="tr_arbre_vide"><td class="td_finale_vide" colspan="' . ($matches[$tablo[$c][$m]]['nbr_manche'] + 4) . '"><a href="#" onclick="popup_heure(' . $tablo[$c][$m] . ')">' . $heure . '</a></td></tr>';
                        }
                        echo '<tr class="tr_arbre_vide">
										<td class="td_arbre_gauche"></td>
										<th class="th_arbre_joueur">Joueur <input type="checkbox"
										name="cb_' . $tablo[$c][$m] . '" id="cb_' . $tablo[$c][$m] . '"
										onclick="active_groupe(' . $tablo[$c][$m] . ',' . $matches[$tablo[$c][$m]]['nbr_manche'] . ',' . $maxj . ')"></th>';
                        for ($ma = 1; $ma <= $matches[$tablo[$c][$m]]['nbr_manche']; $ma++)
                            echo '<th class="th_arbre_joueur">M' . $ma . '</th>';

                        echo '<th class="th_arbre_joueur">Total</th>
											<td class="td_arbre_droite"></td>
										</tr>';
                    }


                    echo '<tr>';
                    if ($j == 1)
                        echo '<td class="td_arbre_gauche" rowspan="' . $maxj . '">#' . $tablo[$c][$m] . '</td>';
                    echo '<td class="td_arbre_joueur' . $clr[$j] . '">' . $nom[$j] . '</td>';
                    for ($ma = 1; $ma <= $matches[$tablo[$c][$m]]['nbr_manche']; $ma++) {
                        $score_ma = '';
                        if (isset($matches[$tablo[$c][$m]][$j]['id'])) {
                            $idj = $matches[$tablo[$c][$m]][$j]['id'];
                            if (isset($scores[$tablo[$c][$m]][$idj][$ma]))
                                $score_ma = $scores[$tablo[$c][$m]][$idj][$ma];
                        }
                        echo '<td class="td_arbre_joueur_score' . $clr[$j] . '">
											<input type="text" name="s_' . $tablo[$c][$m] . '_' . $j . '_' . $ma . '"
											 id="s_' . $tablo[$c][$m] . '_' . $j . '_' . $ma . '"
											 value="' . $score_ma . '" size="4" disabled="disabled"></td>';
                    }
                    echo '<td class="td_arbre_joueur_total' . $clr[$j] . '">
										<input type="hidden" name="s_' . $tablo[$c][$m] . '_' . $j . '_id" 
										id="s_' . $tablo[$c][$m] . '_' . $j . '_id" value="' . $id_score[$j] . '">' . $score[$j] . '</td>';

                    if ($j == 1)
                        echo '<td class="td_arbre_droite" rowspan="' . $maxj . '">' . $fleche . ' ' . $matches[$tablo[$c][$m]]['id_parent'] . '</td>';

                    echo '</tr>';
                }
                echo '<tr class="tr_arbre_vide"><td class="td_arbre_vide" colspan="' . ($matches[$tablo[$c][$m]]['nbr_manche'] + 4) . '"></td></tr>';
            }

            echo '</table></td>';
        }
        echo '</tr>
					</table>';
    }
    else {
        echo 'Ce tournoi n\'est pas encore encodé dans la base de données du site';
    }

?>
                </form>
            </div>
        </div>

        <div id="shadowing"></div>

        <div id="div_popup" class="popup_centree" style="height:200px;width:600px;margin-top:-100px;margin-left:-300px;">
            <input type="button" value="annuler" onclick="popup_close()" />
            <form method="POST" action="modifier_heure.php">
                       
                <input type="hidden" name="id_match" id="input_id_match" value="0" />
                <input type="hidden" name="id_tournoi" value="<?php echo $id_tournoi; ?>" />
                <input type="hidden" name="looser" value="<?php echo $looser; ?>" />
                <input type="hidden" name="page" value="finales" />
                vendredi <input type="radio" name="jour" value="vendredi"> / samedi <input type="radio" name="jour" value="samedi"> / dimanche <input type="radio" name="jour" value="dimanche"><br>
                                Heure : <select name="heure">
                <?php
                for ($i = 0; $i < 24; $i++) {
                    echo '<option>';
                    if ($i < 10)
                        echo '0';
                    echo $i . '</option>';
                }
                ?>	
                                </select>h<select name="minute">
                <?php
                for ($i = 0; $i < 60; $i+=5) {
                    echo '<option>';
                    if ($i < 10)
                        echo '0';
                    echo $i . '</option>';
                }
                ?>					
                                </select><br>
                                    <input type="submit" value="Modifier" /><br>
                                        </div>


                                        </body>
                                        </html>

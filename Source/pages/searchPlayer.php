<?php
    require 'required.php';

    //onglet actif
    $activeTab = "";

    //on récupére les stats du joueur
    $am = new PdoApiKeyManager();
    $errorMessage = "";

    $playerProp = $am->getPlayerByName(str_replace(" ", "%20", $_GET['pseudo']));
    if (is_string($playerProp))
    {
        $errorMessage = $playerProp;
    }

    if (!isset($playerProp->status) && !is_string($playerProp)) 
    {
      foreach ($playerProp as $player) 
      {
        $playerId = $player->id;
        $leaguePlayer = $am->getInfoLeagueByIdPlayer($player->id);
        $currentGamePlayer = $am->getPlayerInGame($player->id);
      }
    }
    else
    {
      $leaguePlayer = null;
    }

    function strReplaceAssoc(array $replace, $subject) 
    { 
        return str_replace(array_keys($replace), array_values($replace), $subject);    
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="../images/beta.png" />

    <title>LOL Pro Stats</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Perso -->
    <link href="../dist/css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../dist/jquery/jquery-2.0.3.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- brand-->
            <?php include("includes/brand.html"); ?>

            <!-- menu top-->
            <?php include("includes/menu_top.php"); ?>

            <!-- menu left-->
            <?php include("includes/menu_left.html"); ?>

        </nav>

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row"><br /><br />
              <?php if ($errorMessage == ""): ?>
                  <!-- tableau associatif pour rank -->
                <?php $replace = array( 
                ' III' => '_3',
                ' II' => '_2',
                ' IV' => '_4',
                ' I' => '_1', 
                ' V' => '_5'); ?>
                <?php if (!isset($playerProp->status)) { ?>
                  <?php $ranked = false; ?>
                    <?php if (!isset(current($leaguePlayer)->status_code)) { ?>
                      <!-- on prend le premier élément du tableau -->
                      <?php foreach(current($leaguePlayer) as $league): ?>
                        <?php if ($league->queue == "RANKED_SOLO_5x5") { ?>
                          <?php $tierLower = strtolower($league->tier); ?>
                          <div id="champRecherche">
                            <div id="imageRecherche">
                                <?php if (!isset($currentGamePlayer->status)) { // Vérification si le joueur est en jeu ?>
                                  <div class='btn btn-info' style="margin-top: 350px;"><i class='fa fa-bell faa-ring animated' aria-hidden='true'></i> En Jeu</div>
                                <?php } ?>
                            </div>

                            <?php foreach($league->entries as $entry): ?>

                              <?php if ($entry->playerOrTeamId == $playerId): ?>

                                  <?php $ranked = true; ?>
                                  <?php echo "<a href='statsPlayer.php?id=" . $entry->playerOrTeamId . "&season=2017'>" . "<br /><b>" . $entry->playerOrTeamName . "</b></a>"?>
                                  <!-- on parse la ligue pour récupérer l'image  -->
                                  <?php $imageLeagueLien = "http://lkimg.zamimg.com/images/medals/" . $tierLower . " " . $entry->division . ".png";
                                  $imageLeague = strReplaceAssoc($replace, $imageLeagueLien); ?>
                                  <?php echo "<img src='". $imageLeague . "'></img>"; ?>
                                  <?php echo $league->name . "<br />"?>
                                  <?php echo $entry->leaguePoints . " LP" ?>
                                  <?php echo strtoupper($tierLower); ?>
                                  <?php echo $entry->division ?>
                                  <?php if (isset($entry->miniSeries)) {
                                  $series = str_split($entry->miniSeries->progress);
                                  echo "<br />";
                                  foreach ($series as $serie ) {
                                    if ($serie == "W")
                                    {
                                      echo "<img src='http://lkimg.zamimg.com/assets/000/000/356.png'></img>";
                                    }
                                    else if ($serie == "L")
                                    {
                                      echo "<img src='http://lkimg.zamimg.com/assets/000/000/357.png'></img>";
                                    }
                                    else if ($serie == "N")
                                    {
                                      echo "<img src='http://lkimg.zamimg.com/assets/000/000/358.png'></img>";
                                    }
                                  }

                                } ?>

                              <?php endif ?>

                            <?php endforeach; ?>

                          </div>
                          <?php } ?>
                      <?php endforeach; ?>
                    <?php } // Fin du isset league ?>
                <!-- Le joueur n'a pas été trouvé -->
                <?php } else { ?>
                  <div id="champRecherche">
                        <div id="imageRecherche"></div>

                            <?php $ranked = true;

                            echo "<br /><b>" . $_GET['pseudo'] . "</b></a>";

                            echo "<br /><br /><br />Ce joueur n'existe pas."; ?>

                  </div>
                <?php } ?>
                <!-- Le joueur n'est pas classé -->
                <?php if ($ranked == false) { ?>
                    <div id="champRecherche">
                        <div id="imageRecherche">
                          <?php if (!isset($currentGamePlayer->status)) { // Vérification si le joueur est en jeu ?>
                              <div class='btn btn-info' style="margin-top: 350px;"><i class='fa fa-bell faa-ring animated' aria-hidden='true'></i> En Jeu</div>
                          <?php } ?>
                        </div>
                            <?php echo "<a href='statsPlayer.php?id=" . reset($playerProp)->id . "&season=2017'>" . "<br /><b>" . $_GET['pseudo'] . "</b></a>"?>

                            <br />

                            <img src="http://lkimg.zamimg.com/images/medals/unknown.png"></img>

                            <br /><br /><br />UNRANKED

                    </div>
                <?php } ?>

              <?php else: ?>

                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                    <strong>Ho non!</strong> L'API de League Of Legends a renvoyé une erreur : <?= $errorMessage ?>.
                </div>

              <?php endif ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

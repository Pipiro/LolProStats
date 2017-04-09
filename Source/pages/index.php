<?php
    require 'required.php';

    //on simule la connexion et le compte
    $_SESSION['playerId'] = "1";
    $_SESSION['accountId'] = "1";
    $_SESSION['username'] = "Pipiro";

    //on récupére les teams
    $tm = new PdoTeamsManager();
    $teams = $tm->getTeams();

    $pttm = new PdoPlayersToTeamManager();

    $pm = new PdoPlayersManager();
    //$players = $pm->getActivesPlayers();

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
            <div class="row">
                <div id="affichage">

                     <center><img src="../images/LeagueOfLegendsLogo.png"></center>

                      <?php //on récupére les joueurs a surveiller
                      foreach($teams as $team)
                      {
                        echo "<h1>".$team->getName()."</h1><br \>";
                        $playersToTeam = $pttm->getPlayersByTeamId($team->getId());
                        foreach($playersToTeam as $playerToTeam)
                        {
                          $player = $pm->getPlayerbyId($playerToTeam->getIdPlayer());
                          echo $player->getName()."<br \>";
                        }
                      } 
                      ?>
       
                </div>
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

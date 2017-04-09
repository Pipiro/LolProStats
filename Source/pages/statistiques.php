<?php
    require 'required.php';

    //onglet actif
    $activeTab = "statistiques";

    // récupération des tems
    $tm = new PdoTeamsManager();
    $teams = $tm->getTeams();
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

     <script type="text/javascript">


      function getDataTeam(idTeam)
      {
        //affichage du chargement
       $('#affichage').html("<br /><br /><div style='text-align: center;'><p>Récupération et traitement des données</p><img src='../images/loader3.gif' alt='chargement...'/></div>")
       
       //requête ajax, appel du fichier _returnNumberKeysAvailables.php
       $.ajax(
       {
        type: "GET",
        url: "ajax/_returnDataTeam.php?idTeam="+idTeam,
        dataType : "html",
        //affichage de l'erreur en cas de problème
        error:function(msg, string)
        {
          alert( "Error !: " + string );
        },
        success:function(data)
        {
          //on met à jour la div contenu_stats avec les données reçus
          //on vide la div et on le cache
          $("#affichage").empty().hide();
          //on affecte les resultats au div
          $("#affichage").append(data);
          //on affiche les resultats avec la transition
          $('#affichage').fadeIn(800);
        }
       });
      }

    </script>

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
            <br />
            <div class="row">
                Rechercher des matchs en mode normal dans les 10 dernières parties pour :
                <form>
                    <select id="selectTeam">
                        <?php foreach($teams as $team): ?>
                            <?php echo "<option value='".$team->getId()."'>".$team->getName()."</option>"; ?>
                        <?php endforeach; ?>
                    </select>
                    <div class='btn btn-success' onclick="getDataTeam(selectTeam.value)"><i class='fa fa-chevron-right' aria-hidden='true'></i> Rechercher</div>
                </form>

                <div id="affichage">
               
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

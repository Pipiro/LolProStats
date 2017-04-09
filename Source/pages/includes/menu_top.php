<?php 
    $nm = new PdoNotificationManager();
    $notifications = $nm->getNotificationsByAccount($_SESSION['accountId']);

    $am = new PdoApiKeyManager();
    $numberKeyAvailable = $am->getNumberKeysAvailable();
?>

<script type="text/javascript">
      $(document).ready(function() 
      {
        function getNumberKey()
        {
          var oldNumberKey = $("#number_keys_available").html();
          //requête ajax, appel du fichier _returnNumberKeysAvailables.php
          $.ajax(
          {
            type: "GET",
            url: "ajax/_returnNumberKeysAvailables.php",
            dataType : "html",
            //affichage de l'erreur en cas de problème
            error:function(msg, string)
            {
            alert( "Error !: " + string );
            },
            success:function(data)
            {
              //on met à jour la div number_keys_available avec les données reçus si le nombre de clés à changé
              if (oldNumberKey != data)
              {
                //on vide la div et on le cache
                $("#number_keys_available").empty().hide();
                //on affecte les resultats au div
                $("#number_keys_available").append(data);
                //on affiche les resultats avec la transition
                $('#number_keys_available').fadeIn(2000);
                            //on supprime les class du bouton
                $('#button_key').removeClass( "btn-success" );
                $('#button_key').removeClass( "btn-info" );
                $('#button_key').removeClass( "btn-danger" );
                //on met a jours la class
                if (data == 7) {
                  $('#button_key').addClass( "btn-success" );
                } else if (data > 3) {
                  $('#button_key').addClass( "btn-info" );
                } else {
                  $('#button_key').addClass( "btn-danger" );
                }
              }
            }
          });
        }
        setInterval(getNumberKey, 5000)
      })

    </script>


<ul class="nav navbar-top-links navbar-right">
     <?php if (isset($_SESSION['playerId'])) { ?>
                <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>

                        </li> -->
                <li class="dropdown">
                    <div>
      <?php if ($numberKeyAvailable == 7)  { ?>
        <button style="margin-left: -550px;" class="btn btn-success">Clées disponibles <span class="badge text-success" id="number_keys_available"><?php echo $numberKeyAvailable; ?></span></button>
      <?php } else if ($numberKeyAvailable > 3) { ?>
        <button style="margin-left: 350px;" class="btn btn-info">Clées disponibles <span class="badge text-success" id="number_keys_available"><?php echo $numberKeyAvailable; ?></span></button>
      <?php } else  { ?>
        <button style="margin-left: 350px;" class="btn btn-danger">Clées disponibles <span class="badge text-success" id="number_keys_available"><?php echo $numberKeyAvailable; ?></span></button>
      <?php } ?>
    </div> 
                    <!--<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
               <!-- </li> -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <?php if ($notifications != null)
                        {
                            foreach ($notifications as $notification): ?>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i><?php echo " ".$notification->getContent(); ?>
                                        <span class="pull-right text-muted small"><?php echo " ".$nm->getContentTimeNotification($notification->getDate()); ?></span>
                                    </div>
                                </a>
                            </li>
                            <?php endforeach;  
                        } else { ?>
                            <li>
                                <a>
                                    <div>
                                        Aucune notification
                                    </div>
                                </a>
                            </li>
                        <?php } ?>
                        <!-- <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li> -->
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Afficher tout</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Profil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Paramètres</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->

    <?php } else { ?>

        <div style="float:right; padding: 5px 10px;">
            <button class="btn btn-primary btn-lg" style="width:120px; height: 40px;" data-toggle="modal" data-target="#loginModal">Connexion</button>
                <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div style="width: 450px;" class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Connexion</h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <form role="form">
                                        <fieldset>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="remember" type="checkbox" value="Remember Me">Se souvenir de moi
                                                </label>
                                            </div>
                                            <!-- Change this to a button or input when using this as a form -->
                                            <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    <?php } ?>

</ul>



<?php 

//securite
if (!isset($activeTab))header('Location: ../index.php');

$credential_error = false;

if (isset($_POST['username']) && isset($_POST['password']) && empty($_POST['username']) == false && empty($_POST['password']) == false)
{
  $pm = new PdoPlayerManager();
  $player = $pm->authenticate($_POST['username'], $_POST['password']);
  if($player) 
  {
    $_SESSION['isAdmin'] = $player->getIsAdmin();
    $_SESSION['playerId'] = $player->getId();
    $_SESSION['playerUsername'] = $player->getUsername();

    header('Location: index.php');
    exit();
  }
  else 
  {
    header('Location: index.php');
    $credential_error = true;
  }
} ?>

<div class="header">
    <ul class="nav nav-pills pull-right">
      <?php if ($activeTab == "index") { ?>
      <li class="active"><a href="index.php">Accueil</a></li>
      <?php } else { ?>
      <li><a href="index.php">Accueil</a></li>
      <?php } ?>
      <?php if ($activeTab == "mage") { ?>
      <li class="active"><a href="mages.php">Mes mages</a></li>
      <?php } else { ?>
      <li><a href="mages.php">Mes mages</a></li>
      <?php } ?>
      <?php if ($activeTab == "ecole") { ?>
      <li class="active"><a href="ecole.php">Ecole</a></li>
      <?php } else { ?>
      <li><a href="ecole.php">Ecole</a></li>
      <?php }
      if (isset($_SESSION['playerId']))
      { ?>
      <div style="float:right;margin-top:6px;margin-left:50px;">
        Bonjour <?php echo $_SESSION['playerUsername']; ?>
        <a class="btn btn-primary" href="logout.php">Se déconnecter</a>
      </div>
      <?php } else { ?>
      <li style="margin-top:6px;margin-left:50px;margin-right:-50px;">
          <form action="index.php" method="post">
            <input type="text" name="username" value="Pseudo" onclick="this.value='';" style="vertical-align: middle;">
            <input type="password" name="password" value="***" onclick="this.value='';" style="vertical-align: middle;">
             <button type="submit" class="btn btn-primary">Se connecter</button>
           </form>
      </li>
      <?php } ?>
      </ul>
      <a href="index.php" style="text-decoration:none;"><h3 class="text-muted">Magic School</h3></a>
</div>
<br />

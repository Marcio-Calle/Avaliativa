
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item mt-3" >
              <a class="nav-link active " style="margin-left: -50%;" aria-current="page" href="index.php"><p class="h3">Home</p> </a>
            </li>
            <li class="nav-item" style="margin-right: 18%; margin-left: 5%;">
              <a class="nav-link active" aria-current="page" href="index.php"><div style="background-color: white; border-radius: 30px"><img style="width: 80px" src="img/icone2.png" alt=""></div></a>
            </li>
            <li class="nav-item mt-3" <?php if(empty($_SESSION['conta']['adm'])){
              echo 'style="display:block"';
              
            }else{echo 'style="display:none"';}?>>
              <a class="nav-link active" href="listar.php">
              
                <p class="h3"> Carrinho</p>
                <div class="d-flex justify-content-end"  >
                  <div class="text-center " style="border-radius: 30px;width: 25% ;margin-top: -22%;margin-right: -17%;<?php if($carrinho || $_SESSION['acao'][0] == 0) echo 'display: none ;'?>background-color: red;"><?php echo $_SESSION['acao'][0]?></div>
                </div>
              </a>
            </li>
          </ul>
        </div>
        <?php if(empty($_SESSION['conta']['logado'])) {echo '
        <div class="justify-content-end" style="margin-left: -18%; margin-right: 10%">
        <a  class="navbar-text active text-light" href="login.php">
          <p class="h5">Entrar</p>
        </a>
      </div>
        ';}else{
        
          echo '<div class="justify-content-end" style="margin-left: -27%; margin-right: 10%">
          <a  class="navbar-item active text-light" href="perfil.php">
          
            <img style="border-radius: 50%;margin-left: 100px;margin-right: 30px; width: 50px" src="img/perfils/'.$_SESSION['conta']['user']->Img.'">
            
          </a>
        </div>';
        }?>
        
  </div>
</nav>
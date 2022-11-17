<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-center" id="navbarNav">
      <ul class="navbar-nav ">
        
        <li class="nav-item mt-3" style="margin-left: 180%; margin-right: 30%">
          <a class="nav-link active" aria-current="page" href="index.php"><p class="h3">Home</p> </a>
        </li>
        <li class="nav-item" style="margin-right: 30%">
          <a class="nav-link active" aria-current="page" href="index.php"><div style="background-color: white; border-radius: 30px"><img style="width: 80px" src="img/icone2.png" alt=""></div></a>
        </li>
       
        <li class="nav-item mt-3">
          <a class="nav-link active" href="listar.php">
          
            <p class="h3"> Carrinho</p>
            <div class="d-flex justify-content-end"  >
              <div class="text-center " style="border-radius: 30px;width: 25% ;margin-top: -22%;margin-right: -17%;<?php if($carrinho || $_SESSION['acao'][0] == 0) echo 'display: none ;'?>background-color: red;"><?php echo $_SESSION['acao'][0]?></div>
            </div>
          </a>
         
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
  $notfound = false;
  include 'config.php';
  $html = '';
if (isset($_POST['search'])) {
    $id_no = $_POST['id_no'];
    $sql = "Select * from cards where id_no='$id_no' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $html = "<div class='card' style='width:350px; padding:0;' >";
        $html .= "";
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row["name"];
            $id_no = $row["id_no"];
            $department = $row['department'];
            $dob = $row['dob'];
            $address = $row['address'];
            $email = $row['email'];
            $exp_date = $row['exp_date'];
            $phone = $row['phone'];
            $address = $row['address'];
            $image = $row['image'];
            $office = $row['office'];
            $date = date('M d, Y', strtotime($row['date']));

            $html .= "
                                          
                                          <!-- ===== Second Id Card Start ===== -->
                                          <div class='container' style='text-align:left; border:2px dotted black;'>
                                                <div class='header'>
                                                  
                                                </div>
                                    
                                                <div class='container-2'>
                                                    <div class='box-1'>
                                                    <img src='$image'/>
                                                    </div>
                                                    <div class='box-2'>
                                                        <h2>$name</h2>
                                                        <p style='font-size: 14px;'>$office</p>
                                                    </div>
                                                    <div class='box-3'>
                                                        <img src='assets/images/logo_3.png' alt=''>
                                                    </div>
                                                </div>
                                    
                                                <div class='container-3'>
                                                    <div class='info-1'>
                                                        <div class='id'>
                                                            <h4>Matrícula</h4>
                                                            <p>$id_no</p>
                                                        </div>
                                    
                                                        <div class='dob'>
                                                            <h4>Telefone</h4>
                                                            <p>$phone</p>
                                                        </div>
                                    
                                                    </div>
                                                    <div class='info-2'>
                                                        <div class='join-date'>
                                                            <h4>Entrada</h4>
                                                            <p>$date</p>
                                                        </div>
                                                        <div class='expire-date'>
                                                            <h4>Saída</h4>
                                                            <p>$exp_date</p>
                                                        </div>
                                                    </div>
                                                    <div class='info-3'>
                                                        <div class='email'>
                                                            <h4>Endereço</h4>
                                                            <p>$address Atualizado</p>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class='info-4'>
                                                        <div class='sign'>
                                                            <br>
                                                            <p style='font-size:12px;'>Sua assinatura</p>
                                                        </div>
                                                    </div>
                                                    <!-- ===== Second Id Card End ===== -->
                                          ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ===== Bootstrap CSS Start ===== -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="images/favicon.png"/>
  <link rel="stylesheet" href="css/dashboard.css">
  
  <link rel="icon" type="image/png" href="images/favicon.png"/>
  <!-- ===== Bootstrap CSS End ===== -->
  <title>Gerar Cartão</title>
  <!-- ===== Fonts CSS Start ===== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
  <!-- ===== Fonts CSS End ===== -->
  <!-- ===== CSS Start ===== -->
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>
  <!-- ===== CSS End ===== -->
</head>
<body>
  <!-- ===== Navigation Bar Start ===== -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-image: linear-gradient(to right, rgb(0,300,255), rgb(93,4,217));">
    <a class="navbar-brand" href="#"><img src="assets/images/logo_3.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Ação</a>
            <a class="dropdown-item" href="#">Nova Ação</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Outra aqui</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Desabilitar</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Digite aqui..." aria-label="Search">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Pesquisar</button>
      </form>
    </div>
  </nav>
  <!-- ===== Navigation Bar End ===== -->  
  <br>
  <!-- ===== Generate Card Start ===== -->
  <div class="row" style="margin: 0px 20px 5px 20px">
    <div class="col-sm-6">
      <div class="card jumbotron">
        <div class="card-body">
          <form class="form" method="POST" action="id_card.php">.
          <label for="exampleInputEmail1">Número da Matrícula do Funcionário.</label>
          <input class="form-control mr-sm-2" type="search" placeholder="Digite o Número do Cartão..." name="id_no">
          <small id="emailHelp" class="form-text text-muted">Cada funcionário deve ter um número de identificação único.</small>
          <br>
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="search">Gerar</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header" >
            Aqui está o seu cartão de identificação
            </div>
          <div class="card-body" id="mycard">
            <?php echo $html ?>
          </div>
          <br>
          
      </div>
    </div>
  <hr>
  <button id="demo" class="downloadtable btn btn-primary" onclick="downloadtable()"> Download Cartão de Identificação</button>
  <!-- ===== Generate Card End ===== -->
  <!-- ===== JS Start ===== -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="assets/js/id_card.js"></script>
  <!-- ===== JS End ===== --> 
</body>
</html>

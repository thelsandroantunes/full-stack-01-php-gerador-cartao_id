<?php

// Conecte-se ao banco de dados
include('config.php');

$insert = false;
$update = false;
$empty = false;
$delete = false;
$already_card = false;

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `cards` WHERE `sno` = $sno";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
      // Atualizar o registro
        $sno_up = $_POST["snoEdit"];
        $name_up = $_POST["nameEdit"];
        $id_no_up = $_POST["id_noEdit"];

      // Consulta SQL a ser executada
        $sql = "UPDATE `cards` SET `name`=$name_up,`id_no`=$id_no_up WHERE `sno`=$sno_up";
        $result = mysqli_query($conn, $sql);
        print ($result);
        if ($result) {
            $update = true;
        } else {
            echo "Não foi possível atualizar o registro com sucesso";
        }
    } else {
        $name = $_POST["name"];
        $id_no = $_POST["id_no"];
        $department = $_POST["department"];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $exp_date = $_POST['exp_date'];
        $phone = $_POST['phone'];
        $office = $_POST["office"];

        if ($name == '' || $id_no == '') {
            $empty = true;
        } else {
            //Verifica o número do cartão. Se já está cadastrado ou não.
            $querry = mysqli_query($conn, "SELECT * FROM cards WHERE id_no= '$id_no' ");
            if (mysqli_num_rows($querry) > 0) {
                 $already_card = true;
            } else {
              // Atualizar imagem
                $uploaddir = 'assets/uploads/';
                $uploadfile = $uploaddir . basename($_FILES['image']['name']);

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                } else {
                    echo "Possível atualizar upload de arquivo!\n";
                }
                // INSERÇÃO SQL a ser executada
                $sql = "INSERT INTO `cards`(`name`, `id_no`, `email`, `phone`, `address`, `dob`, `exp_date`, `image`, `department`,`office`) VALUES ('$name','$id_no','$email]','$phone','$address','$dob','$exp_date','$uploadfile','$department','$office')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $insert = true;
                } else {
                    echo "O registro não foi inserido com sucesso devido a este erro ---> " . mysqli_error($conn);
                }
            }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <!-- ===== Bootstrap CSS End ===== -->
    
    <title>ID CARTÃO</title>
</head>
<body>
    <!-- ===== Edit Modal Start ===== -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar este Cartão</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <input type="hidden" id="snoEdit" name="snoEdit">
                        <div class="form-group">
                            <label for="name">Nome do Funcionário</label>
                            <input type="text" class="form-control" id="nameEdit" name="nameEdit">
                        </div>
                        <div class="form-group">
                            <label for="desc"> Matrícula</label>
                            <input class="form-control" id="id_noEdit" name="id_noEdit" rows="3"></ipnut>
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ===== Edit Modal End ===== -->
    <!-- ===== Navigation Bar Start ===== -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a href="" class="navbar-brand"><img src="assets/images/logo_3.png" alt=""></a>
        <button class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
                <a class="dropdown-item" href="#">Nova ação</a>
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
    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Sucesso!</strong> Seu cartão foi inserido com sucesso
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
  <?php
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Sucesso!</strong> Seu cartão foi excluído com sucesso
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
  <?php
    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Sucesso!</strong> Seu cartão foi atualizado com sucesso
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
   <?php
    if ($empty) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Os Campos Não Podem Estar Vazios! Por favor, dê alguns valores.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
     <?php
        if ($already_card) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Este cartão já foi adicionado.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
        }
        ?>
    <div class="container my-4">
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa fa-plus"></i> Adicionar novo cartão
        </button>
        <a href="id_card.php" class="btn btn-primary">
            <i class="fa fa-address-card"></i> Gerar cartão de identificação
        </a>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">

            <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Nome do Funcionário</label>
                <input type="text" name="name" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Departamento</label>
                <select id="department" name="department" class="form-control">
                    <option selected>Escolher...</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="RH">RH</option>
                    <option value="TI">TI</option>
                    <option value="Suporte">Suporte</option>
                    <option value="Produção">Produção</option>
                    <option value="Diretoria">Diretoria</option>
                    <option value="Segurança">Segurança</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Aniversário</label>
                <input type="date" name="dob" class="form-control">
            </div>
        </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">Endereço</label>
        <input type="text" name="address" class="form-control">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Email</label>
        <input type="text" name="email" class="form-control">
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Data de Entrada</label>
        <input type="date" name="exp_date" class="form-control">
      </div>
    </div>
      
      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="id_no">Matrícula</label>
          <input class="form-control" id="id_no" name="id_no" ></input>
        </div>
        <div class="form-group col-md-3">
            <label for="office">Cargo</label>
            <input type="text" name="office" class="form-control">
        </div>
        <div class="form-group col-md-4">
          <label for="phone">Telefone</label>
          <input class="form-control" id="phone" name="phone" ></input>
        </div>        
        <div class="form-group col-md-3">
          <label for="photo">Foto</label>
          <input type="file" name="image" />
        </div>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Cartão</button>
    </form>
  </div>
</div>
<div class="container my-4">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Matrícula</th>
          <th scope="col">Cargo</th>
          <th scope="col">Departamento</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT * FROM `cards` order by 1 DESC";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['id_no'] . "</td>
            <td>" . $row['office'] . "</td>
            <td>" . $row['department'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=" . $row['sno'] . ">Editar</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['sno'] . ">Deletar</button>  </td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <hr>
  
  <!-- ===== JS Start ===== -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/index.js"></script>
  <!-- ===== JS End ===== -->
</body>
</html>

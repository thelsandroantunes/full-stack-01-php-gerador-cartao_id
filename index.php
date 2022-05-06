<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ===== Bootstrap CSS Start ===== -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <!-- ===== Bootstrap CSS End ===== -->
    
    <title>CARD ID</title>
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
                            <label for="desc"> ID Cartão</label>
                            <input class="form-control" id="id_noEdit" name="id_noEdit" rows="3"></ipnut>
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Salvar Mudanças</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ===== Edit Modal End ===== -->
    <!-- ===== Navigation Bar Start ===== -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a href="" class="navbar-brand"><img src="" alt=""></a>
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
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
        </div>        
    </nav>
    <!-- ===== Navigation Bar End ===== -->
</body>
</html>
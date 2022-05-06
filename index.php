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
    
    <!-- ===== Navigation Bar End ===== -->
</body>
</html>
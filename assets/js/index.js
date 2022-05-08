$(document).ready(function () {
  $('#myTable').DataTable({
    "language": {
      "emptyTable": "Nenhum registro encontrado",
      "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
      "infoEmpty": "Mostrando 0 até 0 de 0 registros",
      "infoFiltered": "(Filtrados de _MAX_ registros)",
      "infoPostFix": "",
      "infoThousands": ".",
      "lengthMenu": "_MENU_ resultados por página",
      "loadingRecords": "Carregando...",
      "processing": "Processando...",
      "zeroRecords": "Nenhum registro encontrado",
      "search": "Pesquisar",
      "paginate": {
        "next": "Próximo",
        "previous": "Anterior",
        "first": "Primeiro",
        "last": "Último"
      },
      "aria": {
        "sortAscending": ": Ordenar colunas de forma ascendente",
        "sortDescending": ": Ordenar colunas de forma descendente"
      }
    }
  });
});

deletes = document.getElementsByClassName('delete');
Array.from(deletes).forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log("deletar ");
    sno = e.target.id.substr(1);

    if (confirm("Tem certeza de que deseja excluir esta anotação!")) {
      console.log("sim");
      window.location = `index.php?delete=${sno}`;
      // TODO: Crie um formulário e use a solicitação de postagem para enviar um formulário
    }
    else {
      console.log("não");
    }
  })
})

edits = document.getElementsByClassName('edit');
Array.from(edits).forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log("editar");
    tr = e.target.parentNode.parentNode;
    name = tr.getElementsByTagName("td")[0].innerText;
    id_no = tr.getElementsByTagName("td")[1].innerText;

    console.log(name, id_no);
    console.log(e.target.id)

    nameEdit.value = name;
    id_noEdit.value = id_no;
    snoEdit.value = e.target.id;

    $('#editModal').modal('toggle');
  })
})


function downloadtable() {

  var node = document.getElementById('mycard');

  domtoimage.toPng(node)
    .then(function (dataUrl) {
      var img = new Image();
      img.src = dataUrl;
      downloadURI(dataUrl, "staff-id-card.png")
    })
    .catch(function (error) {
      console.error('oops, algo deu errado', error);
    });

}

function downloadURI(uri, name) {
  var link = document.createElement("a");
  link.download = name;
  link.href = uri;
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
  delete link;
}

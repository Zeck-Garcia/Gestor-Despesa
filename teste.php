<?php

echo "teste";

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-3">
        <button class="btn btn-info btn-seguir" meu-id="1" id-pessoa="2">Seguir</button>
      </div>
    </div>
  </div>
</body>
</html>
<script type="text/javascript">
  $(".btn-seguir").click(function(){
    //Ação de click no botão

    //pega os atributos dos botões e salva em variáveis
    let meu_id = $(this).attr("meu-id");
    let id_pessoa = $(this).attr("id-pessoa");

    //faz a requisição para o link atribuido em url,
    //com os dados atribuidos em data,
    //e com o método atribuido em type
    $.ajax({
      type: "POST",
      data:{
        "meu-id": meu_id,
        "id_pessoa": id_pessoa 
      },
      url: "link que faz seguir com PHP",
      success: function(){
        //Caso a requisição funcione(O ajax retorna o código 200);
        alert("Você está seguindo Fulano agora");
      }
    });

  });
</script>

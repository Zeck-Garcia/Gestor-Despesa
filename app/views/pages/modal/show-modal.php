<?php


echo $novo1 = $_POST["vai"];
echo $novo2 = $_POST["statusModal"];

?>


<script>

async function listTesteAgora(id_produto){
      console.log("Será será será " + id_produto);
      
      // const dadoListar = await this("index.php?page=list-despesa" + "&id=" + id_produto);
      // const dadoListar = await fetch("index.php?page=list-despesa" + "&id=" + id_produto);
      

      // const respostaProd = await dadoListar.length;
      const listarJanelaModal = await new bootstrap.Modal(document.querySelector(".modal"));
      
      listarJanelaModal.show();

      var statusModal = await document.querySelector(".statusModal");
      statusModal.value = id_produto;
    }


</script>
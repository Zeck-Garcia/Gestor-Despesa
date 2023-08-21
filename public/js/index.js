document.addEventListener("DOMContentLoaded", function(event) {
   
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    // show navbar
    nav.classList.toggle('show')
    // change icon
    toggle.classList.toggle('bx-x')
    // add padding to body
    bodypd.classList.toggle('body-pd')
    // add padding to header
    headerpd.classList.toggle('body-pd')
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
     // Your code to run since DOM is loaded and ready
    });



    // const btn = document.querySelector("#submit");

    // const btnAcao = document.querySelectorAll(".btnAcao");
    // for(var i = 0 ; i < btnAcao.length; i++){
    //   btnAcao.addEventListener("click", function(e) {
    //     e.preventDefault();
    //   });
    // };

      let btnShowModal = document.querySelectorAll(".btnShowModal");
  
      for(var i = 0 ; i < btnShowModal.length; i++){
        btnShowModal[i].addEventListener("click", function showModal(){
          $('.modal').modal('show');   
        });
      };
    
     
      let btnCloseModal = document.querySelectorAll(".btnCloseModal");
      
      for(var i = 0 ; i < btnCloseModal.length; i++){
        btnCloseModal[i].addEventListener('click', function(){
          $('.modal').modal('hide');
          downdateUrl(oldUrl)
        });
      };


    // function submit(){
    //   document.querySelector(".agora").submit()
    //   alert("deu bom")
    // }



    async function listTeste(id_produto){
      console.log("deu bom na busca dos dados " + id_produto);
      
      // const dadoListar = await this("index.php?page=list-despesa" + "&id=" + id_produto);
      // const dadoListar = await fetch("index.php?page=list-despesa" + "&id=" + id_produto);
      

      // const respostaProd = await dadoListar.length;
      const listarJanelaModal = await new bootstrap.Modal(document.querySelector(".modal"));
      
      listarJanelaModal.show();

      var statusModal = await document.querySelector(".statusModal");
      statusModal.value = id_produto;
    }


async function updateUrl(newUrl){
  oldUrl = await document.URL;
  await history.pushState(null, null, newUrl);
}

function downdateUrl(oldUrl1){
  history.pushState(null, null, oldUrl1);

}

$('.modal').on('hidden.bs.modal', function (e) {
  downdateUrl(oldUrl)
})

// function downdateUrl(oldUrl){
//   history.pushState(null, null, oldUrl);
// }

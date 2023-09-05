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

  //   btnAcao = document.getElementsByTagName("form");
  //  for(var i = 0 ; i < btnAcao.length; i++){
  //     btnAcao[i].addEventListener('submit', function(e) {
  //       console.log('02')
  //       // e.preventDefault();
  //       console.log('01')

  //     });
  //   };

    // function submitForm(event){
    //   console.log('01')
    //   event.preventDefault();
    //   console.log('02')
    //   window.history.back();
    //   console.log('03')

    // }

      let btnShowModalDespesa = document.querySelectorAll(".btnShowModal");
  
      for(var i = 0 ; i < btnShowModalDespesa.length; i++){
        btnShowModalDespesa[i].addEventListener("click", function showModal(){
          $('.ModalCadastroDespesa').modal('show');   
        });
      };
  
      
      let btnCloseModal = document.querySelectorAll(".btnShowModalDespesa");
      
      for(var i = 0 ; i < btnCloseModal.length; i++){
        btnCloseModal[i].addEventListener('click', function(){
          $('.ModalCadastroDespesa').modal('hide');
          // downdateUrl(oldUrl)
          
        });
      };
      

      // let btnCloseModalMsgInBox = document.querySelectorAll(".btnCloseModal");
      
      // for(var i = 0 ; i < btnCloseModalMsgInBox.length; i++){
      //   btnCloseModalMsgInBox[i].addEventListener('click', function(){
      //     $('.ModalMsgInBox').modal('hide');
      //     // downdateUrl(oldUrl)
      //   });
      // };

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

$('.modal').on('hidden.bs.modal', function (e) {
  if(oldUrl != null){
    function downdateUrl(oldUrl){
      history.pushState(null, null, oldUrl);
    }
  downdateUrl(oldUrl)
  }
})

// function downdateUrl(oldUrl){
//   history.pushState(null, null, oldUrl);
// }

for(var i = 0 ; i < btnCloseModal.length; i++){
  btnCloseModal[i].addEventListener('click', function(){
    $('.ModalCadastroDespesa').modal('hide');
    // downdateUrl(oldUrl)
    
  });
};


//LIMPANDO DADOS DO FORM

function limparForm(){
    var elements = document.getElementsByTagName("input");
    for (var i=0; i < elements.length; i++) {
        if (elements[i].type == "hidden") {
          elements[i].value = "";
        } 

        if (elements[i].type == "text") {
            elements[i].value = "";
        } 
        else if (elements[i].type == "radio"){
            elements[i].checked = false;  
        }
        else if (elements[i].type == "checkbox"){
            elements[i].checked = false;
        }
        else if (elements[i].type == "select") {
            elements[i].selectedIndex = 0;
        } 
        console.log('03')
    }
}

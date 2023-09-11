// form = document.getElementsByTagName("form")

// for(var i = 0 ; i < form.length ; i++){
//   form[i].addEventListener("submit", function(e){
//     e.preventDefault()
//     form.submit()
//   })
// }


// VER CLICK NO BTN EXCLUIR
// $(document).ready(function(){
//   $('.btnModalMsgInBox').click(function(ev){
//     var href = $(this).attr('href');
//     console.log(href)
//     console.log("01")
//     $('.modalMsgInBox').modal('show'); 
//     // $('.id').val(href)
// 		return false;
		
// 	});
// });


//CHAMA MODAL CONFIRMAR EXCLUSÃO
divModalBackdrop = document.querySelector('.modal-backdrop')
divmodalMsgInBox = document.querySelector('.modalMsgInBox')

btnCloseModalMsgInBox = document.querySelectorAll('.btnCloseModalMsgInBox');

for(var i = 0 ; i < btnCloseModalMsgInBox.length; i++){
  btnCloseModalMsgInBox[i].addEventListener('click', function(){
    $('.modalMsgInBox').modal('hide');
    $('.modal-backdrop').modal('hide');
    divmodalMsgInBox.parentNode.removeChild(divmodalMsgInBox)
    divModalBackdrop.parentNode.removeChild(divModalBackdrop)
  });
};


$('#modalMsgInBox').on('hidden.bs.modal', function (e) {
  $('.modalMsgInBox').modal('hide');
  $('.modal-backdrop').modal('hide');
})


    // //SHOW MODAL
      let btnShowModal = document.querySelectorAll(".btnShowModal");
  
      for(var i = 0 ; i < btnShowModal.length; i++){
        btnShowModal[i].addEventListener("click", function showModal(){
          $('.modalShow').modal('show');   
        });
      };
  
    //   // HIDE MODAL
      let btnCloseModal = document.querySelectorAll(".btnCloseModal");
      
      for(var i = 0 ; i < btnCloseModal.length; i++){
        btnCloseModal[i].addEventListener('click', function(){
          $('.modalShow').modal('hide');
          // downdateUrl(oldUrl)
          
        });
      };


// $(document).on('submit','.form',function(){
//   $("input").val("");
//   $("textarea").val("");
// });


$(document).ready(function () {
  $('.buton_adauga_activitate').click(function (event) {


    event.preventDefault();
    
    var buttonId = $(this).attr('id'); 
    var inputId = 'input_adauga_activitate' + buttonId.substring(23);
    var selectId = 'select_adauga_activitate' + buttonId.substring(23);

    var input = $("#" + inputId).val(); 
    var select = $("#" + selectId).val(); 
    var span = $('#span-cu-data');
      var spanText = span.text();
      var numberDiv = document.querySelector('.number-div');
      if (numberDiv) {
        var text_ora = numberDiv.textContent;
        console.log(text_ora);
      }
      

   
    $(this).prop('disabled', true);
    $(this).off('click');
   
    var buton=$(this);
    $.ajax({
      type: 'POST',
      url: 'insert_activitate.php',
      data: {
        input: input,
        select: select,
        spanText:spanText,
        text_ora:text_ora
      },
      success: function (response) {
        console.log(response);
        buton.prop('disabled',false);
      },
      error: function (xhr, status, error) {
        console.log(xhr);
        console.log(status);
        console.log(error);
        buton.prop('disabled',false);
      }
    });
  });
});

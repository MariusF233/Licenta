$(document).ready(function() {
    $('.zile').on('click', 'button#buton-zi', function(event) {

      event.preventDefault();
      
      var buttonValue = $(this).text();

      // Select the span element by its ID
      var span = $('#span-cu-data');
      var spanText = span.text();
    var endIndex = spanText.indexOf(' '); // Find the index of the first space
    var newText = buttonValue + spanText.substring(endIndex); // Concatenate the new word with the remaining text
    span.text(newText);
    });
  });

  
  
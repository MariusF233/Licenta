function showForm(formId, buttonId) {
  var form = document.getElementById(formId);
  var button = document.getElementById(buttonId);
  var buttonRect = button.getBoundingClientRect();
  form.style.top = buttonRect.top+ buttonRect.height + "5px";
  form.style.left = buttonRect.left + "5px";
  form.classList.add("show");

 
  // Extract the number from formId
  var number = formId.match(/\d+$/)[0];

  // Find the parent div with class "lista-ore-header"
  var parentDiv = document.querySelector(".lista-ore-header");
  
  // Remove any existing div with the number
  var existingDiv = parentDiv.querySelector(".number-div");
  if (existingDiv) {
    parentDiv.removeChild(existingDiv);
  }
  
  // Create a new div with the extracted number
  var div = document.createElement("div");
  div.classList.add("number-div");
  div.textContent = number;

  // Append the new div with the number to the parent div
  parentDiv.appendChild(div);
  
  var forms = document.getElementsByClassName("popup_form");
  for (var i = 0; i < forms.length; i++) {
    if (forms[i].id !== formId) {
      forms[i].classList.remove("show");
    }
  }

 /* var deleteButton = form.querySelector("#button_delete");
  deleteButton.addEventListener("click", function() {
    // Perform an AJAX request to delete the activity
    $.ajax({
      url: "delete_activity.php",
      method: "POST",
      data: { activityId: number },
      success: function(response) {
        // Response handling code here
        console.log(response);
        // Remove the form element
        parentDiv.removeChild(form);
      },
      error: function(xhr, status, error) {
      
        console.log(xhr);
          console.log(status);
        console.log(error);
      }
    });
  });
*/

}

function hideForm(formId) {
  var form = document.getElementById(formId);
  form.classList.remove("show");
}

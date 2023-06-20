$(document).ready(function() {
    $("#button_delete").click(function() {
      var parentDiv = $(this).parent();
      console.log(parentDiv.attr("id"));
      $.ajax({
        url: "delete_activity.php",
        type: "POST",
        data: {
          activityId: parentDiv.attr("id")
        },
        success: function(response) {
          console.log(response);
          parentDiv.remove();
        },
        error: function(xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
      });
    });
  });
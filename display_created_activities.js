

$.ajax({
    url: 'display_created_activities.php',
    method: 'GET',
  
    success: function(response) {
      var data = JSON.parse(response);
     // var resultDiv = document.getElementById('lista_activitati_create');
      var spanText = document.getElementById('#span-cu-data').textContent;
  
      // Iterate over the data array and create HTML elements
      data.forEach(function(row) {
        if (row.data1 === spanText) {
          var divId='lista_activitati_create'+row.ora;
          var parentDiv=document.getElementById(divId);
          console.log(divId);
          var newDiv = document.createElement('div');
          newDiv.textContent = 'Nume activitate: ' + row.nume_activitate + ', Tip activitate: ' + row.tip_activitate+'data:'+row.data1;
          parentDiv.appendChild(newDiv);
        }
      });
    },
  
    error: function(xhr, status, error) {
      console.log(xhr);
      console.log(status);
      console.log(error);
    }
  });
  
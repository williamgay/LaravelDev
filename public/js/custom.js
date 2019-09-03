$(document).ready(function(){

  if($(".alert-success").length > 0){
  $(".alert-success").delay(3000).slideUp();
  }
      $('.delete-project').click(function(e){
          e.preventDefault() // Don't post the form, unless confirmed
          if (confirm('Are you sure?')) {
              // Post the form
              $(e.target).closest('form').submit() // Submit the form and delete the project
          }
      });
});

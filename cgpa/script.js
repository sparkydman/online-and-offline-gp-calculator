$(document).ready(function(){

       // $("#myTable").dataTable();
       // $("#myTable1").dataTable();
       // $("#tablestyle").dataTable();
  
                $(function(){
                  $('#registercourse').click(function(){
                    $('#change_password').hide();
                      $('#checkresult').hide();
                    $('#transcript').hide();
                    
                    $('#emptydiv').hide();
                    $('#registrationcourse').show();
                  });
                
                  $('#changepassword').click(function(){
                    $('#registrationcourse').hide();
                
                    $('#emptydiv').hide();
                    $('#checkresult').hide();
                    $('#transcript').hide();
                    

                    $('#change_password').show();

                  });
          
                $('#print_transcript').click(function(){
                    //document.location.reload(true);
                    $('#registrationcourse').hide();
                
                    $('#emptydiv').hide();
                    $('#change_password').hide();
                    $('#checkresult').hide();

                    $('#transcript').show();

                  });
                  
        
              $('#chkresult').click(function(){
                    $('#registrationcourse').hide();
                
                    $('#emptydiv').hide();
                    $('#change_password').hide();
                    $('#transcript').hide();

                    $('#checkresult').show();

                  });
                  
                });

               
              });
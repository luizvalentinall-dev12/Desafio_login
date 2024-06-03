$(document).ready(function() {
  validateLogin();
});
function validateLogin(){
    $('#formLogin').on('submit', function(event){
      event.preventDefault();

      const username =$('#username').val();
      const password = $('#password').val();
      const userCrendentialsReturn = $('#userCrendentialsReturn');
    $.ajax({
        method: "POST",
        url: "login.php",
        data: { 
          username: username,
          password: password,
        },
        success: function(data){
          if(data.status == '200'){
            window.location.href = '/home.php';
          }else{
            userCrendentialsReturn.text(data.msg);
          }
        },
      });
    });
}

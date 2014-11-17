<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
<head>
<title>Welcome</title>
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var redirectString = "<?php if(isset($redirect)) { echo $redirect; } ?>";
            if(redirectString.length > 0) {
                alert("user is logged in");
                setTimeout(function(){
                    location.href = "<?php if(isset($redirect)) { echo $redirect; } ?>";
                },500);
            }
        });
       
        
//    $(document).ready(function(){//alert("sarvesh");
//        $('#button12').click(function(){
//           var user_name = $("#username12").val();
//           var user_password = $("#password12").val();
//         if(user_password==='' || user_password.length >='15'){
//             alert("Please insert the password");
//             return false;
//         }
//         if(user_name===''){
//              alert('please insert valid username');
//              return false;
//         }
//         return true;
//       }); 
//      });
//       $(document).ready(function(){//alert("sarvesh");
//        $('#button').click(function(){
//           var user_name = $("#username").val();
//           var user_password = $("#password").val();
//         if(user_password==='' || user_password.length >='15'){
//             alert("Please insert the password");
//             return false;
//         }
//         if(user_name===''){
//              alert('please insert valid username');
//              return false;
//         }
//        return true;
//         
//       }); 
//      });
      
    </script>
</head>
<body  class="body">
   <div class="body_content">
<center>
    <form action='<?php echo base_url();?>welcome/signup' method='post' name='process'>
  <table border="0" width="600" height="130" cellpadding="5" cellspacing="5" class="table-1">
      <tr><td colspan="2"><b>For New User:</b></td></tr>
    <tr>
        <td align="right" > Username: </td>
      <td colspan="2"><input type='text' name='username' id='username' size='25' class="txt-input" />
      </td>
    </tr>
    <tr>
      <td align="right"> Password: </td>
      <td colspan="2"><input type='password' name='password' id='password' size='25' class="txt-input" />
      </td>
    </tr>
      <tr>
      <td align="right"> Address: </td>
      <td colspan="2"><input type='text' name='address' id='address' size='25' class="txt-input" />
      </td>
    </tr>
      <tr>
      <td align="right"> Mobile number: </td>
      <td colspan="2"><input type='password' name='phone' id='phone' size='25' class="txt-input" />
      </td>
    </tr>
      <tr>
      <td align="right"> Email: </td>
      <td colspan="2"><input type='email' name='email' id='email' size='25' class="txt-input" />
      </td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="submit" name="button" id="button" value="Enter" />
      </td>
    </tr>
  </table>
  </form>
</center>
    </div>
    
</body>
</html>



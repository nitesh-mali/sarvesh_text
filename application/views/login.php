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
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/jquery-ui.css" />
<script type="text/javascript">
//        $(document).ready(function(){
//            var redirectString = "<?php //if(isset($redirect)) { echo $redirect; } ?>";
//            if(redirectString.length > 0) {
//                alert("user is logged in");
//                setTimeout(function(){ 
//                location.href = "<?php //if(isset($redirect)) { echo $redirect; } ?>";
//                },500);
//            }
//        });
        $(document).ready(function(){
        //alert('hfcgdsajfghdkj');
                        var site_url = '<?php echo base_url();?>';
                        $("#username12").autocomplete({
                        source:site_url+"welcome/text_match",
                        minLength:1
                    });
                });
                
       function checkinfo(){ 

       document.getElementById("fade").style.display="block";

       }
       function hide(){
	document.getElementById("fade").style.display="none";
	}
        function sendemail(){//alert("dcfshjafgdj");
            $('#claim').submit();
        }

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
//         var dataString = 'name='+ user_name + '&password=' + user_password;
//         alert(dataString);
//         var site_url = '<?php //echo base_url();?>';
//         //alert(site_url);
//          $.ajax({  //alert('hcdshjfcvsahjkg') ;
//                          
//                          url: site_url+"welcome/ajax_check",
//                          type: "POST",
//                          data: dataString,
//                          success: function(){
//                          //alert('hcdshjfcvsahjkg') ;
//                          alert("yes");
//                          //$("#Errmsg").show().html("Form submitted successfully");
//                          //$("#sidecontactform")[0].reset();
//                                            
//                           }
//                       
//                 });
//       }); 
//      });
      
  $(document).ready(function(){
            
           //$("#contactform").validate();
        
              $("#contactform").validate({
                 rules: {
                   // simple rule, converted to {required:true}
                   username: "required",
                   // compound rule
                   password: {
                      required: true,
                      minlength: 5
                   },
                  
                 },
                messages: {
                 username: "Please enter your name",
                 password: {
                      required: "Please provide a password",
                      minlength: "Your password must be at least 5 characters long"
                 },
                           

              },
            });
               
               
              
 })   ;
  
       function validateCallback()
           {
               var user_name = $("#username12").val();
               var user_password = $("#password12").val();
               //var dataString = 'name='+ user_name + '&password=' + user_password;
               var dataString = $("#form").serialize();
               alert(dataString);
               var site_url = '<?php echo base_url();?>';
               $.ajax({   
                        url: site_url+"welcome/ajax_check", //The url where the server req would we made.
                        async:false,
                        type: "POST", //The type which you want to use: GET/POST
                        data: dataString, //The variables which are going.
                        dataType: "html", //Return data type (what we expect).
                         // console.log(data);
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
                        //data is the html of the page where the request is made.
                        //$('#city').html(data);
                        alert(data);
                        }
                    });
        
           };
           
        
 
       

               //$Errmsg=array();
           //var username = $.trim($("#username12").val());
           //var email = $.trim($("#inputEmail1").val());
           //var phone = $.trim($("#inputPhone1").val());
           //var message = $.trim($("#inputMessage1").val());
            //var password = $.trim($("#password12").val());
           //var dataString = 'name='+ name + '&password=' + password;
           
          // var regfname=/^[a-zA-Z]{4,10}$/;
          // var regemail=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,4}$/;
          // var regage=/^[18,19,20,21,22,23]$/;
          // var regmobile=/^[0-9]{10,10}$/;
           
           //if(name.length==0)
           // {
            //    $("#Errmsg").show().html("Enter your name");
             //   return false;
           // }
           // else if(regfname.test(name)==false)
           // {
              //  $("#Errmsg").show().html("Enter valid name");              
               // return false;
            //}else if (email.length == 0 && phone.length == 0){
               // if(email.length == 0){
                   // $("#Errmsg").show().html("Enter your email id or phone no.");
                   /// return false;
               // }
               // if(phone.length == 0){
                  //  $("#Errmsg").show().html("Enter phone no.");
                  //  return false;
               // }
           // }
            //else if(email.length > 0 && !regemail.test(email)){
              //  $("#Errmsg").show().html("Enter valid email id ");
               // return false;
           // }else if(phone.length > 0 && !regmobile.test(phone)){
             //   $("#Errmsg").show().html("Enter valid phone no.");
               // return false;
           // }
           // else
           // {
                           
                 //$.ajax({
                      //    type: "POST",
                        //  url: "contactmail.php",
                          //data: dataString,
                          //success: function(){
                              
                               //$("#Errmsg").show().html("Form submitted successfully");
                               //$("#sidecontactform")[0].reset();
                                            
                         /// / }
                       
                      // });
          
           // return false;
               // }
           // }
</script>
</head>
<body  class="body">
 <div class="body_content">   
<center>
<form action='<?php echo base_url();?>welcome/login' method='post' name='process' id="contactform" >
  <table border="0" width="600" height="130" cellpadding="5" cellspacing="5" class="table-1">
    <tr>
        <td colspan="2"><b>For Registered User:</b></td>
    </tr>
    <tr>
        <td align="right"> Username: </td>
        <td colspan="2"><input type='text' name='username' id='username12' size='25' class="txt-input" required /></td>
    </tr>
    <tr>
        <td align="right"> Password: </td>
        <td colspan="2"><input type='password' name='password' id='password12' size='25' class="txt-input" required /></td>
    </tr>
      <tr>
        <td align="right"><input type="submit" name="button" id="button12" onclick="validateCallback()" value="Login"  /></td></td>
        <td><input type="button" name="button" id="button123" onclick="checkinfo()" value="Forgot Password ?" ></td>
    </tr>
    <tr>
        <td colspan="3">
            <div class="value" style="color: #006600"><?php echo isset($success) ? $success : "";?><?php echo isset($error) ? $error : "";?></div>
        </td>
    </tr>
 </table>
</form>
    <div class="black_overlay" id="fade">
    <div id="toPopup">
    <div class="close"><a href="javascript:void(0)" onclick="hide();"><img src="<?php echo base_url();?>assets/images/closebox.png" /></a></div>
    <div style=" padding-top:20px;">
    <div class="register">
        <h2>Forgot Password</h2>
        <form action="<?php echo $this->config->item("base_url") ."welcome/resetpassword"; ?>" id="claim" name="claim"  method="POST">
        <hr/>                                 
        <div> <span class="label">Username</span>
        <div style="margin-top: 10px;">
        <input type='text' name='username' id='username' size='25' class="txt-input" />
        </div>
        </div>
                                        
        <div style="margin-top: 10px;">
        <span class="label"><input type="submit" value="Send" class="btn red" onclick="sendemail()"/></span>
        </div>
        </form>
        </div>

    </div>
    </div>
</center>
     
 </div>
</body>
</html>



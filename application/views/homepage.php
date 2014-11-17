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
</head>
<body  class="body">
    <div class="body_content">
<center>
    <?php $root = __NAMESPACE__;echo $root; ?>
    <form action='<?php echo base_url();?>welcome/login_user' method='post' name='process'>
  <table border="0" width="600" height="100" cellpadding="5" cellspacing="5" class="table-1">
      <tr><td><b>Welcome User:</b></td></tr>
    <tr>
      <td align="center"><input type="submit" name="button1" id="button1" value="Login" /></td>
      
    </tr>
      </table>
  </form>
</center>
    <center>
    <form action='<?php echo base_url();?>welcome/signin_user' method='post' name='process'>
  <table border="0" width="600" height="100" cellpadding="5" cellspacing="5" class="table-1">
    <tr>
      <td align="center"> <input type="submit" name="button1" id="button2" value="SignIn" /> </td>
      
    </tr>
  </table>
  </form>
</center>
    </div>
</body>
</html>



<html>
<head>
<title>Upload Form</title>
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript">
     $(document).ready(function(){
  $("#sunmeit_form").click(function(){
       var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
          //alert(val[i]);
        });
        alert(val);
     $("#form1").submit();
     
  });
});
    
</script>
</head>
<body style="background-color: #3333ff;">
   
<form action="<?php echo $this->config->item("base_url");?>newUser/upload_image" method="POST" enctype="multipart/form-data" >
    <label><input type="file" name="file[]" style="width: 200px; float: right; margin-right: 50px;cursor: pointer;" multiple />
    <input type="submit" value="upload" style="float: right; width: 80px; cursor: pointer;" />
    </label>
</form>
    <div style="text-align: right; margin-right: 330px; color: #ffffff;">
        <form action="<?php echo $this->config->item("base_url");?>newUser/logout" method="get" >
    <input type="submit" name="button" id="button" value="Logout" style="cursor: pointer;" />
</form>
        </div>
    <div style="text-align: right; margin-right: 387px; color: #ffffff; margin-top: -42px;">
        <form action="" >
    <input type="button" name="button" id="sunmeit_form" value="delete" style="cursor: pointer;" />
</form>
        
        </div>
    <div style="text-align: right; margin-right: 450px; color: #ffffff; margin-top: -40px;"><?php $usr_name = $this->session->userdata('user');
    echo $usr_name['username'];?></div>
    
    <br /><br />
    <br />
    <form action="<?php echo $this->config->item("base_url");?>newUser/delete" id="form1" method="post" name="form123">
<?php
//print_r($user);

foreach($detail as $key=>$users)
    {
   //print_r ($users);
    //echo "sarvesh";?>
     <?php $this->load->helper('url'); ?>
    <div style="text-align: center;margin-left: 10px; float:left; width: 200px; margin-bottom: 50px;">
        <input lang="hide" name="cblist[]" type="checkbox" value="<?php echo $detail[$key]->images;?>" id="cblist" />
        <img src="<?php echo base_url().'uploads/';?><?php echo $detail[$key]->images;?>" alt="" width="150" height="100"></div>
     <?php // print_r($user[$i]); 
    }
      
    ?>
    </form>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Scanmine Login</title>

<link href="<?php echo base_url(); ?>template/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
  
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading"><?php echo get_phrase('log_in') ?></div>
        <div class="panel-body">
        
          <!-- Response Message. -->       
          <?php $message    = $this->session->flashdata('flashMessage'); ?>
          <?php $message_type = $this->session->flashdata('flashMessageType'); ?>

          <?php if(isset( $message) ): ?>                
              <?php if( $message_type == 'success' ): ?>      
                <div class="alert bg-success alert-message" role="alert">
                  <svg class="glyph stroked checkmark"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use></svg> <?php echo $message;?> <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>        
              <?php endif; ?>
              <?php if( $message_type == 'error' ): ?>      
                <div class="alert bg-danger alert-message" role="alert">
                  <svg class="glyph stroked cancel"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-cancel"></use></svg> <?php echo $message;?> <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
              <?php endif; ?>
          <?php endif; ?>
          <!-- Response Message. -->


          <?php echo form_open('login/checkLogin'); ?>
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="<?php echo get_phrase('username') ?>" name="username" type="text" autofocus="" required />
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="<?php echo get_phrase('password') ?>" name="password" type="password" value="" required />
              </div>  
              <input type="hidden" name="type" value="admin" />           
              <input type="submit" class="btn btn-primary" value="Login"/>
            </fieldset>
          <!-- </form> -->
          <?php form_close();?>
        </div>
      </div>
    </div><!-- /.col-->
  </div><!-- /.row   -->
  
  <!-- Footer section  -->

  <script src="<?php echo base_url(); ?>template/js/jquery-1.11.1.min.js"></script>
  <script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>  
  <script src="<?php echo base_url(); ?>template/js/custom.js"></script>  

</body>

</html>

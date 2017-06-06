<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="<?php echo site_url('css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('css/fileinput.min.css');?>" rel="stylesheet">
  </head>
	<body style="background: #555">
	 	<div class="modal-dialog">
	 		<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Login</h4>
				</div>
				<div class="modal-body">
				<?php echo form_open('','class="form-horizontal" role="form"');?>
					<div class="form-group">
						<label class="control-label col-sm-2">Usuario</label>
						<div class="col-md-10"><?php echo form_input('email','','class="form-control"');?></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Password</label>
						<div class="col-md-10"><?php echo form_password('password','','class="form-control"');?></div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<?php echo form_submit('submit','log in','class="btn btn-primary btn-block"');?>
						</div>
					</div>
				<?php echo form_close();?>
				</div>
	 			<div class="modal-footer">
	 			</div>
	 		</div>
	 	</div>

	  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	  <script src="<?php echo site_url('js/bootstrap.min.js');?>"></script>
	  <script src="<?php echo site_url('js/fileinput.min.js');?>"></script>
  </body>
</html>

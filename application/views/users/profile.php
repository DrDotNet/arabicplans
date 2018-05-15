<Style>
.edit_profile {
    margin-right: 6px;
    width: 120px;
    border-radius: 50%;
}
</style>
		<div class="page-content">
			  <div class="header">
				<h2><strong><?php echo $this->lang->line('My Profile') ?></strong></h2>
				<div class="breadcrumb-wrapper">
				  <ol class="breadcrumb">
					<li><a href="<?php echo base_url()?>admin/dashboard"><?php echo $this->lang->line('Home') ?></a></li>
					<li class="active"><?php echo $this->lang->line('My Profile') ?></li>
					<li class="active"><?php echo $this->lang->line('Edit Profile') ?></li>
				  </ol>
				</div>
			  </div>				
		

				  <div class="row">
					<div class="col-md-12 portlets">
					  <div class="panel">
				

							<form enctype="multipart/form-data" class="form-horizontal form-validation"  method="POST"  action="<?php echo base_url()?>admin/profile/edit_profile">	
							<div class="tab-content">
									<div class="tab-pane active" id="general">
										<fieldset class="content-group">
											<legend class="text-bold"><?php echo $this->lang->line('User Details') ?></legend>
											<!-- Inline checkbox group -->
											<div class="panel-body p-10">
												<div class="col-xs-12" style="text-align: center;">
												<?php if($user->profile_picture != ""){ ?>
												    <img class="edit_profile" style="display: initial;" src="<?php echo base_url().$user->profile_picture ?>" alt="Profile Picture" class="img-responsive">	
												<?php } else { ?>
													<img class="edit_profile" style="display: initial;" src="<?php echo base_url()?>/assets/global/images/avatars/unknown.jpg" alt="UnKnown" class="img-responsive">
												<?php } ?>
												</div>
											</div>
											<input type="hidden" name="user_id" value="<?php echo $user->id ?>" />
											<div class="form-group">
												<label class="control-label col-lg-3"><?php echo $this->lang->line('Full Name') ?> <span class="text-danger">*</span></label>
												<div class="col-lg-9">
													<input type="text" name="data[fullname]" class="form-control" required placeholder="<?php echo $this->lang->line('Enter')." ".$this->lang->line('Full Name') ?>" value="<?php echo $user->fullname ?>">
												</div>
											</div>										
											<div class="form-group">
												<label class="control-label col-lg-3"><?php echo $this->lang->line('User Name') ?> <span class="text-danger">*</span></label>
												<div class="col-lg-9">
													<input type="text" name="data[username]" class="form-control" required placeholder="<?php echo $this->lang->line('Enter')." ".$this->lang->line('User Name') ?>" value="<?php echo $user->username ?>">
												</div>
											</div>	
											<div class="form-group">
												<label class="control-label col-lg-3"><?php echo $this->lang->line('Password') ?> </label>
												<div class="col-lg-9">
													<input type="password" name="data[password]" id="password" minlength="5" maxlength="15" class="form-control"  placeholder="<?php echo $this->lang->line('If Password Unchanged .. Keep It Blank') ?>" value="">
												</div>
											</div>	
											<div class="form-group">
												<label class="control-label col-lg-3"><?php echo $this->lang->line('Confirm Password') ?> </label>
												<div class="col-lg-9">
													<input type="password" name="password2" id="password2" minlength="5" maxlength="15" class="form-control"  placeholder="<?php echo $this->lang->line('If Password Unchanged .. Keep It Blank') ?>" value="">
												</div>
											</div>												
											<div class="form-group">
												<label class="control-label col-lg-3"><?php echo $this->lang->line('Email') ?> <span class="text-danger">*</span></label>
												<div class="col-lg-9">
													<input type="email" name="data[email]" class="form-control" required placeholder="<?php echo $this->lang->line('Enter')." ".$this->lang->line('Email') ?>" value="<?php echo $user->email ?>">
												</div>
											</div>					
											<div class="form-group">
												<label class="control-label col-lg-3"><?php echo $this->lang->line('Mobile') ?> </label>
												<div class="col-lg-9">
													<input type="text" name="data[phone]" class="form-control"  placeholder="<?php echo $this->lang->line('Enter')." ".$this->lang->line('Mobile') ?>" value="<?php echo $user->phone ?>">
												</div>
											</div>		
											<div class="form-group">
												<label class="control-label col-lg-3"><?php echo $this->lang->line('Address') ?> </label>
												<div class="col-lg-9">
													<input type="text" name="data[address]" class="form-control"  placeholder="<?php echo $this->lang->line('Enter')." ".$this->lang->line('Address') ?>" value="<?php echo $user->address ?>">
												</div>
											</div>												

											<?php if(hasPermissionTo("users")){ ?>
											<div class="form-group">
											  <label class="control-label col-lg-3"><?php echo $this->lang->line('User Type') ?> <span class="text-danger">*</span></label>
											  <div class="col-lg-9 option-group">
												<select id="role_id" name="data[role_id]" required>
												  <option value=""><?php echo $this->lang->line('Select Type') ?></option>
												  <?php foreach($roles as $role){ ?>
													<option <?php if($role->id == $user->role_id){echo 'selected';} ?> value="<?php echo $role->id?>"><?php echo $role->name?></option>  
												  <?php } ?>
												</select>
											  </div>
											</div>											
											<div class="form-group">
											  <label class="control-label col-lg-3"><?php echo $this->lang->line('Active') ?></label>
											  <div class="col-lg-9 option-group">
												<label  for="terms" class="m-t-10">
												<input <?php if($user->status == "Active"){echo 'checked';} ?> type="checkbox" name="data[status]" id="status" value="Active" data-checkbox="icheckbox_square-blue"/>
												</label>    
											  </div>
											</div>	
                                            <?php } ?>											
											<div class="form-group">
											  <label class="control-label col-lg-3"><?php echo $this->lang->line('Profile Picture') ?></label>
											  <div class="file">
												<div class="col-lg-9 option-group">
												  <span class="file-button btn-primary"><?php echo $this->lang->line('Choose File') ?></span>
												  <input type="file" class="custom-file" name="data[profile_picture]" id="profile_picture" onchange="document.getElementById('uploader').value = this.value;">
												  <input type="text" class="form-control" id="uploader" placeholder="no file selected" readonly="">
												</div>
											  </div>
											</div>
										</fieldset>
							
									</div>
									
							
									
								</div>	
							<div class="text-right">
								<button type="reset" class="btn btn-default" id="reset"><?php echo $this->lang->line('Reset') ?> <i class="icon-reload-alt position-right"></i></button>
								<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('Save') ?> <i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</form>
						</div>
					</div>
		        </div>				
	        </div>				
     
<script>
$( "#users_permissions" ).addClass( "nav-active active" );
$( "#users" ).addClass( "nav-active active" );
</script>
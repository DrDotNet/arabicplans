	  <div class="container" style="margin-top:50px;min-height: 600px;">
	  
	  
	        <div class="row">
		        <div class="col-sm-12">
			<ol class="breadcrumb breadcrumb-fill2">
				<li><a href="<?php echo base_url()?>"><i class="fa fa-home"></i></a></li>
				<li><a href="<?php echo base_url()?>users">كافة المستخدمين</a></li>
				<li class="active">تعديل بيانات المستخدم</li>
			</ol>
                
          
 					  <div class="panel">
				

							<form enctype="multipart/form-data" class="form-horizontal form-validation"  method="POST"  action="<?php echo base_url()?>users/edit">	
							<div class="tab-content">
									<div class="tab-pane active" id="general">
										<fieldset class="content-group">
											<legend class="text-bold">تفاصيل المستخدم</legend>
											<!-- Inline checkbox group -->
					
											<div class="form-group">
												<label class="control-label col-lg-3">الإسم الكامل <span class="text-danger">*</span></label>
												<div class="col-lg-9">
													<input type="text" name="data[fullname]" class="form-control" required placeholder="أدخل الإسم الكامل" value="<?php echo $user->fullname ?>">
												</div>
											</div>										
									
											<div class="form-group">
												<label class="control-label col-lg-3">كلمة المرور</label>
												<div class="col-lg-9">
													<input type="password" name="data[password]" id="password" minlength="5" maxlength="15" class="form-control"  placeholder="إذا لم تكن تود تغيير كلمة المرور اترك هذه الخانة فارغة" value="">
												</div>
											</div>	
											<div class="form-group">
												<label class="control-label col-lg-3">تأكيد كلمة المرور </label>
												<div class="col-lg-9">
													<input type="password" name="password2" id="password2" minlength="5" maxlength="15" class="form-control"  placeholder="إذا لم تكن تود تغيير كلمة المرور اترك هذه الخانة فارغة" value="">
												</div>
											</div>												
											<div class="form-group">
												<label class="control-label col-lg-3">البريد الإلكتروني <span class="text-danger">*</span></label>
												<div class="col-lg-9">
													<input type="email" name="data[email]" class="form-control" required placeholder="أدخل البريد الإلكتروني" value="<?php echo $user->email ?>">
												</div>
											</div>					
										
											<div class="form-group">
											  <label class="control-label col-lg-3">نوع المستخدم <span class="text-danger">*</span></label>
											  <div class="col-lg-9 option-group">
												<select id="type" name="data[type]" class="form-control" required>
												  <option value="">اختر نوع المستخدم</option>
													<option <?php if($user->type == "Admin" ){echo "selected";} ?> value="Admin">أدمن رئيسي</option> 
                                                    <option <?php if($user->type == "End User" ){echo "selected";} ?> value="End User">مستخدم عادي</option> 													
												</select>
											  </div>
											</div>											
											<div class="form-group">
											  <label class="control-label col-lg-3">الحالة</label>
											  <div class="col-lg-9 option-group">
												<label  for="terms" class="m-t-10">
												<input type="checkbox" name="data[status]" <?php if($user->status == "Active" ){echo "checked";} ?> id="status" value="Active" data-checkbox="icheckbox_square-blue"/>
												</label>    
											  </div>
											</div>											
											
										</fieldset>
							
							        <input type="hidden" name="user_id" value="<?php echo $user->id ?>" />
									</div>
									
							
									
								</div>	
							<div class="text-left">
								<button type="submit" class="btn btn-primary">حفظ </button>
							</div>
						</form>
						</div>          
           

				  
		        </div>
	        </div> <!-- row -->
	    </div> <!--  big container -->		
		

		
		

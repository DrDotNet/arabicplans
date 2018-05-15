	  <div class="container" style="margin-top:50px;min-height: 600px;">
	  
	  
	        <div class="row">
		        <div class="col-sm-12">
			<ol class="breadcrumb breadcrumb-fill2">
				<li><a href="<?php echo base_url()?>"><i class="fa fa-home"></i></a></li>
				<li><a href="<?php echo base_url()?>mainsectors">كافة القطاعات الرئيسية</a></li>
				<li class="active">أضف قطاع رئيسي جديد</li>
			</ol>
                
          
 					  <div class="panel">
				

							<form enctype="multipart/form-data" class="form-horizontal form-validation"  method="POST"  action="<?php echo base_url()?>mainsectors/add">	
							<div class="tab-content">
									<div class="tab-pane active" id="general">
										<fieldset class="content-group">
											<legend class="text-bold">تفاصيل القطاع الرئيسي</legend>
											<!-- Inline checkbox group -->
					
											<div class="form-group">
												<label class="control-label col-lg-3">اسم القطاع الرئيسي <span class="text-danger">*</span></label>
												<div class="col-lg-9">
													<input type="text" name="data[main_sector_name]" class="form-control" required placeholder="أدخل اسم القطاع الرئيسي" value="">
												</div>
											</div>										
									
											<div class="form-group">
												<label class="control-label col-lg-3">وصف عن القطاع الرئيسي</label>
												<div class="col-lg-9">
													<textarea name="data[main_sector_description]" id="main_sector_description" rows="5"  class="form-control" placeholder="أدخل وصف عن القطاع الرئيسي" ></textarea>
												</div>
											</div>	
																					
											
										</fieldset>
							
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
		

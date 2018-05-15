	  <div class="container" style="margin-top:50px;min-height: 600px;">
	  
	  
	        <div class="row">
		        <div class="col-sm-12">
			<ol class="breadcrumb breadcrumb-fill2">
				<li><a href="<?php echo base_url()?>"><i class="fa fa-home"></i></a></li>
				<li><a href="<?php echo base_url()?>subsectors">كافة القطاعات الفرعية</a></li>
				<li class="active">أضف قطاع فرعي جديد</li>
			</ol>
                
          
 					  <div class="panel">
				

							<form enctype="multipart/form-data" class="form-horizontal form-validation"  method="POST"  action="<?php echo base_url()?>subsectors/add">	
							<div class="tab-content">
									<div class="tab-pane active" id="general">
										<fieldset class="content-group">
											<legend class="text-bold">تفاصيل القطاع الفرعي</legend>
											<!-- Inline checkbox group -->
					
											<div class="form-group">
												<label class="control-label col-lg-3">اسم القطاع الفرعي <span class="text-danger">*</span></label>
												<div class="col-lg-9">
													<input type="text" name="data[sub_sector_name]" class="form-control" required placeholder="أدخل اسم القطاع الفرعي" value="">
												</div>
											</div>										
											<div class="form-group">
												<label class="control-label col-lg-3">اسم القطاع الرئيسي<span class="text-danger">*</span></label>
												<div class="col-lg-9">
                                                  <select class="form-control" name="data[main_sector_id]" required>
												    <option value="">اختر القطاع الرئيسي</option>
													<?php foreach($main_sectors as $main_sector){ ?>
													<option value="<?php echo $main_sector->main_sector_id ?>"><?php echo $main_sector->main_sector_name ?></option>
													<?php } ?>
												  
												  </select>
												</div>
											</div>										
											<div class="form-group">
												<label class="control-label col-lg-3">وصف عن القطاع الفرعي</label>
												<div class="col-lg-9">
													<textarea name="data[sub_sector_description]" id="sub_sector_description" rows="5"  class="form-control" placeholder="أدخل وصف عن القطاع الفرعي" ></textarea>
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
		

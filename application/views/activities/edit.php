	  <div class="container" style="margin-top:50px;min-height: 600px;">
	  
	  
	        <div class="row">
		        <div class="col-sm-12">
			<ol class="breadcrumb breadcrumb-fill2">
				<li><a href="<?php echo base_url()?>"><i class="fa fa-home"></i></a></li>
				<li><a href="<?php echo base_url()?>activities">كافة الأنشطة الإقتصادية</a></li>
				<li class="active">تعديل النشاط الإقتصادي</li>
			</ol>
                
          
 					  <div class="panel">
				

							<form enctype="multipart/form-data" class="form-horizontal form-validation"  method="POST"  action="<?php echo base_url()?>activities/edit">	
							<div class="tab-content">
									<div class="tab-pane active" id="general">
										<fieldset class="content-group">
											<legend class="text-bold">تفاصيل النشاط الإقتصادي</legend>
											<!-- Inline checkbox group -->
					
											<div class="form-group">
												<label class="control-label col-lg-3">اسم النشاط الإقتصادي <span class="text-danger">*</span></label>
												<div class="col-lg-9">
													<input type="text" name="data[activity_name]" class="form-control" required placeholder="أدخل اسم النشاط الإقتصادي" value="<?php echo $activity->activity_name ?>">
												</div>
											</div>										
											<div class="form-group">
												<label class="control-label col-lg-3">اسم القطاع الرئيسي <span class="text-danger">*</span></label>
												<div class="col-lg-9">
                                                  <select class="form-control" name="data[main_sector_id]" id="main_sector_id" required>
												    <option value="">اختر القطاع الرئيسي</option>
													<?php foreach($main_sectors as $main_sector){ ?>
													<option <?php if($main_sector->main_sector_id == $activity->main_sector_id){echo "selected";}?> value="<?php echo $main_sector->main_sector_id ?>"><?php echo $main_sector->main_sector_name ?></option>
													<?php } ?>												  
												  </select>
												</div>
											</div>		
											<div class="form-group">
												<label class="control-label col-lg-3">اسم القطاع الفرعي <span class="text-danger">*</span></label>
												<div class="col-lg-9">
                                                  <select class="form-control" name="data[sub_sector_id]" id="sub_sector_id" required>
												    <option value="">اختر القطاع الفرعي</option>
													<?php foreach($sub_sectors as $sub_sector){ ?>
													<option class="<?php echo $sub_sector->main_sector_id ?>" <?php if($sub_sector->sub_sector_id == $activity->sub_sector_id){echo "selected";}?> value="<?php echo $sub_sector->sub_sector_id ?>"><?php echo $sub_sector->sub_sector_name ?></option>
													<?php } ?>												  
												  </select>
												</div>
											</div>												
											<div class="form-group">
												<label class="control-label col-lg-3">شرح عن النشاط الإقتصادي</label>
												<div class="col-lg-9">
													<textarea name="data[activity_description]" id="activity_description" rows="5"  class="form-control" placeholder="أدخل شرح عن النشاط الإقتصادي" ><?php echo $activity->activity_description ?></textarea>
												</div>
											</div>	
																					
											
										</fieldset>
							
							        <input type="hidden" name="activity_id" value="<?php echo $activity->activity_id ?>" />
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
		

<script>
;(function($, window, document, undefined) {
    "use strict";

    $.fn.chained = function(parent_selector, options) {

        return this.each(function() {

            /* Save this to child because this changes when scope changes. */
            var child   = this;
            var backup = $(child).clone();

            /* Handles maximum two parents now. */
            $(parent_selector).each(function() {
                $(this).bind("change", function() {
                    updateChildren();
                });

                /* Force IE to see something selected on first page load, */
                /* unless something is already selected */
                if (!$("option:selected", this).length) {
                    $("option", this).first().attr("selected", "selected");
                }

                /* Force updating the children. */
                updateChildren();
            });

            function updateChildren() {
                var trigger_change = true;
                var currently_selected_value = $("option:selected", child).val();

                $(child).html(backup.html());

                /* If multiple parents build classname like foo\bar. */
                var selected = "";
                $(parent_selector).each(function() {
                    var selectedClass = $("option:selected", this).val();
                    if (selectedClass) {
                        if (selected.length > 0) {
                            if (window.Zepto) {
                                /* Zepto class regexp dies with classes like foo\bar. */
                                selected += "\\\\";
                            } else {
                                selected += "\\";
                            }
                        }
                        selected += selectedClass;
                    }
                });

                /* Also check for first parent without subclassing. */
                /* TODO: This should be dynamic and check for each parent */
                /*       without subclassing. */
                var first;
                if ($.isArray(parent_selector)) {
                    first = $(parent_selector[0]).first();
                } else {
                    first = $(parent_selector).first();
                }
                var selected_first = $("option:selected", first).val();

                $("option", child).each(function() {
                    /* Remove unneeded items but save the default value. */
                    if ($(this).hasClass(selected) && $(this).val() === currently_selected_value) {
                        $(this).prop("selected", true);
                        trigger_change = false;
                    } else if (!$(this).hasClass(selected) && !$(this).hasClass(selected_first) && $(this).val() !== "") {
                        $(this).remove();
                    }
                });

                /* If we have only the default value disable select. */
                if (1 === $("option", child).size() && $(child).val() === "") {
                    $(child).prop("disabled", true);
                } else {
                    $(child).prop("disabled", false);
                }
                if (trigger_change) {
                    $(child).trigger("change");
                }
            }
        });
    };

    /* Alias for those who like to use more English like syntax. */
    $.fn.chainedTo = $.fn.chained;

    /* Default settings for plugin. */
    $.fn.chained.defaults = {};

})(window.jQuery || window.Zepto, window, document);
 $(document).ready(function(){
    $("#sub_sector_id").chained("#main_sector_id");
 });

</script> 		
		

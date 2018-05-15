<style>
.control-label{margin-bottom:10px !important;}
</style>
	    <!--   Big container   -->
	    <div class="container" style="min-height: 600px;">
	        <div class="row">
		        <div class="col-sm-12">

				<div class="home_section">
		          <div class="col-md-8 col-lg-8 col-sm-12" style="border-left: 1px solid #e8e7e3;">
				   <h1>المعلومات الأساسية للمشروع</h1>
				   <!--<div class="scrollbar" id="style-3">
                      <div class="force-overflow"> -->
							<form enctype="multipart/form-data" class="form-horizontal form-validation"  method="POST"  action="<?php echo base_url()?>plans/add">	
							<div class="tab-content" style="direction: rtl;">
									<div class="tab-pane active" id="general">
										<fieldset class="content-group">
											<!-- Inline checkbox group -->
					
											<div class="form-group">
												<label class="control-label col-lg-12">اسم المشروع </label>
												<div class="col-lg-12">
													<input type="text" data-desc="شرح عن اسم المشروع يظهر في هذه الخانة" name="data[project_name]" class="form-control" required placeholder="أدخل اسم المشروع" value="">
												</div>
											</div>										
									
											<div class="form-group">
												<label class="control-label col-lg-12">اسم صاحب المشروع </label>
												<div class="col-lg-12">
													<input type="text" data-desc="شرح عن اسم صاحب المشروع يظهر في هذه الخانة" name="data[person_name]" class="form-control" required placeholder="أدخل اسم صاحب المشروع" value="">
												</div>
											</div>	
											
                                           <div class="col-lg-6" style="padding-right:0">											
											<div class="form-group">
												<label class="control-label col-lg-12">الدولة </label>
												<div class="col-lg-12">
													<input type="text" data-desc="شرح عن الدولة يظهر في هذه الخانة" name="data[country]" class="form-control" required placeholder="أدخل اسم الدولة" value="">
												</div>
											</div>	
                                          </div>	
                                           <div class="col-lg-6" style="padding-left:0">											
											<div class="form-group">
												<label class="control-label col-lg-12">المدينة </label>
												<div class="col-lg-12">
													<input type="text" data-desc="شرح عن المدينة يظهر في هذه الخانة" name="data[city]" class="form-control" required placeholder="أدخل اسم المدينة" value="">
												</div>
											</div>	
                                          </div>
											<div class="form-group">
												<label class="control-label col-lg-12">تاريخ إقامة المشروع </label>
												<div class="col-lg-12">
													<input type="date" data-desc="شرح عن تاريخ إقامة المشروع يظهر في هذه الخانة" name="data[project_date]" class="form-control" required placeholder="" value="">
												</div>
											</div>											  

                                           <div class="col-lg-6" style="padding-right:0">											
											<div class="form-group">
												<label class="control-label col-lg-12">الموقع الإلكتروني </label>
												<div class="col-lg-12">
													<input type="text" data-desc="شرح عن الموقع الإلكتروني يظهر في هذه الخانة" name="data[website]" class="form-control" required placeholder="أدخل الموقع الإلكتروني" value="">
												</div>
											</div>	
                                          </div>	
                                           <div class="col-lg-6" style="padding-left:0">											
											<div class="form-group">
												<label class="control-label col-lg-12">البريد الإلكتروني </label>
												<div class="col-lg-12">
													<input type="email"  data-desc="شرح عن البريد الإلكتروني يظهر في هذه الخانة" name="data[email]" class="form-control" required placeholder="أدخل البريد الإلكتروني" value="">
												</div>
											</div>	
                                          </div>

											<div class="form-group">
												<label class="control-label col-lg-12">رقم الهاتف </label>
												<div class="col-lg-12">
													<input type="text" data-desc="شرح عن رقم الهاتف يظهر في هذه الخانة" name="data[phone]" class="form-control" required placeholder="أدخل رقم الهاتف" value="">
												</div>
											</div>	

											<div class="form-group">
												<label class="control-label col-lg-12">القطاع الذي يعمل به المشروع </label>
												<div class="col-lg-12">
                                                  <select class="form-control" name="data[main_sector_id]" id="main_sector_id" data-desc="شرح عن القطاع الذي يعمل به المشروع يظهر في هذه الخانة" required>
												    <option value="">اختر القطاع الرئيسي</option>
													<?php foreach($main_sectors as $main_sector){ ?>
													<option value="<?php echo $main_sector->main_sector_id ?>"><?php echo $main_sector->main_sector_name ?></option>
													<?php } ?>
												  
												  </select>
												</div>
											</div>		
											<div class="form-group">
												<label class="control-label col-lg-12"> القطاع الفرعي </label>
												<div class="col-lg-12">
                                                  <select class="form-control" data-desc="شرح عن القطاع الفرعي يظهر في هذه الخانة" name="data[sub_sector_id]" id="sub_sector_id" required>
												    <option value="">اختر القطاع الفرعي</option>
													<?php foreach($sub_sectors as $sub_sector){ ?>
													<option class="<?php echo $sub_sector->main_sector_id ?>" value="<?php echo $sub_sector->sub_sector_id ?>"><?php echo $sub_sector->sub_sector_name ?></option>
													<?php } ?>
												  
												  </select>
												</div>
											</div>	
											<div class="form-group">
												<label class="control-label col-lg-12"> النشاط الإقتصادي </label>
												<div class="col-lg-12">
                                                  <select class="form-control" data-desc="شرح عن النشاط الإقتصادي يظهر في هذه الخانة" name="data[activity_id]" id="activity_id" required>
												    <option value="">اختر النشاط الإقتصادي</option>
													<?php foreach($activities as $activity){ ?>
													<option class="<?php echo $activity->sub_sector_id ?>" value="<?php echo $activity->activity_id ?>"><?php echo $activity->activity_name ?></option>
													<?php } ?>
												  
												  </select>
												</div>
											</div>	
											
										</fieldset>
							
									</div>
									
							
									
								</div>	
							<div class="text-left">
								<button type="submit" class="submit-btn">حفظ </button>
							</div>
						</form>				 
					  <!-- </div>
                     </div>	-->				 
				  </div>				
				  <div class="col-md-4 col-lg-4 col-sm-12" style="padding-right: 35px">
					<div class="well sidebar_block info_block">
					       <div class="block_icon"><span><i class="fa fa-bell"></i></span></div>
							<p class="text-muted input-description" style="text-align:center">نجاح مشروعك يعتمد على البداية الصحيحة ... دعنا نساعدك في تطوير خطة العمل الخاصة بمشروعك  </p>
							<p class="text-muted"><em> </em></p>
							
					</div>		

					
				  </div>
				  

				 </div>

				  
		        </div>
	        </div> <!-- row -->
	    </div> <!--  big container -->
		
		<script>
	   $(document).ready(function(){
	   $(".form-control").click(function(){
			if ($(".form-control").is(":focus")) {
				var desc = $(this).attr("data-desc");
				$(".block_icon").css("background-color", "#f95959");
				$(".block_icon span").css("color", "#fff");
				$(".input-description").text(desc);
			}else {
				$(".block_icon").css("background-color", "whitesmoke");
				$(".block_icon span").css("color", "#57d1d7");			
			}
		});
		 	
		});
		</script>
		
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
	$("#activity_id").chained("#sub_sector_id");
 });

</script> 		
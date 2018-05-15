<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />		  


	  <div class="container" style="margin-top:50px;min-height: 600px;">
	  
	  
	        <div class="row">
		        <div class="col-sm-12">
			<ol class="breadcrumb breadcrumb-fill2">
				<li><a href="<?php echo base_url()?>"><i class="fa fa-home"></i></a></li>
				<li class="active">كافة المستخدمين</li>
			</ol>
                 <div class="create" style="margin-bottom:30px">
                  <a href="<?php echo base_url()?>users/create" class="profile_btn"> <i class="fa fa-plus"></i> <strong> أضف مستخدم جديد </a>
                </div>     
                  <table class="table table-bordered table-striped table-hover" style="direction: rtl;">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>الإسم الكامل</th>
						<th>النوع</th>
						<th>البريد الإلكتروني</th>
                        <th>الحالة</th>
						<th>إجراءات</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php $count=1; foreach($users as $user){ ?>
                      <tr>
					    <td><?php echo $count?></td>
                        <td><?php echo $user->fullname?></td>
						<td>
						<?php if($user->type=="Admin"){echo "أدمن" ;}else {echo "مستخدم عادي";} ?>
						</td>
                        <td><?php echo $user->email?></td>
                        <td><?php if($user->status == "Active"){echo '<label class="text-success"><i class="glyphicon glyphicon-ok"></i></label>';}else{echo '<label class="text-danger"><i class="glyphicon glyphicon-remove"></i></label>';}?></td>

                        <td>
                        <a class="edit btn btn-sm btn-default" href="<?php echo base_url()?>users/view/<?php echo $user->id ?>"><i class="fa fa-edit"></i></a>
						
						<button class="delete btn btn-sm btn-danger" delete_id ="<?php echo $user->id; ?>" data-toggle="modal" data-target=".deleteModal"><i class="fa fa-trash"></i></button>						
						</td>
						
                      </tr>						
						
					<?php $count++;} ?>
                    
                    </tbody>
                  </table>
          
           

				  
		        </div>
	        </div> <!-- row -->
	    </div> <!--  big container -->		
		

			
	<div class="modal fade hide deleteModal" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
		  <div class="modal-content">
			 <form  method="POST" id="deleteItem" action="<?php echo base_url() ?>users/delete" class="form-horizontal" onSubmit="">
				<div class="modal-header bg-danger">
				   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				   <h4 class="modal-title" id="myModalLabel">حذف المستخدم</h4>
				</div>
				<div class="modal-body content">
				   
				</div>
			 </form>
		  </div>
		  <!-- modal-content -->
	   </div>
	   <!-- modal-dialog -->
	</div>
	<!-- modal -->     

	
<script>
   $('.delete').click(function() {
   var id = $(this).attr('delete_id');
   var url = '<?php echo base_url() ?>users/delete_user_message/';
   $.ajax({
   	type: 'post',
   	data: { user_id : id },
   	url: url,
   	success: function (msg) {
   		$('#DeleteModal').removeClass('hide');
   		$('.content').html(msg);   
   		}
   	});
   });
   $("#DeleteModal").on('hidden.bs.modal', function () {
   	$(this).data('bs.modal', null);
   });
   
	
</script>

						
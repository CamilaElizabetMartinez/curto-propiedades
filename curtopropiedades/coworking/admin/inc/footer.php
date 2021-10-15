<footer class="pd-v">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<p>Curto propiedades Coworking: Administrador</p>
			</div>
			<div class="col-sm-6">
				<p class="pull-right">&copy; Copyright&mdash;<?php echo date('Y'); ?></p>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</footer>

<script src="assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
	
	$(function(){

		$('[data-toggle="tooltip"]').tooltip();

		$('.dropdown').on('show.bs.dropdown', function(e){
			$(this).find('.dropdown-menu').first().stop(true, true).slideDown('fast');
		});

		$('.dropdown').on('hide.bs.dropdown', function(e){
			$(this).find('.dropdown-menu').first().stop(true, true).slideUp('fast');
		});

        $('#table:not(.table-attach)').DataTable({
          "language": {
              "url": "assets/js/Spanish.json",
          }
        });

	    $('#table.table-attach').DataTable({
	      paging: false,
	      searching: false,
	      info: false,
	      "language": {
	          "url": "assets/js/Spanish.json",
	      }
	    });

	    $('.summernote').summernote({
	      lang: 'es-ES', 
	      height: 300,
	      placeholder: '...',
	      toolbar: [
	        ['style', ['bold', 'italic', 'underline'/*, 'clear'*/]],
	        ['para', ['style'/*,'ul', 'ol'*/]],
	        ['insert', ['link']],
	        ['misc', ['fullscreen','codeview']],
	      ],
	      onpaste: function(content){
	        alert(content);
	      },
	    });

	    $('.form-attachment .btn-del-attach').click(function(){
	    	$table = $(this).data('table');
	    	$id = $(this).data('id');
	    	$.ajax({
	    		type: "POST",
	    		url: 'process/deactivate_record.php?table='+$table+'&id='+$id,
	    		data: $(this).serialize(),
	    		success: function(response){
	    			switch (response) {
	    				case '1':
	    					$('.form-attachment').find('#item-'+$id).slideUp('fast',function(){
								window.location = window.location.href.split("#")[0];
							});
	    					break;
	    				default:
	    					alert(response);
	    					break;
	    			}
	    		}
	    	});
	    });

	    $('.admin-list .table .btn-set-off').click(function(){
	    	$table = $(this).data('table');
	    	$id = $(this).data('id');
	    	$.ajax({
	    		type: "POST",
	    		url: 'process/deactivate_record.php?table='+$table+'&id='+$id,
	    		data: $(this).serialize(),
	    		success: function(response){
	    			switch (response) {
	    				case '1':
	    					location.reload();
	    					break;
	    				default:
	    					alert(response);
	    					break;
	    			}
	    		}
	    	});
	    });

	    $('.admin-list .table .btn-set-on').click(function(){
	    	$table = $(this).data('table');
	    	$id = $(this).data('id');
	    	console.log($table);
	    	$.ajax({
	    		type: "POST",
	    		url: 'process/activate_record.php?table='+$table+'&id='+$id,
	    		data: $(this).serialize(),
	    		success: function(response){
	    			switch (response) {
	    				case '1':
	    					location.reload();
	    					break;
	    				default:
	    					alert(response);
	    					break;
	    			}
	    		}
	    	});
	    });

	});

</script>
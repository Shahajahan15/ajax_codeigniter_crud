<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	include('layout/header.php');
?>



<h1 class="pb-5"><?php echo 'Add Data' ?></h1>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div id="message"></div>
        <?php echo form_open('user/userAdd', array('id' => 'contactForm')) ?>
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">Send Message</button>
        </div>
        <?php echo form_close() ?>
    </div>
</div>


<!-- <div class="container">
	<h3>Employee Lists</h3>
	<div class="alert alert-success" style="display: none;"></div>
	<button id="btnAdd" class="btn btn-success">Add New</button>
	<table class="table table-bordered table-responsive" style="margin-top: 20px;">
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Email</td>
				<td>Phone</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody id="showdata">
			
		</tbody>
	</table>
</div> -->


<?php
	include('layout/footer.php');

?>		



<script>
    $(function() {
        $("#contactForm").on('submit', function(e) {
            e.preventDefault();

            var contactForm = $(this);
            console log(contactForm)
            $.ajax({
                url: contactForm.attr('action'),
                type: 'post',
                data: contactForm.serialize(),
                success: function(response){
                    console.log(response);
                    if(response.status == 'success') {
                        $("#contactForm").hide();
                    }

                    $("#message").html(response.message);

                }
            });
        });
    });
</script>


</body>
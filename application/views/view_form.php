<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Practice Form</title>
	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	

	
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>
	<h1>Form two</h1>
</div>	

<div>
	<form method="post" action="<?php echo base_url()?>main/form_validation">
		<?php 
		if($this->uri->segment(2) == "inserted"){
			echo "Data inserted!";
		}
		?>
		<br/> <br/> 
		Your Name: <br/>
		<input type= "text" name="name" />
		<br/>
		<?php echo form_error("name");?>
		<br/>
		Your Age: <br/>
		<input type="text" name="age"/>
		<br/>
		<?php echo form_error("age")?>
		<br/> <br/>
		<input type="submit" value="Submit"/>
	</form>
</div>

<div>
	<h1> Fetching data from database </h1>
	<table>
		<tr>
			<th>Id</th>
			<th>Your name</th>
			<th>Your age</th>
			<th>Delete</th>
		</tr>
		<?php
		if($fetch_data->num_rows() > 0)
		{
			foreach($fetch_data->result() as $row)
			{
			?>
			<tr>
				<td> <?php echo $row->id; ?> </td>
				<td> <?php echo $row->name; ?> </td>
				<td> <?php echo $row->age; ?> </td>
				<td> <a href="#" class ="delete_data" id="<?php echo $row->id; ?>" >Delete</a>  </td>

			</tr>
			<?php
			}

		}
		else
		{
		?>
		<tr> <p>No data found! </p> </tr>

		<?php
		}
		?>
		

	</table>
</div>

 <script >
$(document).ready.(function(){
	$('.delete_data').click(function(){
		var id=$(this).attr("id");
		if (confirm("Are you sure you want to delete this?")) {
			window.location="<?php echo base_url(); ?>main/delete_data/"+ id;

		}
		else
		{
			return false;

		}

	});
}); 
</script> 


</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>deomo</title>
	<script type="text/javascript">
		function showFormData(oForm) {


		   document.getElementById('show').value = oForm.elements[2].value;
		}

	</script>
</head>
<body>

	<form name="register_complaint" id="register_complaint_frm" action="#"> 
		<table cellspacing="4">	
			<tr><td><label for="name">Full Name: </label></td><td><input type="text" size="30" maxlength="155" name="name" ></td></tr>
			<tr><td><label for="email">Email Id: </label></td><td><input type="text" size="30" maxlength="155" name="email" ></td></tr>
			<tr><td><label for="service_complaint">Service Complaint: </label></td><td><textarea name="service_complaint" rows="7" cols="50" onfocus="clearFieldFirstTime(this);"></textarea></td></tr>
			<tr><td colspan="2"><input type="button" name="submit" value="Submit Complaint" onclick="showFormData(this.form);" ></td>
		</table>
	</form>
	<input type="text" size="30" maxlength="155" id="show" >
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact Us</title>
</head>
<body>
	<h1 style="text-align: center;">Contact Us</h1>
	<table>
	<tr>
		<td style="color:red">Name:<?php echo e($name); ?></td>
		<td>Email: <?php echo e($email); ?></td>
	</tr>
	<tr>
		<td>
		   Message: <?php echo e(@$msg); ?>

	   </td>
   </tr>
</table>
</body>
</html><?php /**PATH /home/sanixu9b/public_html/app/resources/views/email/contact-us.blade.php ENDPATH**/ ?>
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
		<td style="color:red">Name:{{$name}}</td>
		<td>Email: {{$email}}</td>
	</tr>
	<tr>
		<td>
		   Message: {{@$msg}}
	   </td>
   </tr>
</table>
</body>
</html>
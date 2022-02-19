<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table {
		  border-collapse: collapse;
		}

		table, th, td {
		  border: 1px solid grey;
		}
	</style>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body style="display:block;width:600px;margin-left:auto;margin-right:auto;background-color:black;color:white">
	<div style="line-height: 1.5em">
		<center><img style="width: 30%" src="{{asset('/logo.jpeg')}}" ></center>
	</div>
	<div style="line-height: 1.5em;padding: 10px;">
		<div style="font-family: 'Montserrat','Helvetica Neue',Helvetica,Arial,sans-serif;">
			<strong>
				<br>Hi {{ $username }},
			</strong>
			<p>
                Change your password <a href="http://localhost:3000/reset/{{$token}}">here</a>
			</p>
			<br>			
			<p>
				If you have trouble with the email reset password process, please contact me:
			</p>
			<p>
				Best Regard,<br><br>
				Ladinar
			</p>
		</div>
	</div>
	<div style="height:200px; width: 600px; background-size:100% 100%; background-repeat: no-repeat;color: #FFFFFF; font-family: 'Montserrat',sans-serif; vertical-align: middle; position: relative;">
		<div class="centered">
            <hr style="border-top:1px solid white">
			<b><p style="text-align: center;font-size: 12px; padding-top: 20px">
			©Ladinar Nanda Aprilia - 2022<br>
            Nama  : Ladinar Nanda Aprilia<br>
            Nim   : 2201864675<br>
            Phone : 081324959831<br>
			</p></b>
		</div>
	</div>
</body>
</html>
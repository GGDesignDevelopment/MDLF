<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<? echo site_url('styles/login.css'); ?>'">
    <title>Login MDLF</title>
  </head>
	<body>
		<style>
			#main {
				background: lightgrey;
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				display: flex;
				flex-flow: row nowrap;
				align-content: center;
				justify-content: center;
				align-items: center;
			}
			.centered-container {
				width: 20vw;
				background: white;
				border-radius: 5px;
				padding: 50px;
				box-shadow: 0 3px 5px rgba(0, 0, 0, .4);
			}
			.row-container {
				display: flex;
				flex-flow: column nowrap;
				align-items: center;
				justify-content: space-between;
			}
			.row-container .row {
				width: 100%;
				padding: 10px;
				display: flex;
				flex-flow: row nowrap;
				align-items: center;
				justify-content: space-between;
			}
			.row-container .row label {
				font-family: Arial, Helvetica, sans-serif;
				font-size: .9rem;
				color: black;
			}
			.row-container .row input {
				font-family: Arial, Helvetica, sans-serif;
				color: black;
				border: 1px solid black;
				padding: .5rem;
				border-radius: 5px;
			}
			.row-container .row input:focus {
				outline: 0;
				border-color: royalblue;
			}
			.row-container .row input[type=submit] {
				background-color: royalblue;
				border: 0;
				font-size: 1rem;
				color: white;
				padding: 10px 25px;
			}
			.row-container .row input[type=submit]:hover {
				box-shadow: 0 2px 4px rgba(0, 0, 0, .4);
			}
		</style>
	 	<div id="main">
			<div class="centered-container">
				<form method="POST">
					<div class="row-container">
						<div class="row">
							<label for="email">Usuario</label>
							<input type="text" name="email" id="email">
						</div>
						<div class="row">
							<label for="password">Contrase&ntilde;a</label>
							<input type="password" name="password" id="password">
						</div>
						<div class="row">
							<input type="submit" name="submit" value="login">
						</div>
					</div>
				</form>
			</div>
		</div>
	  <script></script>
  </body>
</html>

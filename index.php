
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Thinkific Home Test - Front End">
    <meta name="author" content="Juliano MEinen">
    <title>Thinkific Home Test - Front End</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <script>
	function submitLogin(){
		var email = $("#email").val();
		var password = $("#password").val();
		$.ajax({
			type: 'POST',
			url: 'https://thinkificbackend.herokuapp.com/authenticate',
			crossDomain: true,
			data: { email : email, password, password },
			dataType: 'json',
			success: function(responseData, textStatus, jqXHR) {
				$("#results").html("<pre>" + JSON.stringify(responseData,null,'\t') + "</pre>");
				console.log(responseData);
				console.log(textStatus);
			},
			error: function (responseData, textStatus, errorThrown) {
				$("#results").html("<pre>" + JSON.stringify(responseData,null,'\t') + "</pre>");
				console.log(responseData);
				console.log(textStatus);
			}
		});
	}
  </script>
  
  </head>

  <body>
	<div class="container" >
		<h1>Please Log In</h1>
		<div>
			<form>
			  <div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" id="password" name="password">
			  </div>
			  <button type="button" onclick="submitLogin()" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div id="results" class="jumbotron" style="margin-top:50px" >The results will be displayed here.<div>
	</div>
  </body>
</html>

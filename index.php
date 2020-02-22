
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
		$("#results").html("<center>Loading...</center");
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
				if(responseData.token){
					$("[name='token']").val(responseData.token);
					alert('You have a token! You can now test the endpoints below.');
				}
			},
			error: function (responseData, textStatus, errorThrown) {
				$("#results").html("<pre>" + JSON.stringify(responseData,null,'\t') + "</pre>");
				console.log(responseData);
				console.log(textStatus);
			}
		});
	}
	
	function loginWithGoogle(){
		if( confirm('You will need to copy the token value for the next tests.') ){
			window.open("https://thinkificbackend.herokuapp.com/auth/google");
		}
	}
	
	function testCurrent(){
		var token = $("#exampleInputToken1").val();
		$("#results").html("<center>Loading...</center");
		$.ajax({
			type: 'GET',
			url: 'https://thinkificbackend.herokuapp.com/current',
			crossDomain: true,
			headers: {
				"Authorization": "Bearer " + token
			},
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
	
	function testNext(){
		var token = $("#exampleInputToken2").val();
		$("#results").html("<center>Loading...</center");
		$.ajax({
			type: 'GET',
			url: 'https://thinkificbackend.herokuapp.com/next',
			crossDomain: true,
			headers: {
				"Authorization": "Bearer " + token
			},
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
	
	function setCurrent(){
		var token = $("#exampleInputToken3").val();
		var current = $("#current").val();
		$("#results").html("<center>Loading...</center");
		$.ajax({
			type: 'POST',
			url: 'https://thinkificbackend.herokuapp.com/current',
			crossDomain: true,
			headers: {
				"Authorization": "Bearer " + token
			},
			dataType: 'json',
			data: { current : current },
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
		<h1>Thinkific Home Test</h1>
		  <div class="accordion" id="accordionExample">
		  <div class="card">
			<div class="card-header" id="headingOne">
			  <h2 class="mb-0">
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				  <h2>Log In</h2>
				</button>
			  </h2>
			</div>

			<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
			  <div class="card-body">
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
					  <button type="button" onclick="loginWithGoogle()" class="btn btn-secondary">Login with Google</button>
					</form>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="card">
			<div class="card-header" id="headingTwo">
			  <h2 class="mb-0">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				  <h2>Endpoint: Current</h2>
				</button>
			  </h2>
			</div>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
			  <div class="card-body">
				<div>
					<form>
					  <div class="form-group">
						<label for="exampleInputToken1">Token</label>
						<textarea class="form-control" id="exampleInputToken1" name="token" rows="3"></textarea>
					  </div>
					  <button type="button" onclick="testCurrent()" class="btn btn-primary">Test</button>
					</form>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="card">
			<div class="card-header" id="headingThree">
			  <h2 class="mb-0">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				  <h2>Endpoint: Next</h2>
				</button>
			  </h2>
			</div>
			<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
			  <div class="card-body">
				<div>
					<form>
					  <div class="form-group">
						<label for="exampleInputToken2">Token</label>
						<textarea class="form-control" id="exampleInputToken2" name="token" rows="3"></textarea>
					  </div>
					  <button type="button" onclick="testNext()" class="btn btn-primary">Test</button>
					</form>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="card">
			<div class="card-header" id="headingFour">
			  <h2 class="mb-0">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
				  <h2>Endpoint: Set Current</h2>
				</button>
			  </h2>
			</div>
			<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
			  <div class="card-body">
				<div>
					<form>
					  <div class="form-group">
						<label for="exampleInputToken3">Token</label>
						<textarea class="form-control" id="exampleInputToken3" name="token" rows="3"></textarea>
					  </div>
					  <div class="form-group">
						<label for="current">Value</label>
						<input type="number" class="form-control" id="current" name="current">
					  </div>
					  <button type="button" onclick="setCurrent()" class="btn btn-primary">Set Current Value</button>
					</form>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<div id="results" class="jumbotron" style="margin-top:50px" >The results will be displayed here.<div>
	</div>
  </body>
</html>

<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">

    <title>Signin Template for Bootstrap</title>


    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

 
    <link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">

  <style type="text/css"></style></head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" action="login.php" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        <input type="password" class="form-control" name="passwd" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      
      <form action="register.php" method="post" form class="form-signin" role="form">
        <h2 class="form-signin-heading">Register Here</h2>
	 <input type="text" class="form-control" name="username" placeholder="Goodreads User Name" required autofocus>
	 <input type="email" class="form-control" name="email" placeholder="Email address" required autofocus>
	 <input type="text" class="form-control" name="country" placeholder="country" required autofocus>
	 
	 <input type="password" class="form-control" name="passwd" placeholder="Password" required>
	 <input type="password" class="form-control" name="conf_passwd" placeholder="Confirm Password" required>

	 <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
</p>
</form>

    </div> 


  

</body></html>
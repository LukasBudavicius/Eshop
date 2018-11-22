<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Register page">
    <meta name="author" content="">

    <title>Register page - www.website.com</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Cloudflare stuff -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Custom styles for this template -->
  <link href="{{asset('css/shop-homepage.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="{{asset('css/registration.css')}}" rel="stylesheet">
  </head>

  @extends('layouts.navbar')
    <!-- End of navigation -->

    <!-- Page Content -->
    <section id="register">
        <div class="container">
        	<div class="row">
        	    <div class="col-lg-12">
            	    <div class="form-wrap">
                    <h1>Welcome, please register down below</h1>
                    <form role="form" action="{{action('UserController@postSignup')}}" method="POST" id="login-form" autocomplete="off">
                      <div class="form-group">
                        <label for="name" class="sr-only">Name</label>
                        <input type="name" name="name" id="name" class="form-control" placeholder="John">
                      </div>
                      <div class="form-group">
                          <label for="email" class="sr-only">Email</label>
                          <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                      </div>
                      <div class="form-group">
                          <label for="password" class="sr-only">Password</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="confirm-password" class="sr-only">Confirm password</label>
                        <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirm password">
                    </div>
                      <div class="checkbox">
                          <span class="character-checkbox" onclick="showPassword()"></span>
                          <span class="label">Show password</span>
                      </div>
                      <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                      {{csrf_field()}}
                  </form>
                        <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                        <hr>
            	    </div>
        		</div> <!-- /.col-xs-12 -->
        	</div> <!-- /.row -->
        </div> <!-- /.container -->
    </section> <!-- /.section -->

    <div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
    	<div class="modal-dialog modal-sm">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">
    					<span aria-hidden="true">&times;</span>
    					<span class="sr-only">Close</span>
    				</button>
    				<h4 class="modal-title">Recovery password</h4>
    			</div>
    			<div class="modal-body">
    				<p>Type your email account</p>
    				<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    				<button type="button" class="btn btn-custom">Recovery</button>
    			</div>
    		</div> <!-- /.modal-content -->
    	</div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->


    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Optional JavaScript -->
    <script type="text/javascript" src="{{asset('js/showPasswordreg.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/confirm_pw.js')}}"></script>
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
  </body>

  </body>

</html>

<!doctype html>
<html lang="id">
  <head>
  	<title>PPID - Registrasi Akun</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('css/login/style.css') }}">

	</head>
	<body>
	<section class="mt-1">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-5">
					<div class="wrap">
						<div class="img" style="background-image: url({{ asset('image/login/login_image.svg') }});"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100 text-center">
			      			<h3 class="mb-4">Registrasi Akun</h3>
			      		</div>
                         	
			      	</div>
                     
				  <form action="" class="signin-form" method="POST">
                      @csrf
					 
		  		    <div class="form-group">
		  			    <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
		  			    <label class="form-control-placeholder" for="name">Nama lengkap</label>
			      	</div>
		  		    <div class="form-group">
		  			    <input id="username" type="text" name="username" class="form-control @error('username') is-invalid @enderror" required>
		  			    @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="form-control-placeholder" for="username">Username</label>
			      	</div>
		  		    <div class="form-group">
		  			    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
		  			    @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="form-control-placeholder" for="email">Email</label>
			      	</div>
		            <div class="form-group">
		                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required >
		                @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      <label class="form-control-placeholder" for="password">Password</label>
		              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
		            <div class="form-group">
		              <input id="password_confirmation" name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" required>
		                @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      <label class="form-control-placeholder" for="password_confirmation">Konfirmasi password</label>
		              <span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Daftar</button>
		            </div>
		            
		          </form>
				  <p class="text-center">Sudah punya akun? <a href="/login">Login</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('js/login/jquery.min.js') }}"></script>
  <script src="{{ asset('js/login/popper.js') }}"></script>
  <script src="{{ asset('js/login/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/login/main.js') }}"></script>

  <script>
	$('.form-control').keypress(function (e) { 
		$('.is-invalid').removeClass('is-invalid');
		$('.invalid-feedback').remove();
	});
  </script>
	</body>
</html>


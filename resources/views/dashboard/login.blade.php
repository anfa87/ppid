<!doctype html>
<html lang="id">
  <head>
  	<title>PPID - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('css/login/style.css') }}">

	</head>
	<body>
	<section class="mt-2 mb-2">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url({{ asset('image/login/login_image.svg') }});"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100 text-center">
			      			<h3 class="mb-4">Masuk Dashboard PPID</h3>
			      		</div>
								
			      	</div>
					  @if (session()->has('gagal'))
					  <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
						{{ session('gagal') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  @endif
					  @if (session()->has('sukses'))
                                
                      <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                          {{ session('sukses') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
                        </div>
                      @endif	
						<form action="" class="signin-form" method="POST">
								@csrf
			      		<div class="form-group mt-3">
			      			<input type="text" name="username" class="form-control" required>
			      			<label class="form-control-placeholder" for="username">Username</label>
			      		</div>
		            <div class="form-group">
		              <input id="password" name="password" type="password" class="form-control" required>
		              <label class="form-control-placeholder" for="password">Password</label>
		              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Masuk</button>
		            </div>
		            <div class="form-group d-md-flex">
		            </div>
		          </form>
		          <p class="text-center">Belum punya akun? <a href="/register">Registrasi</a></p>
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

	</body>
</html>


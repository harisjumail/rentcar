
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CarPooling | Registration Page</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">



<body class="hold-transition register-page">
<div class="register-box">
<div class="register-logo">
<a href="#"><b>Rent Car </b</a> <br> Registration Form
</div>
<div class="card">
<div class="card-body register-card-body">
   @include('message')
<p class="login-box-msg">Register a new user</p>
<form action="{{ route('register.storenew') }}" method="post">
@csrf
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Full name" name="name" value="{{ old('name') }}" required autocomplete="off">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>

<div class="input-group mb-3">
<input type="address" class="form-control" placeholder="address" name="address" value="{{ old('address') }}" required autocomplete="off">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>

<div class="input-group mb-3">
<input type="contactno" class="form-control" placeholder="contactno" name="contactno" value="{{ old('contactno') }}" required autocomplete="off">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>

<div class="input-group mb-3">
<input type="licence" class="form-control" placeholder="licence number" name="licence" value="{{ old('licence') }}" required autocomplete="off">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>


<div class="input-group mb-3">
<input type="username" class="form-control" placeholder="username" name="username" value="{{ old('username') }}" required autocomplete="off">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>

<div class="input-group mb-3">
<input type="password" class="form-control" name= "password" placeholder="Password" required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="password" class="form-control" name= "retypepassword" placeholder="Retype password" required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-8">

<a href = "{{route('login')}}">
              Login
              </a>

</div>

<div class="col-4">
<button type="submit" class="btn btn-primary btn-block">Register</button>
</div>

</div>
</form>
</div>

</div>
</div>


<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>

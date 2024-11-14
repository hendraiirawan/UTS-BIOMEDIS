<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Eclipse Medical Center</title>
    <link rel="stylesheet" href="{{ asset ('medilab/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset ('medilab/assets/css/auth.css') }}">
    <link href="/medilab/assets/img/lgors16x16.png" rel="icon">
</head>

<body>
    
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h1 class="auth-title"> <a href="{{ url('/') }}">Eclipse Medical </a></h1>
            <p class="auth-subtitle mb-5">Masukkan user name dan password untuk masuk ke semua fitur Eclipse Medical Center.</p>

            <form method="POST" action="{{ route('login') }}">
		@csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input input id="email" type="email" class="form-control-xl form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus" placeholder="Username">
 		    @error('email')
                        <span class="invalid-feedback" role="alert">
                           	<strong>{{ $message }}</strong>
                        </span>
                     @enderror
                    <div class="form-control-icon">
                    <i class='bx bx-envelope'></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input id="password" type="password" class="form-control-xl form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
  			@error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Ingat saya
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">{{ __('Login') }}</button>
            </form>
          
            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">Belum memiliki akun? <a href="/register" class="font-bold">Buat Akun</a>.</p>
	     @if (Route::has('password.request'))
                <p><a class="font-bold" href="{{ route('password.request') }}">Lupa Password?</a>.</p>
	    @endif
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>

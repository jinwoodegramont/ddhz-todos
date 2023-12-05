<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale-1.0">
  <title>DDHZ TODOS</title>
  {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
  <link rel="stylesheet" href="{{asset('assets/css/form.css')}}">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    @if ($message = Session::get('success'))
      <!-- message berhasil register disini coy kalo mau pake, see UserAuthController register function -->

      <!-- css bodynya gabisa di override :( -->
      <div style="position: static;">
        <h1 style="background-color: green;">{{$message}}</h1>
      </div>
    @endif

    @if ($errors->any())
      @foreach ($errors->all() as $error)
      <!-- message error login/register disini coy kalo mau pake, see UserAuthController login & register function -->

      <!-- css bodynya gabisa di override :( -->
      <div style="position: static;">
        <h1 style="background-color: red;">{{$error}}</h1>
      </div>
      @endforeach
    @endif

<div class="wrapper">
    <span class="bg-animate"></span>
    <span class="bg-animate2"></span>



  
  <div class="form-box login">
    <h2 class="animation" style="--i:0; --j:21;">Login</h2>
    <form action="{{ route('auth.login') }}" method="post">
      @csrf

      <div class="input-box animation " style="--i:1; --j:22;">
        <input type="text" name="email" required>
        <label>Email</label>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box animation" style="--i:2; --j:23;">
        <input type="password" name="password" required>
        <label >Password</label>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <button type="submit" class="btn animation" style="--i:3; --j:24;">Login</button>
      <div class="logreg-link animation" style="--i:4; --j:25;">
        <p>Don,t have an account? <a href="#" class="register-link">Sign Up</a></p>
      </div>
    </form>
  </div>
    <div class="info-text login">
      <h2 class="animation" style="--i:0; --j:20;">Welcome Back</h2>
      <p class="animation" style="--i:1; --j:21;">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
    </div>


    <div class="form-box register">
      <h2 class="animation" style="--i:17; --j:0;">Sign Up</h2>
      <form action="{{ route('auth.register') }}" method="post">
        @csrf

        <div class="input-box animation" style="--i:18; --j:1;">
          <input type="text" name="username" required>
          <label>Username</label>
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-box animation" style="--i:19; --j:2;">
          <input type="text" name="email" required>
          <label>Email</label>
          <i class='bx bxs-envelope'></i>
        </div>
        <div class="input-box animation" style="--i:20; --j:3;">
          <input type="password" name="password" required>
          <label >Password</label>
          <i class='bx bxs-lock-alt' ></i>
        </div>
        <button type="submit" class="btn animation" style="--i:21; --j:4;">Sign Up</button>
        <div class="logreg-link animation" style="--i:22; --j:5;">
          <p>Already have an account? <a href="#" class="login-link">Login</a></p>
        </div>
      </form>
    </div>

    <div class="info-text register">
      <h2 class="animation" style="--i:17; --j:0;">Welcome Back</h2>
      <p class="animation" style="--i:18; --j:1;">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
    </div>
</div>

<script src="{{asset('assets/js/form.js')}}"></script>
</body>
</html>

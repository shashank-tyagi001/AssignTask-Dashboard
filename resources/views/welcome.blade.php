<!DOCTYPE html>

<html>

<head>

  <title>Login and Registration Form</title>

  <link rel="stylesheet" href={{asset('asset/css/welcome.css')}}>

</head>

<body>

    <div class="container">
        <div class="well">
          <form action={{route('login')}} method="POST" enctype="multipart/form-data">
            @csrf
            <hggroup>
              <h1>Welcome Back</h1>
              <h2>Log in to your account</h2>
            </hggroup>
            <div>
              <input type="email" name="email" id="email" required>
              <label for="email">Username</label>
            </div>

            <div>
              <input type="password" name="password" id="password" required>
              <label for="password">Password</label>
            </div>
            <a href="#" id="forgot-passwd">Forgot Password?</a>

            <button class=button id="btn-submit">
              <span class="button-text">Log In</span>
              <div class="button-loader">
                <div></div>
                <div></div>
                <div></div>
              </div>

            </button>
          </form>
          <p>Don't have an account? <a href="#">Sign Up</a>.</p>
        </div>

        <img src="https://cdn.pixabay.com/photo/2023/03/27/19/54/roses-7881586_1280.png">
      </div>
<script scr={{asset('asset/js/welcome.js')}} ></script>
</body>

</html>

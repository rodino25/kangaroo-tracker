<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ env("app_name") }} Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('assets/js/login.js') }}"></script>
</head>
<body>
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col col-lg-4 offset-lg-4 col-md-6 offset-md-3">
        <div class="h2 mt-5 text-center">
          <a class="text-info" href="{{ url('/') }}">{{ env("app_name") }}</a>
        </div>
        <div class="card border mt-5">
          <div class="card-header text-center">
            Login Form
          </div>
          <div class="card-body">
            <div class="alert alert-danger d-none alert-login-fail"></div>
            <form id="form-login">
              <div class="mb-2">
                <label for="input-username" class="form-label">Username</label>
                <input type="text" class="form-control" id="input-username" placeholder="Username" required />
              </div>
              <div class="mb-3 mt-3">
                <label for="input-password" class="form-label">Password</label>
                <input type="password" class="form-control" id="input-password" placeholder="Password" required />
              </div>
              <div class="mb-2">
                <button class="btn btn-info">LOGIN</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
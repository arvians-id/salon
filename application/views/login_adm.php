<!DOCTYPE html>

<html>
<style>
  body {
    background-color: red;
  }

  #textLoginAdmin {
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  }

  #tombolLogin {
    background-color: #81d4fa;
    font-weight: bold;
    color: black;
  }

  #tombolLogin:link,
  #tombolLogin.btn:visited {
    text-transform: uppercase;
    text-decoration: none;
    padding: 15px 40px;
    display: inline-block;
    border-radius: 100px;
    transition: all .2s;
    position: absolute;
  }

  #tombolLogin:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  }

  #tombolLogin:active {
    transform: translateY(-1px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  }

  #tombolLogin-white {
    background-color: #fff;
    color: #777;
  }

  #tombolLogin::after {
    content: "";
    display: inline-block;
    height: 100%;
    width: 100%;
    border-radius: 100px;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    transition: all .4s;
  }

  #tombolLogin-white::after {
    background-color: #fff;
  }

  #tombolLogin:hover::after {
    transform: scaleX(1.4) scaleY(1.6);
    opacity: 0;
  }

  #tombolLogin-animated {
    animation: moveInBottom 5s ease-out;
    animation-fill-mode: backwards;
  }

  @keyframes moveInBottom {
    0% {
      opacity: 0;
      transform: translateY(30px);
    }

    100% {
      opacity: 1;
      transform: translateY(0px);
    }
  }
</style>

<head>
  <title>Bootstrap Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/mycss/login_adm.css">
</head>

<body>
  <div class="container">
    <div class="row" style="margin-top: 120px;">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row">
          <div class="card-img-left d-none d-md-flex">
          </div>
          <div class="card-body">
            <h5 class="card-title text-center" id="textLoginAdmin">Login Admin</h5>
            <form action="<?= site_url('auth/login') ?>" method="post" class="form-signin">
              <div class="form-label-group">
                <input type="text" name="username" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
                <label for="inputUserame">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="tombolLogin" name="login">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
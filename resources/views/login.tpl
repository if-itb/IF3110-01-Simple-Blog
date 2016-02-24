<div class="container">
  <div class="row">
    <h2 class="center-align">Login</h2>
    <div class="row">
      <form name="login" class="col s12" action="/auth/login" method="post">
        <div class="row">
          <div class="input-field col s12">
            <input id="username" name="username" type="text" class="validate">
            <label for="username">Username</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="password" name="password" type="password" class="validate">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <p>
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">Remember me</label>
            </p>
          </div>
        </div>
        <div class="divider"></div>
        <div class="row">
          <div class="col m12">
            <p class="right-align">
              <button class="btn btn-large waves-effect waves-light" type="submit" name="action">Login</button>
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
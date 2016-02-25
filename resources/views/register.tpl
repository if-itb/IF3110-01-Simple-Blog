<div class="container">
  <div class="row">
    <h2 class="center-align">Register</h2>
    <div class="row">
      <form class="col s12" name="register" method="post" action="/auth/register">
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
          <div class="input-field col s12">
            <input id="password_confirmation" name="password_confirmation" type="password" class="validate">
            <label for="password_confirmation">Confirm Password</label>
          </div>
        </div>
        <div class="divider"></div>
        <div class="row">
          <div class="col m12">
            <p class="right-align">
              <button class="btn btn-large red waves-effect waves-light" type="reset" name="reset">Reset</button>
              <button class="btn btn-large waves-effect waves-light" type="submit" name="submit">Register</button>
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
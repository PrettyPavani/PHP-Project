<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="signupmodal">SignUp Here</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../controller/users/signupController.php" method="post" autocomplete="off">
            <div class="form-group">
              <b><label for="username">Username :</label></b>
              <input class="form-control" id="username" name="username" placeholder="Choose a Unique Username" type="text" required minlength="3" maxlength="11">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <b><label for="firstname">First Name:</label></b>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
              </div>
              <div class="form-group col-md-6">
                <b><label for="lastname">Last Name:</label></b>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required>
              </div>
            </div>
            <div class="form-group">
              <b><label for="email">Email:</label></b>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
            </div>
            <div class="form-group">
              <b><label for="phone">Phone No:</label></b>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon">+91</span>
                  </div>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" maxlength="10">
                </div>
            </div>
                <div class="text-left my-2">
                  <b><label for="password">Password:</label></b>
                  <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
                </div>
                <div class="text-left my-2">
                  <b><label for="password1">Reenter Password:</label></b>
                  <input class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Reenter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
                </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          <p class="mb-0 mt-1">Already have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginmodal">Login here</a>.</p>
        </div>
      </div>
    </div>
</div>


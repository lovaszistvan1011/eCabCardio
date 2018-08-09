<div class="intro-section"> <!-- intro section -->
  <?php
 // $this->load->view("templates/menu");
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div class="intro-caption"><!-- intro caption -->
          <h1 class="intro-title">Experts in Heart Health</h1>
          <form action="http://localhost/eCabCardio/LoginController/login_validation" method="post">
            
              <div class="form-group">
                  <label>Utilizator</label><input type="text" name="username" class="form-control ">
                  <span class="text-danger"><?php echo form_error('username')?></span>
               
              </div>
              <div class="form-group">
               <label>Parola</label><input type="password" name="password">
                <span class="text-danger"><?php echo form_error('password')?></span>
              </div>
               <div class="form-group">
              <!--     <input type="submit" name ="insert" value ="Login"/> -->
               <button type="submit" class="btn btn-primary" value="login">Login</button>
               <?php $this->session->flashdata('error')?>
              
              
          </form>
          </div>
        <!-- /.intro caption --> 
      </div>
    </div>
  </div>
</div>

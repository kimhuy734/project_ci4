<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="auth">
  <div class="auth__header">
    
  </div>
  <div class="auth__body">
    <form class="auth__form" autocomplete="off" action="/register" method="post">
      <div class="auth__form_body">
        <h3 class="auth__form_title">
        <img src="images/logo.svg" alt="" width="50">
        Peperoni App
        </h3>
        <div>
          <div class="form-group">
            <label class="text-uppercase small">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>"> 
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Password</label>
            <input type="password" class="form-control" name="password" id="password" value="<?= set_value('password') ?>"> 
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Address</label>
            <textarea name="address"  class="form-control" placeholder="Address" value="<?= set_value('address') ?>"></textarea>
          </div>
          <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="1" name = "role">I'm a manager
            </label>
          </div><br>
          <?php if(isset($validation)) :?>
        <div class="col-12">
          <div class="alert alert-danger" role="alert">
            <?= $validation->listErrors(); ?>
          </div>
        </div>
      <?php endif; ?>
        </div>
      </div>
      <div class="auth__form_actions">
        <button type="submit" class="btn btn-primary btn-lg btn-block">
          NEXT
        </button>
        <div class="mt-2">
          <!-- rout -->
          <a href="/" class="small text-uppercase">
            SIGN IN INSTEAD
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>
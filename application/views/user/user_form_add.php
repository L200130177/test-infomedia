    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
              
            <!-- general form elements -->
            <div class="">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST">
                <div class="card-body">

                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control <?=form_error('username') ? 'is-invalid' : null?>" name="username" value="<?=set_value('username')?>" placeholder="Masukkan Username">
                    <?=form_error('username')?>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control <?=form_error('password') ? 'is-invalid' : null?>" name="password" value="<?=set_value('password')?>" placeholder="Masukkan Password">
                    <?=form_error('password')?>
                  </div>
                  <div class="form-group">
                    <label>Konsirmasi Password</label>
                    <input type="password" class="form-control <?=form_error('passconf') ? 'is-invalid' : null?>" name="passconf" value="<?=set_value('passconf')?>" placeholder="Konfirmasi Password">
                    <?=form_error('passconf')?>
                  </div>
                  <!-- <div class="form-group">
                    <?php foreach ($role as $r) : ?>
                    <label>Role</label>
                    <input type="text" class="form-control <?=form_error('role') ? 'is-invalid' : null?>" name="role" value="<?= $r['desc']; ?>">
                    <?=form_error('role')?>
                    <?php endforeach; ?>
                  </div> -->

                  <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                      <option value="">- Pilih -</option>
                      <?php foreach ($role as $r) : ?>
                        <option value="<?= $r['id_role']; ?>"><?= $r['desc']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->  
      </div>

    </section>
    <!-- /.content -->
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
                    <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
                    <input type="text" class="form-control <?=form_error('username') ? 'is-invalid' : null?>" name="username" value="<?=$this->input->post('username') ? $this->input->post('username') : $row['username']?>" placeholder="Masukkan Username">
                    <?=form_error('username')?>
                  </div>
                  <div class="form-group">
                    <label>Password</label><small>(Biarkan kosong bila tidak diganti)</small>
                    <input type="password" class="form-control <?=form_error('password') ? 'is-invalid' : null?>" name="password" value="<?=$this->input->post('password')?>" placeholder="Masukkan Password">
                    <?=form_error('password')?>
                  </div>
                  <div class="form-group">
                    <label>Konsirmasi Password</label>
                    <input type="password" class="form-control <?=form_error('passconf') ? 'is-invalid' : null?>" name="passconf" value="<?=$this->input->post('passconf')?>" placeholder="Konfirmasi Password">
                    <?=form_error('passconf')?>
                  </div>
                  <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                      <option value="">- Pilih -</option>
                      <?php foreach ($role as $r) : ?>
                        <option value="<?= $r['id_role']; ?>" <?=$r['id_role'] == $row['role_id'] ? "selected" : null?>><?= $r['desc']; ?></option>
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
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
                    <label>Deskripsi</label>
                    <input type="text" class="form-control <?=form_error('desc') ? 'is-invalid' : null?>" name="desc" value="<?=set_value('desc')?>" placeholder="Masukkan Deskripsi">
                    <?=form_error('desc')?>
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
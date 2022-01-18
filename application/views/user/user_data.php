    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=$title?></h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">
           <div class="card-body">
            <div class="align-right">
            <a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
              <i class="fa fa-user-plus"></i> Create
            </a>
            </div>
          </br>

            <div class="align-right">
              <?= form_open("user/cari");?>
              <select name="cariberdasarkan">
                <option value="">Cari berdasarkan</option>
                <option value="id_user">ID</option>
                <option value="username">Username</option>
                <option value="desc">Role</option>
              </select>
              <input type="text" name="yangdicari" id="">
              <input type="submit" value="Search">
              <?= form_close();?>
            </div>
          </br>

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Last Update</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
              <?php $no = 1;
              foreach ($user as $u) : ?>
              <tr>
                <td style="width:5%;"><?=$no++?></td>
                <td><?= $u['username']; ?></td>
                <td><?= $u['role_id'] == 1 ? "Admin" : "User"; ?></td>
                <td><?= $u['last_update']; ?></td>
                <td class="text-center" width="160px">
                  <form action="<?=site_url('user/del')?>" method="post">
                    <a href="<?=site_url('user/edit/'.$u['id_user'])?>" class="btn btn-primary btn-xs">
                      <i class="fa fa-pencil"></i> Update
                    </a>
                         
                    <input type="hidden" name="id_user" value="<?=$u['id_user'];?>">
                      <button onclick="return confirm('Apakah anda yakin ingin menghapus ?')" class="btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i> Delete
                      </button>
                </form>

                </td>
              </tr>
              <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->  
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
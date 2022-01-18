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
            <a href="<?=site_url('role/add')?>" class="btn btn-primary btn-flat">
              <i class="fa fa-user-plus"></i> Create
            </a>
          </div>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Desc</th>
                    <th>Last Update</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
              <?php $no = 1;
              foreach ($role as $r) : ?>
              <tr>
                <td style="width:5%;"><?=$no++?></td>
                <td><?= $r['desc']; ?></td>
                <td><?= $r['last_update']; ?></td>
                <td class="text-center" width="160px">
                  <form action="<?=site_url('role/del')?>" method="post">
                    <a href="<?=site_url('role/edit/'.$r['id_role'])?>" class="btn btn-primary btn-xs">
                      <i class="fa fa-pencil"></i> Update
                    </a>
                         
                    <input type="hidden" name="id_role" value="<?=$r['id_role'];?>">
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
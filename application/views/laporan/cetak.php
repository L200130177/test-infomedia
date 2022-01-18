 <table class="table table-striped">
  <tr>
   <th>#</th>
   <th>Nim</th>
   <th>Nama</th>
   <th>Alamat</th>
  </tr>
  <?php $no=1; foreach ($user as $u): ?>
   <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $u->username ?></td>
    <td><?php echo $u->role_id ?></td>
    <td><?php echo $u->last_update ?></td>
   </tr>
  <?php endforeach ?>
 </table>
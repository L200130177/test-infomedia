<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table>
		<tr>
			<th>NO</th>
			<th>USERNAME</th>
			<th>ROLE</th>
			<th>LAST UPDATE</th>
		</tr>

		<?php $no = 1;
        foreach ($user->result() as $key => $u) { ?>

        <tr>
        	<td><?=$no++?></td>
        	<td><?=$u->username?></td>
            <td><?=$u->role_id == 1 ? "Admin" : "User";?></td>
            <td><?=$u->last_update?></td>
        </tr>

        <?php 
        } ?>
    </table>
    <script type="text/javascript">
    	window.print();
    </script>
</body>
</html>
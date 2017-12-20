<!doctype html>
    <html>
        <head>
            <title>Users</title>
            <style>
                .word-table {
                    border:1px solid black !important; 
                    border-collapse: collapse !important;
                    width: 100%;
                }
                .word-table tr th, .word-table tr td{
                    border:1px solid black !important; 
                    padding: 5px 10px;
                }
            </style>
        </head>
        <body>
            <h2>Users List</h2>
            <table class="word-table" style="margin-bottom: 10px">
                <tr>
                    <th>No</th>
		<th>Username</th>
		<th>Email</th>
		<th>Password</th>
		<th>Role</th>
		<th>Active</th>
		<th>Avatar</th>
		<th>Verification Code</th>
		<th>Remember Me</th>
		<th>Last Login</th>
		<th>Created</th>
		<th>Updated</th>
		</tr><?php
                    foreach ($users_data as $users)
                    {
                ?>
                    <tr><td><?php echo ++$start ?></td><td><?php echo $users->username ?></td><td><?php echo $users->email ?></td><td><?php echo $users->password ?></td><td><?php echo $users->role ?></td><td><?php echo $users->active ?></td><td><?php echo $users->avatar ?></td><td><?php echo $users->verification_code ?></td><td><?php echo $users->remember_me ?></td><td><?php echo $users->last_login ?></td><td><?php echo $users->created ?></td><td><?php echo $users->updated ?></td></tr>
                
                <?php } ?>
            </table>
        </body>
    </html>
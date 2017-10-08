<!DOCTYPE html>
<html>
<head>
	<title>Test Drive</title>
	<meta charset="utf-8">
</head>
<body>

<table>
	<tr>
		<td><?php echo lang('first_name'); ?>:</td>
		<td><?php echo $post['first-name']; ?></td>
	</tr>
	<tr>
		<td><?php echo lang('last_name'); ?>:</td>
		<td><?php echo $post['last-name']; ?></td>
	</tr>
	<tr>
		<td><?php echo lang('phone'); ?>:</td>
		<td><?php echo $post['phone']; ?></td>
	</tr>
	<tr>
		<td><?php echo lang('email'); ?>:</td>
		<td><?php echo $post['email']; ?></td>
	</tr>
	<tr>
		<td><?php echo lang('model'); ?>:</td>
		<td><?php echo $post['model']; ?></td>
	</tr>
	<tr>
		<td><?php echo lang('note_comment'); ?>:</td>
		<td><?php echo $post['comment']; ?></td>
	</tr>
</table>

</body>
</html>
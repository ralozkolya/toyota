<!DOCTYPE html>
<html>
<head>
	<title>Service</title>
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
		<td><?php echo lang('date'); ?>:</td>
		<td><?php echo $post['date']; ?></td>
	</tr>
	<tr>
		<td><?php echo lang('time'); ?>:</td>
		<td><?php echo $post['time']; ?></td>
	</tr>
	<tr>
		<td><?php echo lang('model'); ?>:</td>
		<td><?php echo $post['model']; ?></td>
	</tr>
	<tr>
		<td><?php echo lang('service_type'); ?>:</td>
		<td><?php echo lang($post['service_type']); ?></td>
	</tr>
	<tr>
		<td><?php echo lang('note_comment'); ?>:</td>
		<td><?php echo $post['comment']; ?></td>
	</tr>
</table>

</body>
</html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Query</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<style>
			.result {
				max-height: 100vh;
				overflow-y: auto;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div>
						<button id="select" class="btn btn-default">select pages</button>
						<button id="update" class="btn btn-default">update pages</button>
						<button id="insert" class="btn btn-default">insert pages</button>
					</div>
					<form method="post">
						<div class="form-group">
							<textarea name="query" cols="80" rows="20" class="form-control" autofocus><?php echo $query; ?></textarea>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary">
						</div>
					</form>
				</div>
				<div class="col-sm-6 result">
					<pre><?php print_r($result); ?></pre>
				</div>
			</div>
		</div>
		<script>

			var textarea = $('textarea');

			$('#select').click(function() {
				textarea.val('SELECT `id`, `title` FROM `pages`');
			});

			$('#update').click(function() {
				textarea.val('UPDATE `pages` SET  WHERE `id` = ');
			});

			$('#insert').click(function() {
				textarea.val('INSERT INTO `pages` VALUES ()');
			});

			textarea.on('keyup', function(e) {
				if(e.keyCode === 13 && e.ctrlKey) {
					$('form').submit();
				}
			});

		</script>
	</body>
</html>
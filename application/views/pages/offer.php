<!DOCTYPE html>
<html>
<head>

<?php $this->load->view('elements/head'); ?>
<link rel="stylesheet" href="<?php echo base_url('res/css/offers.css'); ?>">

</head>
<body>

<div class="wrapper">
<?php $this->load->view('elements/header'); ?>
	
	<div class="container">
		<br>
		<div class="row">
			<div class="col-sm-5 col-md-4 text-center">
				<img src="<?php echo base_url("uploads/offers/{$offer['image']}"); ?>" alt="<?php echo $offer['title']; ?>">
			</div>
			<div class="col-sm-7 col-md-8">
				<h1 class="offer-title"><?php echo $offer['title']; ?></h1>
				<div><?php echo $offer['body']; ?></div>
			</div>
		</div>
	</div>

<?php $this->load->view('elements/footer'); ?>
</div>	<!-- END OF WRAPPER -->
</body>
</html>
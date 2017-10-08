<!DOCTYPE html>
<html>
<head>

<?php $this->load->view('elements/head'); ?>

</head>
<body>

<div class="wrapper">
<?php $this->load->view('elements/header'); ?>
<?php echo $page[BODY]; ?>
<?php $this->load->view('elements/footer'); ?>
</div>	<!-- END OF WRAPPER -->
</body>
</html>
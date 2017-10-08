<!DOCTYPE html>
<html>
<head>

<?php $this->load->view('elements/head'); ?>
<link href="<?php echo base_url().'res/css/models.css'; ?>" rel="stylesheet">

</head>
<body>

<div class="wrapper">
<?php $this->load->view('elements/header'); 

echo $page[BODY];

$this->load->view('elements/models');
$this->load->view('elements/why_toyota');
$this->load->view('elements/footer'); ?>
</div>	<!-- END OF WRAPPER -->
</body>
</html>
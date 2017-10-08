<!DOCTYPE html>
<html>
<head>

<?php $this->load->view('elements/head'); ?>
<link href="<?php echo base_url().'res/css/slider.css'; ?>" rel="stylesheet">
<link href="<?php echo base_url().'res/css/models.css'; ?>" rel="stylesheet">

<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenMax.min.js"></script>
<script src="<?php echo base_url().'res/js/SplitText.js'; ?>"></script>

</head>
<body>

<div class="wrapper">
<?php $this->load->view('elements/header'); 
$this->load->view('elements/slider');
$this->load->view('elements/models');
$this->load->view('elements/why_toyota'); ?>
<div>
	<img class="footer-image" alt="Corolla" src="<?php echo base_url().'res/img/home_footer_corolla.jpg'; ?>">
</div>
<?php $this->load->view('elements/footer'); ?>
</div>	<!-- END OF WRAPPER -->
</body>
</html>
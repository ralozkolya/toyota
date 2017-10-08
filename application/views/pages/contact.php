<!DOCTYPE html>
<html>
<head>

<?php $this->load->view('elements/head'); ?>

<script>
	var lang_sending = '<?php echo lang("sending"); ?>';
	var lang_sent = '<?php echo lang("sent"); ?>';
	var lang_send = '<?php echo lang("send"); ?>';
	var url = '<?php echo base_url()."pages/contact_form"; ?>';
</script>

</head>
<body>

<div class="wrapper">
<?php $this->load->view('elements/header'); ?>
<?php echo $page[BODY]; ?>
<?php $this->load->view('elements/contact_form'); ?>
<?php $this->load->view('elements/footer'); ?>
</div>	<!-- END OF WRAPPER -->


<script src="<?php echo base_url().'res/js/contact.js'; ?>"></script>

</body>
</html>
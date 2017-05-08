<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="p20">
	<h1>WELCOME</h1>
	<div class="mb20">
		<a data-toggle="modal" href="#addForm" class="btn btn-primary" id="btnAdd"><strong>+</strong> Add</a>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
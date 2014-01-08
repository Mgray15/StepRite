<div class="content">
	<div class="box">
		<?php echo form_open('admin/tables'); ?>
		<p>
		Select the table you wish to edit entries on and click submit.
		<br/><br/>
		<strong>Table Name:</strong>
		<select id="table" name="table">
		<?php foreach($tables as $table){ ?>
		<option value="<?php echo $table; ?>"><?php echo $table; ?></option>
		<?php } ?>
		</select>
		<br/>
		
		<p><br /><?php echo form_submit('submit','Submit');  ?></p>
	</div>
</div>

<?php echo form_close(); ?>
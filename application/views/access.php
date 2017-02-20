		<span class=" error"><?php if(!empty($message)) echo $message ?></span>

			<?php
				$attributes = array('class' => 'form-horizontal','role' => 'form');
				echo form_open('/access/alter', $attributes);
			?>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-4 control-label"></label>
					<div class="col-sm-6">
					 <?php
							$data = array(
				              'name'        => 'password',
				              'value'       => set_value('password'),
				              'maxlength'   => '100',
							  'class' => 'form-control'
				            );
							echo form_password($data);
						?>
						<span class=" error"><?php echo form_error('password'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8">
						 <button  type="submit" class="btn btn-maroon pull-right">Click</button>
					</div>
				</div>
				<?php
					echo form_close();
				?>

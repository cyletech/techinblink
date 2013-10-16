<section id="content" class="m-t-lg wrapper-md animated fadeInDown"><a class="nav-brand" href="index.html">todo</a>
<div class="row m-n">
	<div class="col-md-4 col-md-offset-4 m-t-lg">
		<section class="panel"><header class="panel-heading bg bg-primary text-center"> Sign up </header>

			<?php

echo $this->Form->create(NULL,array('class'=>'panel-body'));
echo $this->Form->input('name',array('class'=>'form-control','placeholder'=>'Your name','div'=>array('class'=>'form-group'),'label'=>array('label'=>'Display name', 'class'=>'control-label')));
echo $this->Form->input('email',array('class'=>'form-control','placeholder'=>'test@example.com','div'=>array('class'=>'form-group'),'label'=>array('label'=>'Email', 'class'=>'control-label')));
echo $this->Form->input('password',array('type'=>'password','class'=>'form-control','placeholder'=>'Password','div'=>array('class'=>'form-group'),'label'=>array('label'=>'Email', 'class'=>'control-label'))); ?>

			<!--<div class="checkbox">
				<label><input type="checkbox"> Agree the <a href="#">terms and policy</a></label>
			</div>-->
			<?php echo $this->Form->submit('Sign up',array('class'=>'btn btn-info')); ?>
			<div class="line line-dashed">
			</div>
			<p class="text-muted text-center">
				<small>Already have an account?</small>
			</p>
			<?php echo $this->Html->link('Sign in',array('action'=>'signin'),array('class'=>'btn btn-white btn-block')); ?>
		<?php echo $this->Form->end(); ?>
		</section>
	</div>
</div>
</section>
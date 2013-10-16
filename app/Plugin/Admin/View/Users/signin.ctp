<section id="content" class="m-t-lg wrapper-md animated fadeInUp"><a class="nav-brand" href="index.html">todo</a>
<div class="row m-n">
	<div class="col-md-4 col-md-offset-4 m-t-lg">
		<section class="panel"><header class="panel-heading text-center"> Sign in </header>
		<?php

echo $this->Form->create(NULL,array('class'=>'panel-body'));
echo $this->Form->input('email',array('class'=>'form-control','placeholder'=>'test@example.com','div'=>array('class'=>'form-group'),'label'=>array('label'=>'Email', 'class'=>'control-label')));
echo $this->Form->input('password',array('type'=>'password','class'=>'form-control','placeholder'=>'Password','div'=>array('class'=>'form-group'),'label'=>array('label'=>'Email', 'class'=>'control-label'))); ?>
			<!--<a href="#" class="pull-right m-t-xs"><small>Forgot password?</small></a>--><?php echo $this->Form->submit('Sign in',array('class'=>'btn btn-info')); ?>
			<div class="line line-dashed">
			</div>
			<!--<a href="#" class="btn btn-facebook btn-block m-b-sm"><i class="icon-facebook pull-left"></i>Sign in with Facebook</a><a href="#" class="btn btn-twitter btn-block"><i class="icon-twitter pull-left"></i>Sign in with Twitter</a>-->
			<div class="line line-dashed">
			</div>
			<p class="text-muted text-center">
				<small>Do not have an account?</small>
			</p>
			<?php echo $this->Html->link('Sign Up',array('action'=>'signup'),array('class'=>'btn btn-white btn-block')); ?>
		<?php echo $this->Form->end(); ?>
		</section>
	</div>
</div>
</section>
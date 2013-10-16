<?php $this->Html->addCrumb($this->Html->tag('i','',array('escape'=>FALSE,'class'=>'icon-group')).'Users',array('controller'=>$this->params['controller'],'action'=>'all'),array('escape'=>FALSE)); ?>
<?php $this->Html->addCrumb(($user['User']['id'] == AuthComponent::user('id'))?'My Account':$user['User']['name'].'\'s Account',NULL,array('class'=>'active')); ?>

	<section class="tab-pane active" id="basic">
	<?php
	echo $this->Form->create(NULL,array('class'=>'form-horizontal','autocomplete'=>'off','type'=>'file'));?>

	<form class="form-horizontal" method="get" data-validate="parsley">
		<div class="form-group m-t-lg">
			<label class="col-sm-3 control-label">Photo</label>
			<div class="col-sm-4 media m-t-none">
				<div class="bg-light pull-left text-center media-lg thumb-lg">
					<!--<i class="icon-user inline icon-light icon-3x m-t-lg m-b-lg"></i>-->
					<?php echo $this->Html->image('Admin.avatars/'.$user['User']['avatar'],array('plugin'=>TRUE)); ?>
				</div>
				<div class="media-body">
				<?php echo $this->Form->file('User.avatar',array('title'=>'Change','class'=>'btn btn-sm btn-info m-b-sm')); ?>
				<br>
				<?php echo $this->Form->button('Delete',array('type'=>'button','class'=>'btn btn-sm btn-default')); ?>
					
				</div>
			</div>
		</div>
		<div class="form-group">
			<?php echo $this->Form->label('User.email','Email',array('class'=>'col-sm-3 control-label')); ?>
			<div class="col-sm-4">
			<?php echo $this->Form->input('User.email',array('placeholder'=>'test@example.com','value'=>$user['User']['email'],'class'=>'bg-focus form-control','data-required'=>'true','label'=>FALSE)); ?>
			</div>
		</div>
		<div class="form-group">
		<?php echo $this->Form->label('User.password','Password',array('class'=>'col-sm-3 control-label')); ?>
			<div class="col-sm-4">
			<?php echo $this->Form->input('User.password',array('type'=>'password','placeholder'=>'Leave blank for not to change','class'=>'bg-focus form-control','label'=>FALSE)); ?>
				<div class="line line-dashed m-t-lg">
				</div>
			</div>
		</div>
		<div class="form-group">
			<?php echo $this->Form->label('User.name','Name',array('class'=>'col-sm-3 control-label')); ?>
			<div class="col-sm-4">
			<?php echo $this->Form->input('User.name',array('placeholder'=>'enter your name','value'=>$user['User']['name'],'class'=>'bg-focus form-control','data-required'=>'true','label'=>FALSE)); ?>
			</div>
		</div>
		<?php if(AuthComponent::user('role') == 'Supervisor'): ?>
		<div class="form-group">
			<?php echo $this->Form->label('User.role','Role',array('class'=>'col-sm-3 control-label')); ?>
			<div class="col-sm-4">
			<?php echo $this->Form->select('User.role',$this->User->exportRoles(),array('class'=>'form-control','value'=>$user['User']['role'],'empty'=>FALSE)); ?>
			</div>
		</div>
	<?php endif; ?>
<div class="form-group">
			<?php echo $this->Form->label('User.deactivate','Deactivate',array('class'=>'col-sm-3 control-label')); ?>
			<div class="col-sm-4 checkbox">
			<?php echo $this->Form->checkbox('User.deactivate',array('checked'=>$user['User']['deactivate'],'value'=>$user['User']['deactivate'])); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $this->Form->label('User.mobile','Mobile',array('class'=>'col-sm-3 control-label')); ?>
			<div class="col-sm-4">
			<?php echo $this->Form->input('User.mobile',array('type'=>'tel','placeholder'=>'enter your mobile number','value'=>$user['User']['mobile'],'class'=>'bg-focus form-control','data-required'=>'true','label'=>FALSE)); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $this->Form->label('User.location','Location',array('class'=>'col-sm-3 control-label')); ?>
			<div class="col-sm-4">
			<?php echo $this->Form->input('User.location',array('type'=>'tel','placeholder'=>'enter your location','value'=>$user['User']['location'],'class'=>'bg-focus form-control','label'=>FALSE)); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $this->Form->label('User.facebook','Facebook',array('class'=>'col-sm-3 control-label')); ?>
			<div class="col-sm-4">
			<?php echo $this->Form->input('User.facebook',array('type'=>'url','placeholder'=>'Facebook url','value'=>$user['User']['facebook'],'class'=>'bg-focus form-control','label'=>FALSE)); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $this->Form->label('User.twitter','Twitter',array('class'=>'col-sm-3 control-label')); ?>
			<div class="col-sm-4">
			<?php echo $this->Form->input('User.twitter',array('type'=>'url','placeholder'=>'Twitter url','value'=>$user['User']['twitter'],'class'=>'bg-focus form-control','label'=>FALSE)); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $this->Form->label('User.gplus','Google Plus',array('class'=>'col-sm-3 control-label')); ?>
			<div class="col-sm-4">
			<?php echo $this->Form->input('User.gplus',array('type'=>'url','placeholder'=>'Google Plus url','value'=>$user['User']['gplus'],'class'=>'bg-focus form-control','label'=>FALSE)); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-3">
			<?php echo $this->Form->button('Cancel',array('type'=>'button','class'=>'btn btn-white'));
			echo $this->Form->submit('Save changes',array('div'=>FALSE,'class'=>'btn btn-primary')); ?>
			</div>
		</div>
	<?php echo $this->Form->end(); ?>
	</section>
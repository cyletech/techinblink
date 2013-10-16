<?php $this->Html->addCrumb($this->Html->tag('i','',array('escape'=>FALSE,'class'=>'icon-group')).'Users',array('controller'=>$this->params['controller'],'action'=>'all'),array('escape'=>FALSE)); ?>
<?php $this->Html->addCrumb(($user['User']['id'] == AuthComponent::user('id'))?'My Profile':$user['User']['name'].' Profile',NULL,array('class'=>'active')); ?>
<section class="hbox stretch"><aside class="aside-lg bg-light lter b-r"><section class="vbox">
<div class="wrapper col-md-2">
	<div class="clearfix m-b">
		<a href="#" class="pull-left thumb m-r"><?php echo $this->Html->image('Admin.avatars/'.AuthComponent::user('avatar'),array('plugin'=>TRUE,'class'=>'img-circle')); ?></a>
		<div class="clear">
			<div class="h3 m-t-xs m-b-xs"><?php echo $user['User']['name']; ?>
			</div>
			<small class="text-muted"><i class="icon-map-marker"></i> <?php echo $user['User']['location']; ?></small>
		</div>
	</div>
	<div class="panel wrapper">
		<div class="row">
			<div class="col-xs-4">
				<a href="#"><span class="m-b-xs h4 block"><?php echo $this->requestAction(array('controller'=>'posts','action'=>'total_posts'),array($user['User']['id'])); ?></span><small class="text-muted">Posts</small></a>
			</div>
		</div>
	</div>
	<div>
		<small class="text-uc text-xs text-muted">mobile number</small>
		<p>
			<?php echo $user['User']['mobile']; ?>
		</p>

		<div class="line">
		</div>
		<small class="text-uc text-xs text-muted">connection</small>
		<p class="m-t-sm">
			<a href="<?php echo $user['User']['twitter']; ?>" class="btn btn-rounded btn-twitter btn-icon"><i class="icon-twitter"></i></a><a href="<?php echo $user['User']['facebook']; ?>" class="btn btn-rounded btn-facebook btn-icon"><i class="icon-facebook"></i></a><a href="<?php echo $user['User']['gplus']; ?>" class="btn btn-rounded btn-gplus btn-icon"><i class="icon-google-plus"></i></a>
		</p>
	</div>
</div></section></aside></section>
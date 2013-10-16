<?php $this->Html->addCrumb($this->Html->tag('i','',array('escape'=>FALSE,'class'=>'icon-file-text')).'Posts',array('controller'=>$this->params['controller'],'action'=>'all'),array('escape'=>FALSE)); ?>
<?php $this->Html->addCrumb('All Posts',NULL,array('class'=>'active')); ?>
	<div class="col-lg-8">
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<?php foreach($posts as $post): ?>
					<?php if($post['Post']['image'] == NULL): ?>
				<section class="panel">
				<div class="panel-body">
					<div class="clearfix m-b">
						<small class="text-muted pull-right"><?php echo $this->Time->timeAgoInWords($post['Post']['time'],array('end'=>'1 day')); ?>
						</small><?php echo $this->Html->link($this->Html->image('Admin.avatars/'.$post['User']['avatar'], array('plugin'=>TRUE,'class' => 'img-circle')),array('controller'=>'users','action'=>'profile'),array('class'=>'thumb-sm pull-left m-r','escape'=>FALSE)); ?>
						<!--<a href="#" class="thumb-sm pull-left m-r"><img src="images/avatar.jpg" class="img-circle"></a>-->
						<div class="clear">
							<a href="#"><strong><?php echo $post['User']['name']; ?>
							</strong></a>
							<small class="block text-muted"><?php echo $post['User']['role']; ?></small>
						</div>
					</div>
					<p>
						<?php echo $post['Post']['text']; ?>
					</p>
					<!--<small class=""><a href="#"><i class="icon-comment-alt"></i> Comments (25)</a></small>-->
				</div>
				<!--<footer class="panel-footer pos-rlt"><span class="arrow top"></span>
				<form class="pull-out">
					<input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment...">
				</form>
				</footer>-->
				</section>
			<?php elseif($post['Post']['image'] != NULL): ?>
				<section class="panel no-borders hbox"><aside class="bg-info lter r-l text-center v-middle">
		<div class="wrapper">
			<i class="icon-dribbble icon-4x"></i>
			<p class="text-muted">
				<em>dribbble invitation</em>
			</p>
		</div>
		</aside><aside>
		<div class="pos-rlt">
			<span class="arrow left hidden-xs"></span>
			<div class="panel-body">
				<div class="clearfix m-b">
					<small class="text-muted pull-right">2 days ago</small><a href="#" class="thumb-sm pull-left m-r"><img src="images/avatar.jpg" class="img-circle"></a>
					<div class="clear">
						<a href="#"><strong><?php echo $post['Post']['user_id']; ?></strong></a><!--<small class="block text-muted">San Francisco, USA</small>-->
					</div>
				</div>
				<p>
					 <?php echo $post['Post']['text']; ?>
				</p>
				<!--<small class=""><a href="#"><i class="icon-comment-alt"></i> Comments (10)</a></small>-->
			</div>
			<!--<footer class="panel-footer">
			<form class="pull-out b-t">
				<input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment...">
			</form>
			</footer>-->
		</div>
		</aside></section>
	<?php endif; ?>
				<?php endforeach; ?>
			</div>
			
		</div>

	</div>
</div>
</section></section><a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body"></a></section>
<!-- /.vbox -->
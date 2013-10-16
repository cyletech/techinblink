<?php $this->Html->addCrumb($this->Html->tag('i','',array('escape'=>FALSE,'class'=>'icon-file-text')).'Posts',array('controller'=>$this->params['controller'],'action'=>'all'),array('escape'=>FALSE)); ?>
<?php $this->Html->addCrumb('New Post',NULL,array('class'=>'active')); ?>
	<div class="col-lg-8">
		<section class="panel">
		<form>
			<textarea class="form-control input-lg no-border" rows="2" placeholder="What are you doing..."></textarea>
		</form>
		<footer class="panel-footer bg-light lter"><button class="btn btn-info pull-right">POST</button>
		<ul class="nav nav-pills">
			<li><a href="#" title="Link Source"><i class="icon-link"></i></a></li>
			<li><a href="#" title="Add Picture"><i class="icon-camera"></i></a></li>
			<li><a href="#" title="Link External Webpage"><i class="icon-external-link-sign"></i></a></li>
			<li><a href="#" title="Save as Draft"><i class="icon-save"></i></a></li>
		</ul>
		</footer></section>
		

	</div>
</div>
</section></section><a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body"></a></section>
<!-- /.vbox -->
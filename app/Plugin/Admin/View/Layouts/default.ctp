<?php
echo $this->Html->doctype();
?><html lang="en">
<head>
<?php
echo $this->Html->charset();
?> <title><?php
echo $title_for_layout;
?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
echo $this->Html->css('Admin.font.css');
echo $this->Html->css('Admin.app.v1.css');
?>
</head>
<body>
<?php
if (AuthComponent::user()):
?> <section class="hbox stretch">
<!-- .aside -->
<aside class="bg-primary aside-sm" id="nav"><section class="vbox"><header class="dker nav-bar"><a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="body"><i class="icon-reorder"></i></a><a href="#" class="nav-brand">todo</a><a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user"><i class="icon-comment-alt"></i></a></header><footer class="footer bg-gradient hidden-xs"><?php echo $this->Html->link($this->Html->tag('i','',array('escape'=>FALSE,'class'=>'icon-off')),array('controller'=>'users','action'=>'signout'),array('escape'=>FALSE,'class'=>'btn btn-sm btn-link m-r-n-xs pull-right')); ?><a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm"><i class="icon-reorder"></i></a></footer><section>
<!-- user -->
<div class="bg-success nav-user hidden-xs pos-rlt">
	<div class="nav-avatar pos-rlt">
		<?php
    echo $this->Html->link($this->Html->image('Admin.avatars/' . AuthComponent::user('avatar'), array(
        'plugin' => TRUE
    )) . '<span class="caret caret-white"></span>', '#', array(
        'class' => 'thumb-sm avatar animated rollIn',
        'data-toggle' => 'dropdown',
        'escape' => FALSE
    ));
?>
		<ul class="dropdown-menu m-t-sm animated fadeInLeft">
			<span class="arrow top"></span>
			<li><?php echo $this->Html->link('Settings',array('controller'=>'users','action'=>'account')); ?></li>
			<li><?php echo $this->Html->link('Profile',array('controller'=>'users','action'=>'profile')); ?></li>
			<li><a href="#"><span class="badge bg-danger pull-right">3</span> Notifications </a></li>
			<li class="divider"></li>
			<li><?php echo $this->Html->link('Sign out',array('controller'=>'users','action'=>'signout')); ?></li>
		</ul>
		<div class="visible-xs m-t m-b">
			<a href="#" class="h3">John.Smith</a>
			<p>
				<i class="icon-map-marker"></i> London, UK
			</p>
		</div>
	</div>
	<div class="nav-msg">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="badge badge-white count-n">2</b></a><section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
		<div class="arrow left">
		</div>
		<section class="panel bg-white"><header class="panel-heading"><strong>You have <span class="count-n">2</span> notifications</strong></header>
		<div class="list-group">
			<a href="#" class="media list-group-item"><span class="pull-left thumb-sm"><img src="images/avatar.jpg" alt="John said" class="img-circle"></span><span class="media-body block m-b-none"> Use awesome animate.css<br>
			<small class="text-muted">28 Aug 13</small></span></a><a href="#" class="media list-group-item"><span class="media-body block m-b-none"> 1.0 initial released<br>
			<small class="text-muted">27 Aug 13</small></span></a>
		</div>
		<footer class="panel-footer text-sm"><a href="#" class="pull-right"><i class="icon-cog"></i></a><a href="#">See all the notifications</a></footer></section></section>
	</div>
</div>
<!-- / user -->
<!-- nav -->
<nav class="nav-primary hidden-xs">
<ul class="nav">
	<li class="<?php
    if ($this->params['controller'] == 'admin')
        echo 'active';
?>"><?php
    echo $this->Html->link($this->Html->tag('i', '', array(
        'class' => 'icon-eye-open',
        'escape' => FALSE
    )) . $this->Html->tag('span', 'Dashboard', array(
        'escape' => FALSE
    )), array(
        'controller' => 'admin',
        'action' => 'index'
    ), array(
        'escape' => FALSE
    ));
?></li>
	<li class="dropdown-submenu <?php
    if ($this->params['controller'] == 'posts')
        echo 'active';
?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text"></i><span>Posts</span></a>
	<ul class="dropdown-menu">
		<li><?php
    echo $this->Html->link('All', array(
        'controller' => 'posts',
        'action' => 'all'
    ));
?></li>
		<li><?php
    echo $this->Html->link('New Post', array(
        'controller' => 'posts',
        'action' => 'new_post'
    ));
?></li>
	</ul>
	</li>
	<li class="dropdown-submenu <?php
        if ($this->params['controller'] == 'users')
            echo 'active';
?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-group"></i><span>Users</span></a>
	<ul class="dropdown-menu">
	<?php if(AuthComponent::user('role') == 'Supervisor'): ?>
		<li><?php
        echo $this->Html->link('All', array(
            'controller' => 'users',
            'action' => 'all'
        ));
?></li>
		<li><?php
        echo $this->Html->link('New User', array(
            'controller' => 'users',
            'action' => 'signup'
        ));
?></li>
<?php endif; ?>
<li><?php
        echo $this->Html->link('My Profile', array(
            'controller' => 'users',
            'action' => 'profile'
        ));
?></li>
<li><?php
        echo $this->Html->link('My Account', array(
            'controller' => 'users',
            'action' => 'account'
        ));
?></li>
	</ul>
	</li>
	<li class="dropdown-submenu <?php
        if ($this->params['controller'] == 'notes')
            echo 'active';
?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-paper-clip"></i><span>Notes</span></a>
	<ul class="dropdown-menu">
		<li><?php
        echo $this->Html->link('My Received Notes', array(
            'controller' => 'notes',
            'action' => 'index'
        ));
?></li>
		<li><?php
        echo $this->Html->link('New Note', array(
            'controller' => 'notes',
            'action' => 'new_note'
        ));
?></li>
	</ul>
	</li>
</ul>
</nav>
<!-- / nav -->
<!-- note -->
<!--<div class="bg-danger wrapper hidden-vertical animated rollIn text-sm">
	<a href="#" data-dismiss="alert" class="pull-right m-r-n-sm m-t-n-sm"><i class="icon-close icon-remove "></i></a> Hi, welcome to todo, you can start here.
</div>-->
<!-- / note -->
</section></section></aside>
<!-- /.aside -->
<!-- .vbox -->
<section id="content"><section class="vbox"><section class="scrollable wrapper">
<div class="row">
<div class="col-lg-12">
		<!-- .breadcrumb -->
		<ul class="breadcrumb">
			<?php echo $this->Html->getCrumbs(' / ',array('url'=>array('controller'=>'admin','action'=>'index'),'text'=>$this->Html->tag('i','',array('escape'=>FALSE,'class'=>'icon-home')).'Home','escape'=>FALSE)); ?>
		</ul>
		<!-- / .breadcrumb -->
	</div>
<?php
endif;
?>
<?php
echo $this->Session->flash();
?> <?php
echo $this->fetch('content');
?>
</div></section></section></section>
<?php
echo $this->Html->script('Admin.app.v1.js');
?> </section>
</body>
</html>
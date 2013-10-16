<?php $this->Html->addCrumb($this->Html->tag('i','',array('escape'=>FALSE,'class'=>'icon-group')).'Users',array('controller'=>$this->params['controller'],'action'=>'all'),array('escape'=>FALSE)); ?>
<?php $this->Html->addCrumb('All Users',NULL,array('class'=>'active')); ?>
<div class="col-lg-12"><section class="panel"><header class="panel-heading"> Responsive Table </header>
		<div class="row text-sm wrapper">
			<div class="col-sm-9 m-b-xs">
				<select class="input-sm form-control input-s-sm inline">
					<option value="deactivate">Deactivate</option>
					<option value="delete">Delete</option>
				</select>
				<button class="btn btn-sm btn-white">Apply</button>
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<input type="text" class="input-sm form-control" placeholder="Search"><span class="input-group-btn"><button class="btn btn-sm btn-white" type="button">Go!</button></span>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-striped b-t text-sm">
			<thead>
			<tr>
				<th width="20">
					<input type="checkbox">
				</th>
				<th class="th-sortable" data-toggle="class">
					Name <span class="th-sort"><i class="icon-sort-down text"></i><i class="icon-sort-up text-active"></i><i class="icon-sort"></i></span>
				</th>
				<th>
					Email
				</th>
				<th>
					Create Time
				</th>
				<th>
					Last Modified
				</th>
				<th>
					Role
				</th>
				<th width="30">
				Active/Deactive
				</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($users as $user): ?>
			<tr>
				<td>
					<input type="checkbox" name="post[]" value="2">
				</td>
				<td>
					<?php echo $user['User']['name']; ?>
				</td>
				<td>
					<?php echo $user['User']['email']; ?>
				</td>
				<td>
					<?php echo $user['User']['created']; ?>
				</td>
				<td>
					<?php echo $user['User']['modified']; ?>
				</td>
				<td>
					<?php echo $user['User']['role']; ?>
				</td>
				<td>
					<a href="#" class="<?php echo ($user['User']['deactivate'])?'deactive':'active'; ?>" data-toggle="class"><i class="icon-ok text-success text-active"></i><i class="icon-remove text-danger text"></i></a>
				</td>
			</tr>
		<?php endforeach; ?>
			</tbody>
			</table>
		</div>
		<footer class="panel-footer">
		<div class="row">
			<div class="col-sm-4 hidden-xs">
				<select class="input-sm form-control input-s-sm inline">
					<option value="0">Bulk action</option>
					<option value="1">Delete selected</option>
					<option value="2">Bulk edit</option>
					<option value="3">Export</option>
				</select>
				<button class="btn btn-sm btn-white">Apply</button>
			</div>
			<div class="col-sm-4 text-center">
				<small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
			</div>
			<div class="col-sm-4 text-right text-center-xs">
				<ul class="pagination pagination-sm m-t-none m-b-none">
					<li><a href="#"><i class="icon-chevron-left"></i></a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#"><i class="icon-chevron-right"></i></a></li>
				</ul>
			</div>
		</div>
		</footer></section></div>
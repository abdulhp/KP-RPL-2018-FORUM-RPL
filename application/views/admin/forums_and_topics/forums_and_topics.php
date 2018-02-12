<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-2">
			<ul class="nav nav-pills nav-stacked">
				<!-- <li role="presentation"><a href="<?= base_url('admin') ?>">Home</a></li> -->
				<li role="presentation"><a href="<?= base_url('admin/users') ?>">Users</a></li>
				<li role="presentation" class="active"><a href="#">Forums & topics</a></li>
				<!-- <li role="presentation"><a href="<?= base_url('admin/options') ?>">Options</a></li> -->
				<!--		<li role="presentation"><a href="<?= base_url('admin/emails') ?>">Emails</a></li> -->
			</ul>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Forums</h3>
				</div>
				<div class="panel-body">
					<div class="panel-body">
						<table class="table table-striped">
							<caption></caption>
							<thead>
								<tr>
									<th>Id</th>
									<th>Title</th>
									<th class="hidden-xs">Created at</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($forums as $forum) : ?>
									<tr>
										<td><?= $forum->id ?></td>
										<td><a href="<?= base_url($forum->slug); ?>"><?= $forum->title ?></a></td>
										<td class="hidden-xs"><?= $forum->created_at ?></td>
										<td><a class="btn btn-xs btn-primary" href="">Edit</a> <a class="btn btn-xs btn-danger" href="<?= base_url('admin/delete_forum/' . $forum->slug) ?>">Delete</a></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>

						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Topics</h3>
					</div>
					<div class="panel-body">
						<div class="panel-body">
							<table class="table table-striped">
								<caption></caption>
								<thead>
									<tr>
										<th>#</th>
										<th>Forums</th>
										<th>Rights</th>
										<th class="hidden-xs">Registration date</th>
										<th>Action</th>
									</tr>
								</thead>

								</table>

							</div>
						</div>
					</div>

				</div>



			</div><!-- .row -->
</div><!-- .container -->
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#basicModal">
	Tambah User
</button>
<!-- begin modal tambah user -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah User</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/user/tambah') ?>" enctype="multipart/form-data" method="post" >
					<div class="mb-3">
						<label for="" class="form-label">Nama</label>
						<input type="text" name="nama" class="form-control">
					</div>
					<div class="mb-3">
					<label for="" class="form-label">Username</label>
					<input type="text" name="username" class="form-control">
					</div>
					<div class="mb-3">
					<label for="" class="form-label">Foto</label>
					<input type="file" name="foto" class="form-control">
					</div>
					<div class="mb-3">
					<label for="" class="form-label">Password</label>
					<input type="password" name="password" class="form-control">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- end modal tambah user -->
<table class="table datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Foto User</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($user as $uu){ ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $uu['nama'] ?></td>
			<td><?= $uu['username'] ?></td>
			<td>
				<img src="<?= base_url('assets/foto-user/'.$uu['foto']) ?>" class="img-thumbnail" width="200px" height="200px" alt="">
			</td>
			<td>
				<?php if($this->session->userdata('id_user') != $uu['id_user']){ ?>
				<a href="<?= base_url('admin/user/delete/'.$uu['foto']) ?>" class="btn btn-danger" onclick="return confirm('yakin hapus foto')" ><i class="bi bi-trash"></i></a>
				<?php } ?>
				<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#user<?= $uu['id_user'] ?>">
					<i class="bi bi-pencil"></i>
				</button>
				<!-- modal update -->
				<div class="modal fade" id="user<?= $uu['id_user'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Update User</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form action="<?= base_url('admin/user/update') ?>" enctype="multipart/form-data" method="post">
									<input type="hidden" value="<?= $uu['foto'] ?>" name="nama_foto" >
									<input type="hidden" value="<?= $uu['id_user'] ?>" name="id_user" >
									<div class="mb-3">
										<label for="" class="form-label">Nama</label>
										<input type="text" name="nama" value="<?= $uu['nama'] ?>" class="form-control">
									</div>
									<div class="mb-3">
										<label for="" class="form-label">Username</label>
										<input type="text" name="username" value="<?= $uu['username'] ?>" class="form-control">
									</div>
									<div class="mb-3">
										<label for="" class="form-label">Foto</label>
										<input type="file" name="foto" class="form-control">
									</div>
									<div class="mb-3">
										<label for="" class="form-label">Password</label>
										<input type="password" name="password" class="form-control"  >
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
							</form>
						</div>
					</div>
				</div>
				 <!-- end modal update -->
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

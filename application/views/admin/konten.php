<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#basicModal">
	Tambah Catatan
</button>
<!-- begin modal tambah Kategori -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Catatan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/konten/tambah') ?>" enctype="multipart/form-data" method="post" >
					<div class="mb-3">
						<label for="" class="form-label">Judul Catatan</label>
						<input type="text" name="judul" class="form-control">
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Keterangan</label>
						<textarea name="keterangan" class="form-control" id=""></textarea>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Kategori Catatan</label>
						<select name="id_kategori" id="" class="form-control">
							<?php foreach($kategori as $kk){ ?>
								<option value="<?= $kk['id_kategori'] ?>"><?= $kk['nama_kategori'] ?></option>
							<?php } ?>	
						</select>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Foto Catatan</label>
						<input type="file" name="foto" class="form-control">
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
			<th>Judul</th>
			<th>Keterangan</th>
			<th>Nama Kategori</th>
			<th>Foto Catatan</th>
			<th>Tanggal</th>
			<th>Pembuat</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($konten as $aa){ ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $aa['judul'] ?></td>
			<td><?= $aa['keterangan'] ?></td>
			<td><?= $aa['nama_kategori'] ?></td>
			<td>
				<img src="<?= base_url('assets/foto-konten/'.$aa['foto_konten']) ?>" width="200px" height="200px" alt="">
			</td>
			<td><?= $aa['tanggal'] ?></td>
			<td><?= $aa['nama'] ?></td>
			<td>
				<a href="<?= base_url('admin/konten/delete/'.$aa['foto_konten']) ?>" class="btn btn-danger" onclick="return confirm('yakin hapus catatan?')" ><i class="bi bi-trash"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

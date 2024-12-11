<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#basicModal">
	Tambah Kategori
</button>
<!-- begin modal tambah Kategori -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Kategori</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/kategori/tambah') ?>" enctype="multipart/form-data" method="post" >
					<div class="mb-3">
						<label for="" class="form-label">Nama Kategori</label>
						<input type="text" name="nama_kategori" class="form-control">
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
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($kategori as $uu){ ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $uu['nama_kategori'] ?></td>
			<td>
				<a href="<?= base_url('admin/kategori/delete/'.$uu['id_kategori']) ?>" class="btn btn-danger delete-button" data-href="<?= base_url('admin/kategori/delete/'.$uu['id_kategori']) ?>" ><i class="bi bi-trash"></i></a>
				<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#kategori<?= $uu['id_kategori'] ?>">
					<i class="bi bi-pencil"></i>
				</button>
				<!-- modal update -->
				<div class="modal fade" id="kategori<?= $uu['id_kategori'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Update Kategori</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form action="<?= base_url('admin/kategori/update') ?>" enctype="multipart/form-data" method="post">
									<input type="hidden" name="id_kategori" value="<?= $uu['id_kategori'] ?>" >
									<div class="mb-3">
										<label for="" class="form-label">Nama Kategori</label>
										<input type="text" name="nama_kategori" value="<?= $uu['nama_kategori'] ?>" class="form-control">
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Pilih semua tombol dengan class "delete-button"
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // Mencegah tautan langsung dijalankan
                const href = this.getAttribute('data-href'); // Ambil URL dari atribut data-href

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect ke URL jika dikonfirmasi
                        window.location.href = href;
                    }
                });
            });
        });
    });
</script>

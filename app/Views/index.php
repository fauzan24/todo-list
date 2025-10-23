<div class="container-fluid">
    <h1>Daftar Tugas</h1>   
    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    <?php endif; ?>
    
    <?php if(session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    <?php endif; ?>

    <a href="<?= base_url('tambah')?>" class="btn btn-warning">
        <i class="fas fa-plus"> Tambah Tugas</i>
    </a>
    <table class="table table-bordered text-center">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Tugas</th>
                <th>Status</th>
                <th>Prioritas</th>
                <th>Dibuat pada</th>
                <th>Deadline</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($tugas as $t) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td class="text-left"><?= esc($t['task_name'])?></td>
                    <td>
                        <span class="badge badge-<?= ($t['status'] == 'belum') ? 'danger' : 'success' ?>">
                            <?= ucfirst($t['status']) ?>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-<?= ($t['priority'] == 'biasa') ? 'success' : ($t['priority'] == 'cukup' ? 'warning' : 'danger') ?> ">
                            <?= ucfirst($t['priority']) ?>
                        </span>
                    </td>
                    <td><?= esc($t['created_at']) ?></td>
                    <td><?= esc($t['deadline']) ?></td>
                    <td>
                        <a href="<?= base_url('update_status/' . $t['task_id']) ?>" class="btn btn-<?= ($t['status'] == 'belum') ? 'danger' : 'success disabled' ?>">
                            <i class="fas fa-<?= ($t['status'] == 'belum') ? 'times' : 'check' ?>"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('edit/' . $t['task_id']) ?>" class="btn btn-<?= ($t['status'] == 'belum') ? 'info' : 'secondary disable'?>">
                            <i class="fas fa-edit"> Edit</i>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('hapus/' . $t['task_id']) ?>" class="btn btn-danger"
                        onclick="return confirm('Yakin Ingin Menghapus Tugas Ini');">
                            <i class="fas fa-trash">Hapus</i>
                    </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
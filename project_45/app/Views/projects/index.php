<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Daftar Proyek Jawa Timur 2024</h2>
<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
        + Tambah Data
    </button>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>No Urut</th>
            <th>Regional</th>
            <th>Tanggal Terbit</th>
            <th>Type Pekerjaan</th>
            <th>No WO</th>
            <th>Area</th>
            <th>Site Name</th>
            <th>Pekerjaan</th>
            <th>Alamat</th>
            <th>Nilai ICON-SGN</th>
            <th>Nilai Total DRM</th>
            <th>Nilai SGN-MANDOR</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projects as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['no_urut'] ?></td>
            <td><?= $p['regional'] ?></td>
            <td><?= date('d-m-Y', strtotime($p['tanggal_terbit'])) ?></td>
            <td><?= $p['type_pekerjaan'] ?></td>
            <td><?= $p['no_wo'] ?></td>
            <td><?= $p['area'] ?></td>
            <td><?= $p['site_name'] ?></td>
            <td><?= $p['pekerjaan'] ?></td>
            <td><?= $p['alamat'] ?></td>
            <td>Rp<?= number_format($p['nilai_icon_sgn'], 0, ',', '.') ?></td>
            <td>Rp<?= number_format($p['nilai_total_drm'], 0, ',', '.') ?></td>
            <td>Rp<?= number_format($p['nilai_sgn_mandor'], 0, ',', '.') ?></td>
            <td><?= date('d-m-Y H:i:s', strtotime($p['created_at'])) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>



<?= $this->endSection() ?>

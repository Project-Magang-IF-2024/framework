<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Edit Data Mahasiswa</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Mahasiswa</li>
                    <li class="breadcrumb-item">Edit Data</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-sm-12 col-xl-12">
        <div class="row">
            <div class="col-sm-12">
                <?php echo form_open_multipart('acc/edit', 'role="form" method="post" class="theme-form mega-form"'); 
                echo form_hidden('id', $data['id']); // Updated to match your column name
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Edit Data acc</h5>
                    </div>
                    <div class="card-body">
                        <h6>Identitas Diri</h6>
                        <div class="form-group">
                            <label class="col-form-label">Kode ujian Proposal</label>
                            <input class="form-control" name="kode_ujian_proposal" value="<?php echo $data['kode_ujian_proposal'] ?>" type="text" placeholder="Isikan NIK Mahasiswa" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">acc</label>
                            <input class="form-control" name="acc_pbb1" value="<?php echo $data['acc_pbb1'] ?>" type="text" placeholder="Isikan NIM" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">acc 2</label>
                            <input class="form-control" name="acc_pbb2" value="<?php echo $data['acc_pbb2'] ?>" type="text" placeholder="Isikan Nama" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">pujian</label>
                            <input class="form-control" name="acc_puji1" value="<?php echo $data['acc_puji1'] ?>" type="text" placeholder="Isikan Alamat" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">pujian 2</label>
                            <input class="form-control" name="acc_puji2" value="<?php echo $data['acc_puji2'] ?>" type="text" placeholder="Isikan No HP" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">acc_tata_tulis</label>
                            <input class="form-control" name="acc_tata_tulis" value="<?php echo $data['acc_tata_tulis'] ?>" type="email" placeholder="Isikan Email" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">acc_upload_laporan</label>
                            <input class="form-control" name="acc_upload_laporan" value="<?php echo $data['acc_upload_laporan'] ?>" type="text" placeholder="kode prodi" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">acc_kaprodi</label>
                            <input class="form-control" name="acc_kaprodi" value="<?php echo $data['acc_kaprodi'] ?>" type="text" placeholder="Isikan Angkatan" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <?php echo anchor('acc', '<button type="button" class="btn btn-danger text-center">Kembali</button>'); ?>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

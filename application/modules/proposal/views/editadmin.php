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
                <?php echo form_open_multipart('proposal/edit', 'role="form" method="post" class="theme-form mega-form"'); 
                echo form_hidden('id', $data['id']); // Updated to match your column name
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Edit Data Proposal</h5>
                    </div>
                    <div class="card-body">
                        <h6>Proposal</h6>
                        <div class="form-group">
                            <label class="col-form-label">Periode Proposal</label>
                            <input class="form-control" name="periode_prop" value="<?php echo $data['periode_prop'] ?>" type="text" placeholder="isi periode proposal">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Prodi Proposal</label>
                            <input class="form-control" name="prodi_prop" value="<?php echo $data['prodi_prop'] ?>" type="text" placeholder="Isikan prodi proposal">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIM Proposal</label>
                            <input class="form-control" name="nim_prop" value="<?php echo $data['nim_prop'] ?>" type="text" placeholder="Isikan NIM Proposal">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kode Proposal</label>
                            <input class="form-control" name="kode_prop" value="<?php echo $data['kode_prop'] ?>" type="text" placeholder="Isikan Kode Proposal">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Judul Proposal</label>
                            <input class="form-control" name="judul_proposal" value="<?php echo $data['judul_proposal'] ?>" type="text" placeholder="Isikan Judul Proposal">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIK Pembimbing 1</label>
                            <input class="form-control" name="nik_pembimbing1" value="<?php echo $data['nik_pembimbing1'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIK Pembimbing 2</label>
                            <input class="form-control" name="nik_pembimbing2" value="<?php echo $data['nik_pembimbing2'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIK Kaprodi</label>
                            <input class="form-control" name="nik_kaprodi" value="<?php echo $data['nik_kaprodi'] ?>" type="text" placeholder="Isikan Alamat">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">ACC Kaprodi</label>
                            <div class="form-check">
                                <input class="form-check-input" name="acc_kaprodi" id='setuju' value="1" type="radio">
                                <label class="form-check-label" for="setuju">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="acc_kaprodi" id='tidaksetuju' value="0" type="radio">
                                <label class="form-check-label" for="tidaksetuju">
                                    Tidak Setuju
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <?php echo anchor('proposal', '<button type="button" class="btn btn-danger text-center">Kembali</button>'); ?>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

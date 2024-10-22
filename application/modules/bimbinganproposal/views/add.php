<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Dosen</li>
                    <li class="breadcrumb-item">Input Data</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="col-sm-12 col-xl-12">
        <div class="row">
            <div class="col-sm-12">
                <?php echo form_open_multipart('bimbinganproposal/add', 'role="form" method="post" class="theme-form mega-form"'); ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Input Data Bimbingan</h5>
                    </div>
                    <div class="card-body">
                        <h6>Identitas Diri</h6>
                        <!-- <div class="form-group">
                            <label class="col-form-label">NIK Mahasiswa</label>
                            <input class="form-control" name="nik_mhs" type="text" placeholder="Isikan NIK Mahasiswa" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Mahasiswa</label>
                            <input class="form-control" name="nama_mhs" type="text" placeholder="Isikan Nama Mahasiswa" required>
                        </div> -->
                        <div class="form-group">
                            <label class="col-form-label">Kode Proposal</label>
                            <input class="form-control" name="kd_prop" type="text" placeholder="Isikan Kode Proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tgl Bimbingan</label>
                            <input class="form-control" name="tgl_bimbingan" type="text" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Materi</label>
                            <input class="form-control" name="materi_bimbingan" type="text" placeholder="Isikan Materi Bimbingan" required>
                        </div>
                        <div class="form-group">
    <label class="col-form-label">Paraf</label>
    <input type="hidden" name = "paraf_pembimbing" value="0">
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="paraf_pembimbing" id="paraf_pembimbing" value="1">
        <label class="form-check-label"for="paraf_pembimbing">Diterima</label>
    </div>
</div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

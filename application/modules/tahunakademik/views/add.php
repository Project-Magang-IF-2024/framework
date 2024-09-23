<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Input Data Mahasiswa</h3>
            </div>
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
                <?php echo form_open_multipart('tahunakademik/add', 'role="form" method="post" class="theme-form mega-form"'); ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Input Data</h5>
                    </div>
                    <div class="card-body">
                        <!-- <h6>Identitas Proposal</h6> -->
                        <div class="form-group">
                            <label class="col-form-label">Kode Tahun Akademik</label>
                            <input class="form-control" name="kode_thn_akad" type="text" placeholder="isi kode_ujian_proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Tahun Akademik</label>
                            <input class="form-control" name="nama_thn_akad" type="text" placeholder="isi dosen" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Semester Akademik</label>
                            <input class="form-control" name="smt_akad" type="text" placeholder="isi dosen" required>
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

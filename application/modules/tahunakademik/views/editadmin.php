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
                <?php echo form_open_multipart('tahunakademik/edit', 'role="form" method="post" class="theme-form mega-form"'); 
                echo form_hidden('id', $data['id']); // Updated to match your column name
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Edit Data Proposal</h5>
                    </div>
                    <div class="card-body">
                        <h6>Proposal</h6>
                        <div class="form-group">
                            <label class="col-form-label">Kode Tahun Akademik</label>
                            <input class="form-control" name="kode_thn_akad" type="text" value="<?php echo $periode['kode_thn_akad']; ?>" placeholder="isi kode_ujian_proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Tahun Akademik</label>
                            <input class="form-control" name="nama_thn_akad" type="text" value="<?php echo $periode['nama_thn_akad']; ?>" placeholder="isi dosen" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Semester Akademik</label>
                            <input class="form-control" name="smt_akad" type="text" value="<?php echo $periode['smt_akad']; ?>" placeholder="isi dosen" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <?php echo anchor('nilaiproposal', '<button type="button" class="btn btn-danger text-center">Kembali</button>'); ?>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
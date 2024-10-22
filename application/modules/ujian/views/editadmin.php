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
                <?php echo form_open_multipart('ujian/edit', 'role="form" method="post" class="theme-form mega-form"'); 
                echo form_hidden('id', $data['id']); // Updated to match your column name
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Edit Data Ujian Proposal</h5>
                    </div>
                    <div class="card-body">
                        <h6>Ujian</h6>
                        <div class="form-group">
                            <label class="col-form-label">Judul Proposal</label>
                            <input class="form-control" name="judulnya_proposal" value="<?php echo $data['judulnya_proposal'] ?>" type="text" placeholder="isi judul proposal">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kode Proposal</label>
                            <input class="form-control" name="kd_proposal" value="<?php echo $data['kd_proposal'] ?>" type="text" placeholder="Isikan kode proposal">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIM Mahasiswa</label>
                            <input class="form-control" name="nim_ujian_proposal" value="<?php echo $data['nim_ujian_proposal'] ?>" type="text" placeholder="Isikan NIM">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kode Ujian Proposal</label>
                            <input class="form-control" name="kode_ujian_proposal" value="<?php echo $data['kode_ujian_proposal'] ?>" type="text" placeholder="Isikan Kode Ujian Proposal">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal Ujian</label>
                            <input class="form-control" name="tgl_ujian_proposal" value="<?php echo $data['tgl_ujian_proposal'] ?>" type="date" placeholder="Isikan Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Hari Ujian</label>
                            <input class="form-control" name="hari_ujian_proposal" value="<?php echo $data['hari_ujian_proposal'] ?>" type="text" placeholder="Isikan Hari Ujian">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jam Ujian</label>
                            <input class="form-control" name="jam_ujian_proposal" value="<?php echo $data['jam_ujian_proposal'] ?>" type="text" placeholder="Isikan Jam Ujian">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Ruangan Ujian</label>
                            <input class="form-control" name="ruang_ujian_proposal" value="<?php echo $data['ruang_ujian_proposal'] ?>" type="text" placeholder="Isikan Ruangan Ujian">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Pembimbing 1</label>
                            <input class="form-control" name="nik_pbb1_ujian_proposal" value="<?php echo $data['nik_pbb1_ujian_proposal'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Revisi Pembimbing 1</label>
                            <input class="form-control" name="revisi_pbb1" value="<?php echo $data['revisi_pbb1'] ?>" type="text" placeholder="Isikan revisi">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Pujian Pembimbing 1</label>
                            <input class="form-control" name="revisi_puji1" value="<?php echo $data['revisi_puji1'] ?>" type="text" placeholder="Isikan pujian">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Pembimbing 2</label>
                            <input class="form-control" name="nik_pbb2_ujian_proposal" value="<?php echo $data['nik_pbb2_ujian_proposal'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Revisi Pembimbing 2</label>
                            <input class="form-control" name="revisi_pbb2" value="<?php echo $data['revisi_pbb2'] ?>" type="text" placeholder="Isikan revisi">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Pujian Pembimbing 2</label>
                            <input class="form-control" name="revisi_puji2" value="<?php echo $data['revisi_puji2'] ?>" type="text" placeholder="Isikan pujian">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <?php echo anchor('ujian', '<button type="button" class="btn btn-danger text-center">Kembali</button>'); ?>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Edit Data Bimbingan Proposal</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Bimbingan Proposal</li>
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
            <?php echo form_open_multipart('bimbinganproposal/edit', 'role="form" method="post" class="theme-form mega-form"'); 
                echo form_hidden('id', $data['id']);
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Data Bimbingan Proposal</h5>
                    </div>
                    <div class="card-body">
                        <h6>Form Edit Data Bimbingan Proposal</h6>
                        
                        <div class="form-group">
                            <label class="col-form-label">Kode Proposal</label>
                            <input class="form-control" name="kd_prop" value="<?php echo isset($data['kd_prop']) ? $data['kd_prop'] : ''; ?>" type="text" placeholder="Isikan Kode Proposal yang baru" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-form-label">Tanggal Bimbingan</label>
                            <input class="form-control" name="tgl_bimbingan" value="<?php echo isset($data['tgl_bimbingan']) ? $data['tgl_bimbingan'] : ''; ?>" type="text" placeholder="Isikan Tgl bimbingan" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-form-label">Materi</label>
                            <input class="form-control" name="materi_bimbingan" value="<?php echo isset($data['materi_bimbingan']) ? $data['materi_bimbingan'] : ''; ?>" type="text" placeholder="Isikan Materi yang baru" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-form-label">Paraf</label>
                            <input type="hidden" name="paraf_pembimbing" value="0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="paraf_pembimbing" value="1" id="paraf_pembimbing" <?php echo ($data['paraf_pembimbing'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="paraf_pembimbing">Diterima</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <?php echo anchor('bimbinganproposal', '<button type="button" class="btn btn-danger text-center">Kembali</button>'); ?>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

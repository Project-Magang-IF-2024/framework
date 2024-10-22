<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Edit Data Kriteria Nilai Proposal</h3>
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
        <?php echo form_open_multipart('kriterianilai/edit', 'role="form" method="post" class="theme-form mega-form"');
        echo form_hidden('id', $data['id']);
        ?>
        <div class="card">
          <div class="card-header">
            <h5>Form Edit Data Kriteria Nilai Proposal</h5>
          </div>
          <div class="card-body">
            <h6>Nilai Proposal</h6>
            <div class="form-group">
              <label class="col-form-label">Kriteria</label>
              <input class="form-control" name="kode_kriteria" value="<?php echo $data['kode_kriteria'] ?>" type="text" placeholder="Isikan Kode Kriteria">
            </div>
            <div class="form-group">
              <label class="col-form-label">Nama Kriteria</label>
              <textarea class="form-control" name="nama_kriteria" placeholder="Isikan Nama Kriteria" rows="3" required><?php echo $data['nama_kriteria']; ?></textarea>
            </div>
            <div class="form-group">
              <label class="col-form-label">Jenis</label>
              <select class="form-control" name="jenis" required>
                <option value="P" <?php echo ($data['jenis'] == 'P') ? 'selected' : ''; ?>>P</option>
                <option value="S" <?php echo ($data['jenis'] == 'S') ? 'selected' : ''; ?>>S</option>
              </select>
            </div>
            <!-- <div class="form-group">
              <label class="col-form-label">Jenis</label>
              <input class="form-control" name="jenis" value="<?php echo $data['jenis'] ?>" type="text" placeholder="Isikan jenis">
            </div> -->
            <div class="form-group">
              <label class="col-form-label">Status</label>
              <!-- Hidden input to ensure false value is sent if checkbox is not checked -->
              <input type="hidden" name="status" value="0">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="status" value="1" id="status" <?php echo ($data['status'] == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="status">Aktif</label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Versi</label>
              <input class="form-control" name="versi" value="<?php echo $data['versi'] ?>" type="text" placeholder="Isikan versi">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <?php echo anchor('kriterianilai', '<button type="button" class="btn btn-danger text-center">Kembali</button>'); ?>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
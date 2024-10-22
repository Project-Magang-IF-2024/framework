<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Input Data Kriteria Nilai Proposal</h3>
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
        <?php echo form_open_multipart('kriterianilai/add', 'role="form" method="post" class="theme-form mega-form"'); ?>
        <div class="card">
          <div class="card-header">
            <h5>Form Input Data Kriteria Nilai Proposal</h5>
          </div>
          <div class="card-body">
            <h6>Kriteria Nilai</h6>
            <div class="form-group">
              <label class="col-form-label">Kriteria</label>
              <input class="form-control" name="kode_kriteria" type="text" placeholder="Isikan Kode Kriteria" required>
            </div>
            <div class="form-group">
              <label class="col-form-label">Nama Kriteria</label>
              <textarea class="form-control" name="nama_kriteria" placeholder="Isikan Nama Kriteria" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label class="col-form-label">Jenis</label>
              <select class="form-control" name="jenis" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="P">P</option>
                <option value="S">S</option>
              </select>
              <!-- <select class="form-control" name="jenis" type="text" placeholder="Isi Jenis">
                <option value="">Pilih Jenis</option>
                <?php foreach ($jenis_list as $jenis) { ?>
                  <option value="<?php echo $jenis['jenis']; ?>"><?php echo $jenis['jenis']; ?> </option>
                <?php } ?>
              </select> -->
            </div>
            <!-- <div class="form-group">
              <label for="status">Status</label>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="status" id="status" value="1">
                <label class="form-check-label" for="status">Aktif</label>
              </div>
            </div> -->
            <div class="form-group">
              <label for="status">Status</label>
              <!-- Hidden input ensures a value is sent when the checkbox is not checked -->
              <input type="hidden" name="status" value="0">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="status" id="status" value="1">
                <label class="form-check-label" for="status">Aktif</label>
              </div>
            </div>
            <!-- <input class="form-control" name="status" type="text" placeholder="Isikan Status" required> -->
            <div class="form-group">
              <label class="col-form-label">Versi</label>
              <input class="form-control" name="versi" type="text" placeholder="Isikan Versi" required>
            </div>
          </div>
          <div class="card-footer">
            <!-- <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <button class="btn btn-secondary">Cancel</button> -->
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Data Fakultas</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Lihat Fakultas</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice">
                        <div>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="media">
                                            <div class="media-left"><img class="media-object img-60" src="<?php echo base_url() ?>gambar/unusida.png" alt=""></div>
                                            <div class="media-body m-l-20">
                                                <h4 class="media-heading">Universitas Nahdlatul Ulama Sidoarjo</h4>
                                                <p>https://unusida.ac.id</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-md-right">
                                            <h3>Data Fakultas</h3>
                                            <p>Dicetak Tanggal: <?php echo date('M') ?><span> <?php echo date("d"); ?>, <?php echo date("Y"); ?></span><br></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- End InvoiceTop-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="media">
                                        <div class="media-body m-l-20">
                                            <h4 class="media-heading"><?php echo $fakultas['nama_fakultas']; ?> 
                                        <span style="display:block; margin-top: 5px;">
                                            Kode Fakultas : <?php echo $fakultas['kode_fakultas']; ?>
                                        </span>
                                        </h4>
                                        <p style="margin-top: 10px;">
                                            Singkatan : <strong><?php echo $fakultas['singkatan_fak']; ?></strong>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Invoice Mid-->
                            <br>
                            <br><br>
                            <!-- End InvoiceBot-->
                        </div>
                        <div class="col-sm-12 text-center mt-3">
                            <?php echo anchor('fakultas','<button type="button" class="btn btn-danger text-center" style="margin-top:10px;width:30%;">Kembali</button>'); ?>
                        </div>
                        <!-- End Invoice-->
                        <!-- End Invoice Holder-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

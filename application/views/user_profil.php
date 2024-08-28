<div class="container-fluid"> 

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Biodata Pengguna</h1>
                        
                        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>      Tambah data</button> -->
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-fw fa-user text-success"></i> Biodata Pengguna
                    </h6>
   
                </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <?php foreach ($user as $data): ?>   
                            <form>
                                <div class="mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="<?= $data->nama; ?>"> 
                                </div>
                                <div class="mb-3">  
                                    <label>Email</label>
                                    <input type="email" name="emil" class="form-control" value="<?= $data->email;?>"> 
                                </div>
                                <div class="mb-3">
                                    <label>No.HP</label>
                                    <input type="text" name="no_hp" class="form-control" value="<?= $data->no_hp;?>"> 
                                </div>
                                <div class="mb-3">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="<?= $alamat;?>"> 
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
                                </div>
                            </form>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- <!DOCTYPE html> -->
<!-- <html lang="en">

    <style>
         .status {
            display: inline-block;
            padding: 5px 12px;
            margin: 0px;
            font-size: 12px;
            border-radius: 10px;
            color: #fff;
            text-align: center;
            font-family: inherit;
        }
        .status.diterima {
            background-color: #28a745;
        }
        .status.ditolak {
            background-color: #dc3545;
        }
        .status.diproses {
            background-color: #ffc107;
            color: #000;
        }
    </style>

<body>
    <div class="status-container">
        <div class="status diterima">Diterima</div>
        <div class="status ditolak">Ditolak</div>
        <div class="status diproses">Diproses</div>
    </div>
</body>
</html> -->
<!-- 
                </div> -->
                <!-- /.container-fluid -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Stock Out</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Stock Out</li>
                  </ol>
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">


          <!-- Main row -->
          <div class="row">
              <!-- Left col -->
              <section class="col-lg connectedSortable">
                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">
                              <i class="fas fa-chart-pie mr-1"></i>
                              Data Stock
                          </h3>
                          <div class="card-tools">
                              <ul class="nav nav-pills ml-auto">
                                  <li class="nav-item">
                                      <a href="" class="btn btn-primary mr-1" data-toggle="modal" data-target="#newStockModal">Input Stock Keluar</a>
                                  </li>
                                  <li>
                                      <div class="dropdown inline">
                                          <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Export
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <a class="dropdown-item" href="<?= base_url('StockOut/pdf'); ?>">PDF</a>
                                              <a class="dropdown-item" href="<?= base_url('StockOut/excel'); ?>">EXEL</a>
                                          </div>
                                      </div>
                                  </li>
                              </ul>

                          </div>

                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="tab-content p-0">
                              <!-- Morris chart - Sales -->
                              <?= $this->session->flashdata('message'); ?>
                              <table class="table table-hover table-bordered table-striped" id="table1">
                                  <thead>
                                      <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Barcode</th>
                                          <th scope="col">Produck Item</th>
                                          <th scope="col">Qty</th>
                                          <th scope="col">Detail</th>
                                          <th scope="col">Date</th>
                                          <th scope="col">Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $k = 1; ?>
                                      <?php foreach ($stock as $key => $i) : ?>
                                          <tr>
                                              <th scope="row"><?= $k++; ?></th>
                                              <td><?= $i->barcode ?></td>
                                              <td><?= $i->item_name ?></td>
                                              <td class="text-right"><?= $i->qty ?></td>
                                              <td><?= $i->detail ?></td>
                                              <td class="text-center"><?= indo_date($i->date) ?></td>
                                              <td>
                                                  <a href="<?= base_url('stockOut/hapusOut/' . $i->id_stock . '/' . $i->id_item) ?>" onclick="return confirm('Hapus Stock Out? Ketika Menghapus, Jumlah Stok akan di Kembalikan Pada Stok Barang!');" class="badge badge-danger">hapus</a>
                                              </td>
                                          </tr>
                                      <?php endforeach; ?>

                                  </tbody>
                              </table>
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
              </section>
              <!-- /.Left col -->
          </div>
          <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <!-- Modal tambah -->
  <div class="modal fade" id="newStockModal" tabindex="-1" role="dialog" aria-labelledby="newStockModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="newStockModalLabel">Tambah Stock Barang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?= base_url('stockOut/tambahOut'); ?>" method="POST">
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="date" class="form-control" id="date" name="date" value="<?= date('Y-m-d') ?>" placeholder="Date *" required>
                      </div>

                      <div class="form-group input-group">
                          <input type="hidden" name="id_item" id="id_item">
                          <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Barcode *" required autofocus>
                          <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modalItem">
                                  <i class="fas fa-search"></i>
                              </button>
                          </span>
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="item_name" name="item_name" placeholder="item_name" readonly>
                      </div>

                      <div class="form-group">
                          <input type="text" class="form-control" id="stock" name="stock" placeholder="Initial Stock" readonly>
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="detail" name="detail" placeholder="Detail *" required>
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="qty" name="qty" placeholder="Qty *" required>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
              </form>
          </div>
      </div>
  </div>


  <!--MODAL BARCODE-->
  <div class="modal fade" id="modalItem" tabindex="-1" role="dialog" aria-labelledby="newStockModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="newStockModalLabel">Select Product Item</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body table-resonsive">
                  <table class="table table-hover table-bordered table-striped table2">
                      <thead>
                          <tr>
                              <th scope="col">Barcode</th>
                              <th scope="col">Name</th>
                              <th scope="col">Price</th>
                              <th scope="col">Stock</th>
                              <th scope="col">Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($item as $key => $i) : ?>
                              <tr>
                                  <td><?= $i->barcode ?></td>
                                  <td><?= $i->name ?></td>
                                  <td><?= indo_carrency($i->price) ?></td>
                                  <td><?= $i->stock ?></td>
                                  <td>
                                      <button class="btn btn-xs btn-info" id="select" data-id="<?= $i->id_item ?>" data-barcode="<?= $i->barcode ?>" data-name="<?= $i->name ?>" data-stock="<?= $i->stock ?>">
                                          <i class="fas fa-check"></i> Select
                                      </button>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
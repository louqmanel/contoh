  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Dashboard</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
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
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                      <div class="inner">
                          <h3><?= $jmlItem ?></h3>

                          <p>Jumlah Produk Item</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-bag"></i>
                      </div>
                      <a href="<?= base_url('item') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                      <div class="inner">
                          <h3><?= $jmlSupplier ?><sup style="font-size: 20px;"></sup></h3>

                          <p>Jumlah Supplier</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="<?= base_url('supplier') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                      <div class="inner">
                          <h3><?= $jmlStokIn ?></h3>

                          <p>Jumlah Stok Masuk</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-person-add"></i>
                      </div>
                      <a href="<?= base_url('stock') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                      <div class="inner">
                          <h3><?= $jmlStokOut ?></h3>

                          <p>Jumlah Stok Keluar</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="<?= base_url('stockout') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
              <!-- Left col -->
              <section class="col-lg-12">
                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">
                              <i class="fas fa-chart-pie mr-1"></i>
                              Data Supplier
                          </h3>
                          <div class="card-tools">
                              <ul class="nav nav-pills ml-auto">
                                  <li class="nav-item">
                                      <a href="<?= base_url('supplier') ?>" class="btn btn-primary ">Lihat Detail</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="tab-content p-0">
                              <!-- Morris chart - Sales -->
                              <table class="table table-hover table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th scope=" col">#</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Phone</th>
                                          <th scope="col">Address</th>
                                          <th scope="col">Description</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($rowSup->result() as $s) : ?>
                                          <tr>
                                              <th><?= $i++; ?></th>
                                              <td><?= $s->name ?></td>
                                              <td><?= $s->phone ?></td>
                                              <td><?= $s->address ?></td>
                                              <td><?= $s->description ?></td>

                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">
                              <i class="fas fa-chart-pie mr-1"></i>
                              Data Produk Item
                          </h3>
                          <div class="card-tools">
                              <ul class="nav nav-pills ml-auto">
                                  <li class="nav-item">
                                      <a href="<?= base_url('item') ?>" class="btn btn-primary ">Lihat Detail</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="tab-content p-0">
                              <!-- Morris chart - Sales -->
                              <table class="table table-hover table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Barcode</th>
                                          <th scope="col">Product Name</th>
                                          <th scope="col">Category</th>
                                          <th scope="col">Harga</th>
                                          <th scope="col">Stock</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $j = 1; ?>
                                      <?php foreach ($rowItem->result() as $key => $i) : ?>
                                          <tr>
                                              <th scope="row"><?= $j++; ?></th>
                                              <td><?= $i->barcode ?></td>
                                              <td><?= $i->name ?></td>
                                              <td><?= $i->category_name ?></td>
                                              <td><?= $i->price ?></td>
                                              <td><?= $i->stock ?></td>

                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->


              </section>
              <!-- /.Left col -->
              <!-- right col (We are only adding the ID to make the widgets sortable)-->

              <!-- /.card -->

              <!-- Calendar -->

              <!-- /.card -->
  </section>
  <!-- right col -->
  </div>
  <!-- /.row (main row) -->
  </div>
  <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
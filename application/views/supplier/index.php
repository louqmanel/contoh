  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Supplier</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Supplier</li>
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
                              Data Supplier
                          </h3>
                          <div class="card-tools">
                              <ul class="nav nav-pills ml-auto">
                                  <li class="nav-item">
                                      <a href="" class="btn btn-primary mr-1" data-toggle="modal" data-target="#newSupplierModal">Input New Suplier</a>
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
                                          <th scope="col">Name</th>
                                          <th scope="col">Phone</th>
                                          <th scope="col">Address</th>
                                          <th scope="col">Description</th>
                                          <th scope="col">Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($row->result() as $s) : ?>
                                          <tr>
                                              <th><?= $i++; ?></th>
                                              <td><?= $s->name ?></td>
                                              <td><?= $s->phone ?></td>
                                              <td><?= $s->address ?></td>
                                              <td><?= $s->description ?></td>
                                              <td>
                                                  <a href="<?= base_url('supplier/edit/' . $s->id_supplier) ?>" class="badge badge-success">Edit</a>
                                                  <a href="<?= base_url('supplier/hapus/' . $s->id_supplier) ?>" onclick="return confirm('Hapus Data Supplier?')" class="badge badge-danger">hapus</a>
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
  <!-- Modal -->
  <div class="modal fade" id="newSupplierModal" tabindex="-1" role="dialog" aria-labelledby="newSupplierModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="newSupplierModalLabel">Tambah Supplier Baru</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?= base_url('supplier/tambah'); ?>" method="POST">
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                      </div>

                      <div class="form-group">
                          <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required minlength="11">
                      </div>

                      <div class="form-group">
                          <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                      </div>

                      <div class="form-group">
                          <input type="text" class="form-control" id="description" name="description" placeholder="Description" required>
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
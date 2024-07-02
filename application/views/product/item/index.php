  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Item</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Item</li>
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

          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
              <!-- Left col -->
              <section class="col-lg connectedSortable">
                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">
                              <i class="fas fa-chart-pie mr-1"></i>
                              Data Item
                          </h3>
                          <div class="card-tools">
                              <ul class="nav nav-pills ml-auto">
                                  <li class="nav-item">
                                      <a href="" class="btn btn-primary mr-1" data-toggle="modal" data-target="#newItemModal">Input New Item</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="tab-content p-0">
                              <?= $this->session->flashdata('message'); ?>

                              <table class="table table-hover col-md" id="table1">
                                  <thead>
                                      <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Barcode</th>
                                          <th scope="col">Product Name</th>
                                          <th scope="col">Category</th>
                                          <th scope="col">Color</th>
                                          <th scope="col">Bahan</th>
                                          <th scope="col">Size</th>
                                          <th scope="col">Harga</th>
                                          <th scope="col">Stock</th>
                                          <th scope="col">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $j = 1; ?>
                                      <?php foreach ($row2->result() as $key => $i) : ?>
                                          <tr>
                                              <th scope="row"><?= $j++; ?></th>
                                              <td><?= $i->barcode ?></td>
                                              <td><?= $i->name ?></td>
                                              <td><?= $i->category_name ?></td>
                                              <td><?= $i->color_name ?></td>
                                              <td><?= $i->bahan_nama ?></td>
                                              <td><?= $i->size ?></td>
                                              <td><?= $i->price ?></td>
                                              <td><?= $i->stock ?></td>
                                              <td>
                                                  <a href="<?= site_url('item/edit/') . $i->id_item ?>" class="badge badge-success">Edit</a>
                                                  <a href="<?= site_url('item/hapus/') . $i->id_item ?>" onclick="return confirm('Hapus Data item?');" class="badge badge-danger">hapus</a>
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
  <div class="modal fade" id="newItemModal" tabindex="-1" role="dialog" aria-labelledby="newItemModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="newItemModalLabel">Tambah Item Baru</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?= base_url('item/tambah'); ?>" method="POST">
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Barcode" required>
                      </div>

                      <div class="form-group">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                      </div>

                      <div class="form-group">
                          <select name="category" class="form-control">
                              <option value="">Select Category</option>
                              <?php foreach ($category->result() as $c) : ?>
                                  <option value="<?= $c->id_category ?>"><?= $c->name ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>

                      <div class="form-group">
                          <select name="color" class="form-control">
                              <option value="">Select Color</option>
                              <?php foreach ($color->result() as $z) : ?>
                                  <option value="<?= $z->id_color ?>"><?= $z->color ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>

                      <div class="form-group">
                          <select name="bahan" class="form-control">
                              <option value="">Select Bahan</option>
                              <?php foreach ($bahan->result() as $v) : ?>
                                  <option value="<?= $v->id_bahan ?>"><?= $v->nm_bahan ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>

                      <div class="form-group">
                          <select name="size" class="form-control">
                              <option value="">Select Size</option>
                              <option value="38">38</option>
                              <option value="39">39</option>
                              <option value="40">40</option>
                              <option value="41">41</option>
                              <option value="42">42</option>
                              <option value="43">43</option>
                              <option value="44">44</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <input type="number" class="form-control" id="price" name="price" placeholder="Price" required>
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
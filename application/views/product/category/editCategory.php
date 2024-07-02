<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit category</h1>
    </div>



    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">edit form</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <form class="col-md-5" method="post">
                        <?= $this->session->flashdata('message'); ?>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Id</label>
                            <input type="text" class="form-control" id="id_category" value="<?= $edit_category['id_category']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="name" value="<?= $edit_category['name']; ?>" name="name" required>
                        </div>
                        <a href="<?= base_url('category'); ?>" class="btn btn-info">Kembali</a>
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
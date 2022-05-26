<?= $this->include('inc/header') ?>

<div class="main-content side-content pt-0">

    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title text-center tx-24 mg-b-5">User Management</h2>
                </div>
                <div class="d-flex">
                    <div class="justify-content-center">
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div>
                                <h6 class="main-content-label mb-1">All Administrators</h6>
                                <a class="modal-effect btn btn-info btn-icon-text pull-right btn-sm my-3" href="<?php echo base_url() ?>/add-user"> Add Admin</a>
                                <p class="text-muted card-sub-title"></p>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="example2">
                                    <thead>
                                        <tr>
                                            <th class="">Full Name</th>
                                            <th class="">Username</th>
                                            <th class="">Email </th>
                                            <th class="">Contact Number</th>
                                            <th class="">User Role</th>
                                            <th class="">Organisation</th>
                                            <th class="">Tenant Code</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach ($admins as $row) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $row->first_name; ?> <?= $row->last_name; ?></td>
                                                <td><?= $row->user_name; ?></td>
                                                <td><?= $row->email; ?></td>
                                                <td><?= $row->contact_number; ?></td>
                                                <td><?= $row->user_role; ?></td>
                                                <td><?= $row->organisation; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url() ?>/view_user?id=<?php echo $row->id; ?>" class="btn btn-sm ripple btn-primary">View</a>
                                                    <a href="<?php echo base_url() ?>/edit_user?id=<?php echo $row->id; ?>" class="btn btn-sm ripple btn-info">Edit</a>
                                                    <a href="<?php echo base_url() ?>/delete?id=<?php echo $row->id; ?>" class="btn btn-sm ripple btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
</div>
<?= $this->include('inc/footer') ?>
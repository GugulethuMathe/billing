<?= $this->include('inc/header') ?>
<?php
foreach ($view_admin as $row) {
?>
    <div class="main-content side-content pt-0">

        <div class="container-fluid">
            <div class="inner-body">
                <!-- Page Header -->
                <div class="card-body border">
                    <div class="mb-4 main-content-label">Personal Information</div>
                    <form class="form-horizontal">
                        <div class="mb-4 main-content-label">Name</div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">User Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" readonly class="form-control" placeholder="User Name" value="<?php echo $row->user_name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">First Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" readonly class="form-control" placeholder="First Name" value="<?php echo $row->first_name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">Last Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" readonly class="form-control" placeholder="Last Name" value="<?php echo $row->last_name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">User Role</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" readonly class="form-control" placeholder="Designation"  value="<?php echo $row->user_role; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 main-content-label">Contact Info</div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">Email<i>(required)</i></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" readonly class="form-control" placeholder="Email"  value="<?php echo $row->email; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">Contact Number</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" readonly class="form-control" placeholder="phone number" value="<?php echo $row->contact_number; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 main-content-label">Organisation Info</div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">Organisation</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" readonly class="form-control" placeholder="Organisation" value="<?php echo $row->organisation; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">Tenant Code</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" readonly class="form-control" placeholder="Tenant Code" value="<?php echo $row->tenant_code; ?>">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    <?php } ?>
    <?= $this->include('inc/footer') ?>
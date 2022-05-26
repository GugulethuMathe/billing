<?= $this->include('inc/header') ?>
<?php
foreach ($edit_user as $row) {
?>
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <!-- Page Header -->
                <div class="card-body border">
                    <div class="mb-4 main-content-label text-center">Edit <?= $row->first_name; ?> <?= $row->last_name; ?> Information</div>
                    <form class="form-horizontal" action="<?php echo base_url()?>/user/updateUser">
                        <div class="mb-4 main-content-label">Name</div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">User Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="user_name" class="form-control" placeholder="User Name" value="<?php echo $row->user_name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">First Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php echo $row->first_name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">Last Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $row->last_name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">Password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">User Role</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control select select2" required="required" name="user_role">
                                    <option value="<?php echo $row->user_role ?>"><?php echo $row->user_role ?></option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Tenant">Tenant</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 main-content-label">Contact Info</div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">Email</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $row->email; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">Contact Number</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="contact_number" placeholder="phone number" value="<?php echo $row->contact_number; ?>">
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
                                    <select class="form-control select select2" required="required" name="organisation">
                                        <option value="<?php echo $row->organisation ?>"><?php echo $row->organisation ?></option>
                                        <option value="Net 15">Net 15</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">Tenant Code</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control select select2" required="required" name="tenant_code">
                                        <option value="<?php echo $row->tenant_code ?>"><?php echo $row->tenant_code ?></option>
                                        <option value="330">330</option>
                                    </select>
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
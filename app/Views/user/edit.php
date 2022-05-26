<?= $this->include('inc/header') ?>
<script>
    $(function() {
        <?php if (session()->has("success_update_user")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= session("success_update_user") ?>'
            })
        <?php } ?>
    });
</script>
<?php
foreach ($edit_user as $row) {
?>
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <!-- Page Header -->
                <div class="card-body border">
                    <div class="mb-4 main-content-label text-center">Edit <?= $row->first_name; ?> <?= $row->last_name; ?>'s Information</div>
                    <?php if ($_SESSION['user_role'] == "Administrator") { ?>
                        <a class="dropdown-item border-top" style="display: inline;" href="<?php echo base_url() ?>/clients">
                            <i class="fe fe-users"></i> Clients
                        </a>
                        <a class="dropdown-item border-top" style="display: inline;" href="<?php echo base_url() ?>/administrators">
                            <i class="fe fe-users"></i> Administrators
                        </a>
                        <a class="dropdown-item border-top" style="display: inline;" href="<?php echo base_url() ?>/edit_user?id=<?php echo $row->id; ?>">
                            <i class="fe fe-user"></i> Edit <?= $row->first_name; ?> <?= $row->last_name; ?>'s Information
                        </a>
                        <a class="dropdown-item border-top" style="display: inline;" href="<?php echo base_url() ?>/edit_user?id=<?php echo $row->id; ?>">
                            <i class="fe fe-lock"></i> Change Password
                        </a>
                    <?php } else { ?>

                        <?php
                        $id = $_SESSION['id'];
                        $link = 'view_user?id=';
                        $edit_link = 'edit_user?id=';
                        ?>
                        <a class="dropdown-item border-top" style="display: inline;" href="<?php echo base_url() ?>/<?php echo $link . $id ?>">
                            <i class="fe fe-user"></i> My Profile
                        </a>
                        <a class="dropdown-item" style="display: inline;" href="<?php echo base_url() ?>/<?php echo $edit_link . $id ?>">
                            <i class="fe fe-edit"></i> Edit Profile
                        </a>
                    <?php } ?>
                    <br>
                    <br>
                    <form class="form-horizontal" action="<?php echo base_url() ?>/user/updateUser">
                        <div class="mb-4 main-content-label">Name</div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">User Name</label>
                                </div>
                                <input type="hidden" name="id" value="<?= $row->id; ?>">
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
                        <?php if ($_SESSION['user_role'] == "Administrator") { ?>
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
                        <?php } ?>
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
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                <label class="">Address</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $row->address; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">Organisation</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control select select2" required="required" name="organisation">
                                        <option value="<?php echo $row->organisation ?>"><?php echo $row->organisation ?></option>
                                        <option value="Net 15">Net 15</option>
                                        <option value="Free Rentals">Free Rentals</option>
                                        <option value="Medistock">Medistock</option>
                                        <option value="Sudo Technologies">Sudo Technologies</option>
                                        <option value="WebZar">WebZar</option>
                                        <option value="Sphruna Inc">Sphruna Inc</option>
                                        <option value="Digital Agency">Digital Agency</option>
                                    </select>
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
                                    <select class="form-control select select2" id="tenant" value="<?php echo $row->tenant_code; ?>" name="tenant_code">
                                        <?php
                                        $db = \Config\Database::connect();
                                        $query = $db->query('SELECT * FROM tenants');
                                        $results = $query->getResult();
                                        foreach ($results as $data) {
                                        ?>
                                            <option value="<?php echo $data->tenantcode; ?>"><?php echo $data->tenantcode; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn ripple btn-main-primary pull-right btn-block">Update</button>
                        <br>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?= $this->include('inc/footer') ?>
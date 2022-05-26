<?= $this->include('inc/header') ?>
<script>
    $(function() {
        <?php if (session()->has("success_create_user")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= session("success_create_user") ?>'
            })
        <?php } ?>
    });
</script>
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 text-center">Add a User</h2>
                </div>
            </div>
            <!-- End Page Header -->
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="row row-sm">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="">
                                        <form action="<?= base_url('create-user') ?>" method="post">
                                            <div class="form-group">
                                                <label class="">First Name</label>
                                                <input class="form-control" name="first_name" required="required" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label class="">Last Name</label>
                                                <input class="form-control" name="last_name" required="required" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label class="">Username</label>
                                                <input class="form-control" name="user_name" required="required" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label class="">Email</label>
                                                <div class="pos-relative">
                                                    <input class="form-control pd-r-80" name="email" required="required" type="email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="">Contact Number</label>
                                                <input class="form-control" name="contact_number" required="required" type="text">
                                            </div>

                                            <div class="form-group">
                                                <label class="">Password</label>
                                                <input class="form-control" name="password" required="required" id="password" type="password">
                                            </div>
                                            <div class="form-group">
                                                <label class="">Confirm Password</label>
                                                <input class="form-control" name="confirm_password" required="required" id="confirm_password" type="password">
                                            </div>
                                            <div class="form-group">
                                                <label class="">Address</label>
                                                <input class="form-control" name="address" required="required" type="text">
                                            </div>
                                            <div class="form-group">
                                                <div class="row row-sm">
                                                    <div class="col-sm-4">
                                                        <label class="">User role</label>
                                                        <select class="form-control select select2" required="required" name="user_role">
                                                            <option label="Select User role"></option>
                                                            <option value="Administrator">Administrator</option>
                                                            <option value="Tenant">Tenant</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 mg-t-20 mg-sm-t-0">
                                                        <label class="">Organisation</label>
                                                        <select class="form-control select select2" required="required" name="organisation">
                                                            <option label="Select an Organisation"></option>
                                                            <option value="Net 15">Net 15</option>
                                                            <option value="Free Rentals">Free Rentals</option>
                                                            <option value="Medistock">Medistock</option>
                                                            <option value="Sudo Technologies">Sudo Technologies</option>
                                                            <option value="WebZar">WebZar</option>
                                                            <option value="Sphruna Inc">Sphruna Inc</option>
                                                            <option value="Digital Agency">Digital Agency</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 mg-t-20 mg-sm-t-0">
                                                        <label class="">Tenant Code</label>
                                                        <select class="form-control select select2" id="tenant" value="<?php echo set_value('tenant'); ?>" name="tenant_code">
                                                            <option value="" selected>All</option>
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
                                            <div class="form-group mg-b-20">
                                                <label class="ckbox">
                                                </label>
                                            </div>
                                            <button class="btn ripple btn-main-primary btn-block">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function() {
        var txtPassword = document.getElementById("password");
        var txtConfirmPassword = document.getElementById("confirm_password");
        txtPassword.onchange = ConfirmPassword;
        txtConfirmPassword.onkeyup = ConfirmPassword;

        function ConfirmPassword() {
            txtConfirmPassword.setCustomValidity("");
            if (txtPassword.value != txtConfirmPassword.value) {
                txtConfirmPassword.setCustomValidity("Passwords do not match.");
            }
        }
    }
</script>
<?= $this->include('inc/footer') ?>
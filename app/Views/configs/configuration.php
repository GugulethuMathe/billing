<?= $this->include('inc/header') ?>
<!-- Main Content-->
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title text-center tx-24 mg-b-5">Configurations</h2>
                </div>
            </div>
            <!-- End Page Header -->
            <!-- Row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card custom-card" id="sizes">
                        <div class="card-body">
                            <div>
                                <h6 class="main-content-label mb-1">IP Server Configuration</h6>
                                <a class="modal-effect btn btn-outline-primary pull-right" data-effect="effect-newspaper" data-toggle="modal" href="#addip">Add IP</a>
                                <br>
                                <br>
                                <br>
                            </div>
                            <div class="text-wrap">
                                <div class="example">
                                    <div class="demo-avatar-group">
                                        <div class="table-responsive">
                                            <table class="table" id="example2">
                                                <thead>
                                                    <tr>
                                                        <th class="">Ip Configuration</th>
                                                        <th class="">Ip Activity</th>
                                                        <th class="">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($rates as $row) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $row->ip_address; ?></td>
                                                            <td><?= $row->ip_active; ?></td>
                                                            <td>
                                                                <a class="modal-effect btn btn-sm btn-outline-primary" data-effect="effect-newspaper" data-toggle="modal" href="#view-rate-<?= $row->id; ?>"><i class="fe fe-search"></i></a>
                                                                <a class="modal-effect btn btn-sm btn-outline-info" data-effect="effect-newspaper" data-toggle="modal" href="#edit-rate-<?= $row->id; ?>"><i class="fe fe-edit-2"></i></a>
                                                                <a class="modal-effect btn btn-sm btn-outline-danger" data-effect="effect-newspaper" data-toggle="modal" href="#delete-rate"> <i class="fe fe-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Prism Precode -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card custom-card" id="sizes">
                        <div class="card-body">
                            <div>
                                <h6 class="main-content-label mb-1">Billing Cycle Configuration</h6>
                                <a class="modal-effect btn btn-outline-primary pull-right" data-effect="effect-newspaper" data-toggle="modal" href="#addbillcycle">Add Billing Cycle</a>
                                <br>
                                <br>
                                <br>
                            </div>
                            <div class="text-wrap">
                                <div class="example">
                                    <div class="demo-avatar-group">
                                        <div class="table-responsive">
                                            <table class="table" id="example3">
                                                <thead>
                                                    <tr>
                                                        <th class="">Cycle Start Date</th>
                                                        <th class="">Cycle End Date</th>
                                                        <th class="">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($rates as $row) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $row->cycle_start_day; ?></td>
                                                            <td><?= $row->cycle_end_day; ?></td>
                                                            <td>
                                                                <a class="modal-effect btn btn-sm btn-outline-primary" data-effect="effect-newspaper" data-toggle="modal" href="#view-rate-<?= $row->id; ?>"><i class="fe fe-search"></i></a>
                                                                <a class="modal-effect btn btn-sm btn-outline-info" data-effect="effect-newspaper" data-toggle="modal" href="#edit-rate-<?= $row->id; ?>"><i class="fe fe-edit-2"></i></a>
                                                                <a class="modal-effect btn btn-sm btn-outline-danger" data-effect="effect-newspaper" data-toggle="modal" href="#delete-rate"> <i class="fe fe-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Prism Precode -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
</div>
<!-- End Main Content-->
<div class="modal" id="addbillcycle">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-center">Adding Billing Cycle</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= base_url('addBillingCycle') ?>" method="post">
                <div class="modal-body">
                <div class="form-group">
                        <label class="">Cycle Start Date</label>
                        <input class="form-control" name="cycle_start_day" required="required" placeholder="Cycle Start Date" type="text">
                    </div>
                    <div class="form-group">
                        <label class="">Cycle End Date</label>
                        <input class="form-control" name="cycle_end_day" required="required" placeholder="Cycle End Date" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">Save Billing Cycle</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="addip">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-center">Adding IP Server Configuration</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= base_url('configuration/addIp') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="">IP Address</label>
                        <input class="form-control" name="ip_address" required="required" placeholder="IP Address" type="text">
                    </div>
                    <div class="form-group">
                        <label class="">IP Activity</label>
                        <input class="form-control" name="ip_active" required="required" placeholder="IP Activity" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">Save IP</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->include('inc/footer') ?>
<?= $this->include('inc/header') ?>
<script>
    $(function() {
        <?php if (session()->has("success_ip")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= session("success_ip") ?>'
            })
        <?php } ?>
    });
    $(function() {
        <?php if (session()->has("success_update_rate")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= session("success_update_rate") ?>'
            })
        <?php } ?>
    });
</script>
<!-- Main Content-->
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <div class="inner-body">
                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title text-center tx-24 mg-b-5">Configurations</h2>
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
                                    <h6 class="main-content-label mb-1">Billing Cycle Configuration</h6>
                                    <a class="modal-effect btn btn-outline-primary pull-right" data-effect="effect-newspaper" data-toggle="modal" href="#addbillcycle">Add Billing Cycle</a>
                                    <br>
                                    <br>
                                    <p class="text-muted card-sub-title"></p>
                                </div>
                                <div class="table-responsive">
                                    <table class="table" id="example2">
                                        <thead>
                                            <tr>
                                                <th class="">Cycle Start Date</th>
                                                <th class="">Cycle End Date</th>
                                                <th class="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($billcycle as $row) {
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
                    </div>
                </div>
                <!-- End Row -->
            </div>
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
            <form action="<?= base_url('configuration/addBillingCycle') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="">Cycle Start Date</label>
                        <input class="form-control" name="cycle_start_day" required="required" placeholder="Cycle Start Date" type="date">
                    </div>
                    <div class="form-group">
                        <label class="">Cycle End Date</label>
                        <input class="form-control" name="cycle_end_day" required="required" placeholder="Cycle End Date" type="date">
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
<?= $this->include('inc/footer') ?>
<?= $this->include('inc/header') ?>
<script>
    $(function() {
        <?php if (session()->has("success_cycle")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= session("success_cycle") ?>'
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
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title text-center tx-24 mg-b-5">Configurations</h2>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div>
                                <h6 class="main-content-label mb-1">IP Server Configuration</h6>
                                <a class="modal-effect btn btn-outline-primary pull-right" data-effect="effect-newspaper" data-toggle="modal" href="#addip">Add IP</a>
                                <br>
                                <br>
                                <p class="text-muted card-sub-title"></p>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="example2">
                                    <thead>
                                        <tr>
                                            <th class="">Ip Address</th>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content-->
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
                        <input type="text" class="form-control" name="ip_address" required="required" id="ipv4" name="ipv4" placeholder="xxx.xxx.xxx.xxx" />
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
<script>
    var ipv4_address = $('#ipv4');
    ipv4_address.inputmask({
        alias: "ip",
        greedy: false //The initial mask shown will be "" instead of "-____".
    });
</script>
<?= $this->include('inc/footer') ?>
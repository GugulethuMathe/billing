<?=$this->include('inc/header')?>
<script>
    $(function() {
        <?php if (session()->has("success_rate")) {?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?=session("success_rate")?>'
            })
        <?php }?>
    });
    $(function() {
        <?php if (session()->has("success_update_rate")) {?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?=session("success_update_rate")?>'
            })
        <?php }?>
    });
</script>
<div class="main-content side-content pt-0">

    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title text-center tx-24 mg-b-5">Incoming Call Rates</h2>
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
                                <h6 class="main-content-label mb-1">Incoming Call Rates List</h6>
                                <br>
                                <a class="modal-effect btn btn-outline-primary pull-right" data-effect="effect-newspaper" data-toggle="modal" href="#modaldemo8">Add Call Rate</a>
                                <br>
                                <br>
                                <br>
                                <div class="table-responsive">
                                    <table class="table" id="example2">
                                        <thead>
                                            <tr>
                                                <th class="">Trunk</th>
                                                <th class="">Channel Name</th>
                                                <th class="">Rate</th>
                                                <th class="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
foreach ($rates as $row) {
    ?>
                                                <tr>
                                                    <td><?=$row->trunk;?></td>
                                                    <td><?=$row->channel_name;?></td>
                                                    <td><?=$row->rate;?></td>
                                                    <td>
                                                        <a class="modal-effect btn btn-sm btn-outline-primary" data-effect="effect-newspaper" data-toggle="modal" href="#view-rate-<?=$row->id;?>"><i class="fe fe-search"></i></a>
                                                        <a class="modal-effect btn btn-sm btn-outline-info" data-effect="effect-newspaper" data-toggle="modal" href="#edit-rate-<?=$row->id;?>"><i class="fe fe-edit-2"></i></a>
                                                        <a class="modal-effect btn btn-sm btn-outline-danger" data-effect="effect-newspaper" data-toggle="modal" href="#delete-rate"> <i class="fe fe-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php }?>
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

<!-- Modal effects -->
<div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-center">Adding Incoming Call Rates</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?=base_url('add-rate')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="">Trunk</label>
                        <select class="form-control select select2" required="required" name="trunk">
                            <option label="Select an Trunk"></option>
                            <option value="Trunk 1">Trunk 1</option>
                            <option value="Trunk 2">Trunk 2</option>
                            <option value="Trunk 3">Trunk 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="">Channel Name</label>
                        <select class="form-control select select2" required="required" name="channel_name">
                            <option label="Select an Channel Name"></option>
                            <option value="Channel Name 1">Channel Name 1</option>
                            <option value="Channel Name 2">Channel Name 2</option>
                            <option value="Channel Name 3">Channel Name 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="">Rate</label>
                        <input class="form-control" name="rate" required="required" placeholder="Rate" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">Save Rate</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
foreach ($rates as $row) {
    ?>
    <div class="modal" id="edit-rate-<?=$row->id;?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title text-center">Editing Incoming Call Rate</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="<?=base_url('rate/updateRate')?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="">Trunk</label>
                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                            <select class="form-control select select2" required="required" name="trunk">
                                <option value="<?php echo $row->trunk; ?>"><?php echo $row->trunk; ?></option>
                                <option value="Trunk 1">Trunk 1</option>
                                <option value="Trunk 2">Trunk 2</option>
                                <option value="Trunk 3">Trunk 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="">Channel Name</label>
                            <select class="form-control select select2" required="required" name="channel_name">
                            <option value="<?php echo $row->channel_name; ?>"><?php echo $row->channel_name; ?></option>
                                <option value="Channel Name 1">Channel Name 1</option>
                                <option value="Channel Name 2">Channel Name 2</option>
                                <option value="Channel Name 3">Channel Name 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="">Rate</label>
                            <input class="form-control" name="rate" value="<?php echo $row->rate; ?>" required="required" placeholder="Rate" type="text">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="submit">Save Rate</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php }?>
<?php
foreach ($rates as $row) {
    ?>
    <div class="modal" id="view-rate-<?=$row->id;?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title text-center">Viewing Incoming Call Rate</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <table class="table table-striped" id="example2">
                        <thead>
                            <tr>
                                <th class="">Field</th>
                                <th class="">Data</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>Trunk</td>
                                <td><?=$row->trunk;?></td>
                            </tr>
                            <tr>
                                <td>Channel Name</td>
                                <td><?=$row->channel_name;?></td>
                            </tr>
                            <tr>
                                <td>Rate</td>
                                <td><?=$row->rate;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php }?>

<!-- End Modal effects-->
<?=$this->include('inc/footer')?>
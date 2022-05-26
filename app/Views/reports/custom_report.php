<?= $this->include('inc/header') ?>

<div class="main-content side-content pt-0">

    <div class="container-fluid">
        <div class="inner-body">
            <br>
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div id="billform">
                                <h6 class="main-content-label mb-1">Generate Detailed Custom Report <a class="modal-effect btn btn-info btn-icon-text pull-right btn-sm mx-2 my-4" href="<?php echo base_url() ?>"><i class="fe fe-download"></i></a> <a class="modal-effect btn btn-info btn-icon-text pull-right btn-sm mx-2 my-4" href="<?php echo base_url() ?>"><i class="fe fe-mail"></i></a></h6>
                                <br>
                                <form id="custom_form">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="">Organisation</label>
                                                <select class="form-control select select2" id="organisation" name="organisation">
                                                    <option value="">All</option>
                                                    <option value="Net 15">Net 15</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="">Start Date</label><br>
                                                <input type="datetime-local" class="form-control datePickerId" required="required" id="start_date" name="start_date" id="datePickerId">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="">End Date</label><br>
                                                <input type="datetime-local" class="form-control datePickerId" required="required" id="end_date" name="end_date" id="datePickerIdEnd">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="">Extension</label>
                                                <select class="form-control select select2" value="<?php echo set_value('tenant'); ?>" id="tenant" name="tenant">
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
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="">Call Direction </label>
                                                <select class="form-control select select2" id="direction" name="direction">
                                                    <option value="All">All</option>
                                                    <option value="Outgoing">Outgoing</option>
                                                    <option value="Incoming">Incoming</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-info btn-icon-text pull-right btn-sm mx-2 my-4" type="submit">Generate Report</button>

                                            <!-- <a class="modal-effect btn btn-info btn-icon-text pull-right btn-sm mx-2 my-4" href="<?php echo base_url() ?>">Generate Report</a> -->
                                        </div>
                                    </div>
                                </form>
                                <p class="text-muted card-sub-title"></p>
                            </div>
                            <hr>
                            <h5 class="text-center"> Report Tables</h5>
                            <div aria-multiselectable="true" class="accordion" id="accordion" role="tablist">
                                <div class="card">
                                    <div class="card-header" id="headingOne" role="tab">
                                        <a aria-controls="collapseOne" aria-expanded="true" data-toggle="collapse" href="#collapseOne">Summary Report <i class="fa fa-arrow-circle-down pull-right" aria-hidden="true"></i></a>
                                    </div>
                                    <div aria-labelledby="headingOne" class="collapse show" data-parent="#accordion" id="collapseOne" role="tabpanel">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table" id="summary">
                                                    <thead>
                                                        <tr>
                                                            <th class="">Service type</th>
                                                            <th class="">Service name</th>
                                                            <th class="">Setup fee</th>
                                                            <th class="">Monthly Fee</th>
                                                            <th class="">Minutes Charged</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo" role="tab">
                                        <a aria-controls="collapseTwo" aria-expanded="false" class="collapsed" data-toggle="collapse" href="#collapseTwo">Detailed Report <i class="fa fa-arrow-circle-down pull-right" aria-hidden="true"></i></a>
                                    </div>
                                    <div aria-labelledby="headingTwo" class="collapse" data-parent="#accordion" id="collapseTwo" role="tabpanel">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="test">
                                                    <thead>
                                                        <tr>
                                                            <th class="">Date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Time</th>
                                                            <th class="">Direction</th>
                                                            <th class="">Caller</th>
                                                            <th class="">Called</th>
                                                            <th class="">Status</th>
                                                            <th class="">Duration(sec)</th>
                                                            <th class="">Cost</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- accordion -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
</div>
</div>
<?= $this->include('inc/footer') ?>

<script>
    datePickerId.max = new Date().toISOString().split("T")[0];
    datePickerIdEnd.max = new Date().toISOString().split("T")[0];
    var example2 = $('#test').DataTable({
        "bDestroy": true,
        "bSort": false,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print',
        ]
    });
    var summaryTable = $('#summary').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('#custom_form').on('submit', function(e) {
        alert("CLicked");
        // e.preventDefault();

        // var organisation = $("#organisation").val();
        // var tenant = $("#tenant").val();
        // var end_date = $("#end_date").val();
        // var start_date = $("#start_date").val();
        // var direction = $("#direction").val();
        // alert(organisation + tenant + end_date + start_date + direction);
        // $.ajax({
        //     url: "<?php echo base_url(); ?>/report/manual",
        //     type: 'GET',
        //     data: {
        //         tenant: tenant,
        //         start_date: start_date,
        //         end_date: end_date,
        //         status: status,
        //         year: year
        //     },
        //     // dataType: "JSON",
        //     success: function(response) {
        //         getManualReports();
        //         Notiflix.Report.Success('Success', 'Monthly report generated successfully', 'Close');
        //     }

        // });

    });



    function getManualReports() {
        var link = "<?php echo base_url(); ?>/report/manual?";

        var status = $("#status").val();
        var tenant = $("#tenant").val();
        var month = $("#month").val();
        var year = $("#year").val();



        var t999 = ["100", "200", "332", "682", "682", "795"];

        var t998 = ["6820", "999101", "333", "0640505138"];

        var t997 = ["1001", "value2", "value3"];

        var t995 = ["0103300333", "7950", "value3"];

        var t994 = ["value1", "value2", "value3", ];

        var t990 = ["value1", "value2", "value3", ];

        var t970 = ["value1", "value2", "value3", ]

        var t972 = ["value1", "value2", "value3"];
        var t973 = ["value1", "value2", "value3"];
        var t974 = ["value1", "value2", "value3", ];
        var t901 = ["value1", "value2", "value3", ];
        var t986 = ["value1", "value2", "value3", ];
        var t910 = ["value1", "value2", "value3", ];


        $.ajax({
            type: "GET",
            url: link + "tenant=" + tenant + "&status=" + status + "&month=" + month + "&year=" + year,
            dataType: "text",
            success: function(response) {
                var summary = (JSON.parse(response)['records']['summary']);
                var detailed = (JSON.parse(response)['records']['detailed']);
                detailed.forEach(record => {
                    var clid_old = record.clid.replace('<', '');
                    var clid_new = clid_old.replace('>', '');
                    var clid_ne = clid_new.replace('""', '');
                    var clid_n = clid_ne.replace('"', '');
                    var clid = clid_n.replace('"', '');
                    var direction = "";
                    var tenant = record.tenant;
                    var src = record.src;


                    if (tenant == "999") {
                        if (t999.includes(src)) {
                            direction = "Outgoing";
                        } else {
                            direction = "Incoming";
                        }
                    }
                    if (tenant == "998") {

                        if (t998.includes(src)) {
                            direction = "Outgoing";
                        } else {
                            direction = "Incoming";
                        }
                    }
                    if (tenant == "997") {

                        if (t997.includes(src)) {
                            direction = "Outgoing";
                        } else {
                            direction = "Incoming";
                        }
                    }
                    if (tenant == "995") {

                        if (t995.includes(src)) {
                            direction = "Outgoing";
                        } else {
                            direction = "Incoming";
                        }
                    }
                    if (tenant == "994") {

                        if (t994.includes(src)) {
                            direction = "Outgoing";
                        } else {
                            direction = "Incoming";
                        }
                    }
                    if (tenant == "990") {

                        if (t990.includes(src)) {
                            direction = "Outgoing";
                        } else {
                            direction = "Incoming";
                        }
                    }
                    if (tenant == "970") {

                        if (t970.includes(src)) {
                            direction = "Outgoing";
                        } else {
                            direction = "Incoming";
                        }
                    }
                    if (tenant == "972") {

                        if (t972.includes(src)) {
                            direction = "Outgoing";
                        } else {
                            direction = "Incoming";
                        }
                    }
                    if (tenant == "973") {

                        if (t973.includes(src)) {
                            direction = "Outgoing";
                        } else {
                            direction = "Incoming";
                        }
                    }
                    if (tenant == "974") {

                        if (t974.includes(src)) {
                            direction = "Outgoing";
                        } else {
                            direction = "Incoming";
                        }
                    }
                    if (tenant == "901") {

                        if (t901.includes(src)) {
                            direction = "Outgoing";
                        } else {
                            direction = "Incoming";
                        }
                    }
                    if (tenant == "986") {

                        if (t986.includes(src)) {
                            direction = "Outgoing";
                        } else {
                            direction = "Incoming";
                        }
                    }
                    if (tenant == "910") {

                        if (t910.includes(src)) {
                            direction = "Outgoing";
                        } else {
                            direction = "Incoming";
                        }
                    }

                    example2.row.add([
                        record.calldate,
                        direction,
                        clid,
                        record.dst,
                        record.disposition,
                        record.duration,
                        record.billamount

                    ]).draw(true);
                })
                summary.forEach(record => {
                    var clid_old = record.clid.replace('<', '');
                    var clid_new = clid_old.replace('>', '');
                    var clid_ne = clid_new.replace('""', '');
                    var clid_n = clid_ne.replace('"', '');
                    var clid = clid_n.replace('"', '');
                    summaryTable.row.add([
                        clid,
                        0,
                        0,
                        0,
                        record.minute_charged

                    ]).draw(true);
                })
            }
        });
    }

    function generatePdf() {

        var status = $("#status").val();
        var tenant = $("#tenant").val();
        var month = $("#month").val();
        var year = $("#year").val();

        var linkPdf = "<?php echo base_url(); ?>/report/pdf?";
        var url = linkPdf + "tenant=" + tenant + "&status=" + status + "&month=" + month + "&year=" + year;

        if (month == "") {
            Notiflix.Report.Failure('Failed', 'Select month and year to generate Pdf', 'Close');
        } else {
            window.open(url);
        }
    }
</script>
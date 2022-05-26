<?= $this->include('inc/header') ?>
<script>
    $(function() {
        <?php if (session()->has("future_month")) { ?>
            Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: '<?= session("future_month") ?>'
            })
        <?php } ?>
    });
</script>
<div class="main-content side-content pt-0">

    <div class="container-fluid">
        <div class="inner-body">
            <br>
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div>
                                <form id="trunk_form">
                                    <h4 class="main-content-label text-center mb-1">Generate Trunk Monthly Invoice<a class="modal-effect btn btn-info btn-icon-text pull-right btn-sm mx-2 my-4" onclick="generatePdf()"><i class="fe fe-download"></i></a> <a class="modal-effect btn btn-info btn-icon-text pull-right btn-sm mx-2 my-4"><i class="fe fe-mail"></i></a></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="">Tenant</label>
                                                <select class="form-control select select2" id="tenant" value="<?php echo set_value('tenant'); ?>" name="tenant">
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

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="">Month</label>
                                                <select class="form-control select select2" id="month" required="required" name="month">
                                                    <option label="Select a month"></option>
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="">Year</label><br>
                                                <?php $current_year = date("Y");
                                                ?>
                                                <input type="number" class="form-control datePickerId" id="year" max="<?= $current_year; ?>" name="year" id="datePickerIdEnd">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-info btn-icon-text pull-right btn-sm mx-2 my-4" type="submit">Generate Report</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
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
      $('#trunk_form').on('submit', function(e) {
        e.preventDefault();
        var tenant = $("#tenant").val();
        var month = $("#month").val();
        var year = $("#year").val();

        $.ajax({
            url: "<?php echo base_url(); ?>/report/trunk_report",
            type: 'GET',
            data: {
                tenant: tenant,
                month: month,
                year: year
            },
            success: function(response) {
                generatePdf();
                Notiflix.Report.Success('Success', 'Trunk report generated successfully', 'Close');
            }

        });
    });

    function generatePdf() {

        var tenant = $("#tenant").val();
        var month = $("#month").val();
        var year = $("#year").val();

        var linkPdf = "<?php echo base_url(); ?>/report/trunkpdf?";
        var url = linkPdf + "tenant=" + tenant + "&month=" + month + "&year=" + year;

        if (month == "") {
            Notiflix.Report.Failure('Failed', 'Select month and year to generate Pdf', 'Close');
        } else {
            window.open(url);
        }
    }
</script>
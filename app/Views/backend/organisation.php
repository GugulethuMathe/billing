<?= $this->include('inc/header') ?>

<?= $this->include('inc/footer') ?>
<div class="main-content side-content pt-0">

	<div class="container-fluid">
		<div class="inner-body">
			<!-- Page Header -->
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5">Departments</h2>

				</div>
				<div class="d-flex">
					<div class="justify-content-center">

						<button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
							<a class="modal-effect btn btn-white btn-icon-text btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8"> Add Department</a>
						</button>
						<button type="button" class="btn btn-primary my-2 btn-icon-text buttons-excel buttons-html5" aria-controls="department-list">
							<i class="fe fe-download-cloud mr-2"></i> Download Report
						</button>
					</div>
				</div>
			</div>
			<!-- End Page Header -->

			<!-- Row -->
			<div class="row row-sm">
				<div class="col-lg-12">
					<div class="card custom-card overflow-hidden">
						<div class="card-body">

							<div class="table-responsive">
								<table class="table" id="department-list">
									<thead>
										<tr>
											<th class="wd-20p">Name</th>
											<th class="wd-25p">Family</th>
											<th class="wd-25p"></th>
										</tr>
									</thead>
									<tbody>

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
	<div class="modal" id="modaldemo8">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title text-center">Adding a New Department</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="card custom-card">
						<div class="card-body">
							
							<div class="">
								<div class="row row-xs align-items-center mg-b-20">
									<div class="col-md-4">
										<label class="mg-b-0">Department Name</label>
									</div>
									<div class="col-md-8 mg-t-5 mg-md-t-0">
										<input class="form-control" placeholder="Enter Department Name" type="text">
									</div>
								</div>
								<div class="row row-xs align-items-center mg-b-20">
									<div class="col-md-4">
										<label class="mg-b-0">Family</label>
									</div>
									<div class="col-md-8 mg-t-5 mg-md-t-0">
										<input class="form-control" placeholder="Enter Family Name" type="text">
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn ripple btn-primary" type="button">Add Department</button>
					<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var receiveUrl = "http://208.85.158.190/?apikey=oA7UemeM2Hf48VILCJWmfIzv0y5O3cPO&action=pbxware.tenant.list";
	$(document).ready(function() {
		$('#department-list').DataTable({
			// ... skipped other options ...
			"bDestroy": true,
			"bSort": false,
			"ajax": {
				"url": receiveUrl,
				"dataSrc": "departments",
				"data": {
					status: status
				}

			},

			"columns": [

				{
					"data": "department_name",

				},
				{
					"data": "department_type"
				},
				{
					//adds td row for button
					render: function(data, type, row) {
						return '<button type="button" class="btn btn-sm btn-primary" onclick="updateDepartment(\'' + row.id + '\',\'' + row.department_name + '\',\'' + row.department_type + '\' );"  data-toggle="modal"  data-target="#edit_department" class="btn btn-sm btn-info"><i class="fa fa-edit">Edit</button>'

					}
				}
			],
			"dom": "Bfrtip",
			"buttons": [
				'excel', 'pdf'
			]
		});

	});
</script>

	const UrlAddDepartment = "<?php echo base_url(); ?>api/department/create";
	const UrlEditDepartment = "<?php echo base_url(); ?>api/department/update";
	const UrlListDepartments = "<?php echo base_url(); ?>api/department/getAll";
	const UrlAddSupplier = "<?php echo base_url(); ?>api/supplier/create";
	const UrlListSuppliers = "<?php echo base_url(); ?>api/supplier/getAll";
	const UrlAddStockMasterData = "<?php echo base_url(); ?>api/stockmaster/create";
	const UrlUpdateStockMasterData = "<?php echo base_url(); ?>api/stockmaster/update";
	const UrlListSStockMasterData = "<?php echo base_url(); ?>api/stockmaster/getAll";
	const UrlUserProfile = "<?php echo base_url(); ?>api/user/Userprofile";
	var UrlUpdateUsersProfile = "<?php echo base_url(); ?>api/user/profile";


	// getDepartments();
	getUserProfile();

	// function getDepartments() {
	// 	$.ajax({
	// 		url: UrlListDepartments,
	// 		type: "GET",
	// 		dataType: "JSON",
	// 		success: function(data) {
	// 			$('#displayDepartments').empty();
	// 			var html = '';
	// 			for (var i = 0; i < data.departments.length; i++) {
	// 				html += depatmentsTemplate(data.departments[i]);
	// 			}
	// 			$('#displayDepartments').append(html);
	// 		}
	// 	});

	// }

	// function depatmentsTemplate(output) {
	// 	var family = '';

	// 	if (output.department_type == 'dry_dispensary') {
	// 		family = 'Dry Dispensary';

	// 	}
	// 	if (output.department_type == 'groceries') {
	// 		family = 'Groceries';

	// 	}
	// 	if (output.department_type == 'haberdershery') {
	// 		family = 'Haberdershery';

	// 	}
	// 	if (output.department_type == 'cleaning_chemical') {
	// 		family = 'Cleaning Chemical';

	// 	}
	// 	if (output.department_type == 'stationery') {
	// 		family = 'Stationery';

	// 	}

	// 	return '<tr class="text-primary">' +
	// 		'<td style="display:none">' + output.id + '</td>' +
	// 		'<td>' + output.department_name + '</td>' +
	// 		'<td>' + family + '</td>' +
	// 		'<td><button data-toggle="modal" data-target="#edit_department" onclick="updateDepartment(' + "'" + output.id + "'" + ',' + "'" + output.department_name + "'" + ',' + "'" +
	// 		output.department_type + "'" + ')" class="btn btn-sm btn-info"><i class="fa fa-edit"> </i> Edit</button></td>' +
	// 		'</tr>';

	// }


	$('#submitDepartmentForm').on('submit', function(e) {
		e.preventDefault();
		var department_name = $.trim($("#department_name").val());
		var department_type = $.trim($("#department_type").val());
		var departmentId = $.trim($("#departmentId").val());
		var inputs;
		if (departmentId === 0) {
			inputs = {
				department_name: department_name,
				department_type: department_type
			}
		}
		$.ajax({
			url: UrlAddDepartment,
			type: 'POST',
			data: {
				department_name: department_name,
				department_type: department_type
			},
			dataType: "JSON",
			success: function(result) {
				if (!result.error) {
					// alert(result.message);
					Notiflix.Report.Success( 'Submitted', result.message, 'Close' ); 

					getDepartmentData();
					$("#submitDepartmentForm")[0].reset();
				}
			}

		});
	});
	//======================= for updating departments ===================
	
	function updateDepartment(id, departmentName, departmentType) {
		$("#departmentIdEdit").val(id);
		$("#department_name_edit").val(departmentName);
		$("#department_type_edit").val(departmentType);
	}

	$('#submitUpdateDepartmentForm').on('submit', function(e) {
		e.preventDefault();
		var departmentId = $.trim($("#departmentIdEdit").val());
		var departmentName = $.trim($("#department_name_edit").val());
		var departmentType = $.trim($("#department_type_edit").val());

		$.ajax({
			url: UrlEditDepartment,
			type: 'POST',
			data: {
				id: departmentId,
				department_name: departmentName,
				department_type: departmentType

			},
			dataType: "JSON",
			success: function(result) {
				if (!result.error) {
					// alert(result.message);
					Notiflix.Report.Success( 'Updated', result.message, 'Close' ); 
				
					getDepartmentData();
					$("#submitUpdateDepartmentForm")[0].reset();
					$("#edit_department").modal('hide');


				} else {
					alert(result.error);
				}
			}
		});

	});

	function getSupplierDiv() {
		$("#departments_div").hide();
		$("#suppliers_div").show();
		$("#stock_master_div").hide();
		$("#department_menu").removeClass('active');
		$("#suppliers_menu").addClass('active');
		$("#stockMaster_menu").removeClass('active');
		$("#submitDepartmentForm")[0].reset();
		$("#submitStockMasterDataForm")[0].reset();

	}

	function getDepartmentDiv() {
		$("#departments_div").show();
		$("#suppliers_div").hide();
		$("#stock_master_div").hide();
		$("#department_menu").addClass('active');
		$("#suppliers_menu").removeClass('active')
		$("#stockMaster_menu").removeClass('active');
		$("#submitSuppliersForm")[0].reset();
		$("#submitStockMasterDataForm")[0].reset();
	}

	function getStockMasterDiv() {
		$("#stock_master_div").show();
		$("#departments_div").hide();
		$("#suppliers_div").hide();
		$("#department_menu").removeClass('active');
		$("#suppliers_menu").removeClass('active');
		$("#stockMaster_menu").addClass('active');
		$("#submitDepartmentForm")[0].reset();
		// $("#submitSuppliersForm")[0].reset();


	}

	//==========================Suppliers ==================================

	getSuppliers();

	function getSuppliers() {
		$.ajax({
			url: UrlListSuppliers,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('#displaySuppliers').empty();
				var html = '';
				for (var i = 0; i < data.suppliers.length; i++) {
					html += suppliersTemplate(data.suppliers[i]);
				}
				$('#displaySuppliers').append(html);
			}
		});

	}

	function suppliersTemplate(output) {
		return '<tr class="text-primary">' +
			'<td>' + output.supplier_name + '</td>' +
			'<td>' + output.supplier_type + '</td>' +
			'<td>' + output.contact_name + '</td>' +
			'<td>' + output.email + '</td>' +
			'<td>' + output.cell_number + '</td>' +
			'<td>' + output.tel_number + '</td>' +
			'<td>' + output.physical_address + '</td>' +
			'<td><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>' +
			'</tr>';

	}



	$('#submitSuppliersForm').on('submit', function(e) {
		e.preventDefault();
		var supplier_name = $("#supplier_name").val();
		var supplier_type = $("#supplier_type").val();
		var contact_name = $("#contact_name").val();
		var email = $("#email").val();
		var cell_number = $("#cell_number").val();
		var tel_number = $("#supplier_type").val();
		var physical_address = $("#physical_address").val();
		var supplierId = $("#supplierId").val();

		$.ajax({
			url: UrlAddSupplier,
			type: 'POST',
			data: {
				supplier_name: supplier_name,
				supplier_type: supplier_type,
				contact_name: contact_name,
				email: email,
				cell_number: cell_number,
				tel_number: tel_number,
				physical_address: physical_address
			},
			dataType: "JSON",
			success: function(result) {
				if (!result.error) {
					getSuppliers();
					$("#submitSuppliersForm")[0].reset();

				}
			}

		});
	});


	

	$('#submitStockMasterDataForm').on('submit', function(e) {
		e.preventDefault();
		var description = $.trim($("#description").val());
		var unit_type = $.trim($("#unit_type").val());
		var stock_code = $.trim($("#stock_code").val());
		var min_quantity = $.trim($("#min_quantity").val());
		var max_quantity = $.trim($("#max_quantity").val());
		var unit_icn = $.trim($("#unit_icn").val());
		var department_type = $.trim($("#department_type2").val());
		var stockMasterId = $.trim($("#stockMasterId").val());




		$.ajax({
			url: UrlAddStockMasterData,
			type: 'POST',
			data: {
				description: description,
				unit_type: unit_type,
				stock_code: stock_code,
				max_quantity: max_quantity,
				min_quantity: min_quantity,
				unit_icn: unit_icn,
				department_type: department_type,
			},
			dataType: "JSON",
			success: function(result) {
				if (result.status == 1) {
					// alert(result.message);
					Notiflix.Report.Success( 'Submitted', result.message, 'Close' ); 

					getStockMasterData();
					$("#submitStockMasterDataForm")[0].reset();
					$("#add_stock_master").modal('hide');

				}else{
					Notiflix.Report.Failure( 'Failed to submit', result.message, 'Close' ); 

				}
			}

		});
	});

	//======================= Update Master stock data ===================
	function updateMasterStock(stockMasterId, description, unitType, depType, maxQuantity, minQuantity, unitIcn, stockCode) {
		// $("#stockMasterIdEdit").val(id);
		$("#stockMasterId").val(stockMasterId);
		$("#description_edit").val(description);
		$("#unit_type_edit").val(unitType);
		$("#department_type2_edit").val(depType);
		$("#max_quantity_edit").val(maxQuantity);
		$("#min_quantity_edit").val(minQuantity);
		$("#unit_icn_edit").val(unitIcn);
		$("#stock_code_edit").val(stockCode);

	}
	$('#submitUpdateStockMasterDataForm').on('submit', function(e) {
		e.preventDefault();
		var stockMasterId = $.trim($("#stockMasterId").val());
		var description = $.trim($("#description_edit").val());
		var unitType = $.trim($("#unit_type_edit").val());
		var depType = $.trim($("#department_type2_edit").val());
		var maxQuantity = $.trim($("#max_quantity_edit").val());
		var minQuantity = $.trim($("#min_quantity_edit").val());
		var unitIcn = $.trim($("#unit_icn_edit").val());
		var stockCode = $.trim($("#stock_code_edit").val());

		$.ajax({
			url: UrlUpdateStockMasterData,
			type: 'POST',
			data: {
				user_id: 1,
				id: stockMasterId,
				supplier_id: 1,
				stock_code: stockCode,
				description: description,
				unit_type: unitType,
				department_type: depType,
				max_quantity: maxQuantity,
				min_quantity: minQuantity,
				unit_icn: unitIcn

			},
			dataType: "JSON",
			success: function(result) {
				if (result.status == 1) {
					// alert(result.message);
					Notiflix.Report.Success( 'Submitted', result.message, 'Close' ); 

					getStockMasterData();
					$("#submitStockMasterDataForm")[0].reset();
					$("#edit_stock_master").modal('hide');

				} else {
					// alert(result.error);
					Notiflix.Report.Failure( 'Failed', result.message, 'Close' ); 

				}
			}
		});

	});

	function removeSpaces(string) {
		return string.split(' ').join('');
	}

	getUserProfile();

	function getUserProfile() {
		var userIdProfile = $("#profile_user_id_edit").val();
		$.ajax({
			url: UrlUserProfile,
			type: "GET",
			data: {
				id: userIdProfile
			},
			dataType: "JSON",
			success: function(data) {

				let {
					first_name,
					last_name,
					cell_number,
					email,
					user_name,
					user_password
				} = data;

				$('#first_name_profile').val(first_name);
				$('#last_name_profile').val(last_name);
				$('#profile_email_edit').val(cell_number);
				$('#profile_cell_number_edit').val(email);
				$('#profile_name_edit').val(user_name);
				$('#profile_password_edit').val(user_password);

			}
		});

	}
	$('#updateUserProfileEdit').on('submit', function(e) {
		e.preventDefault();

		var userIdProfile = $("#profile_user_id_edit").val();
		var user_id_edit = $("#user_id_edit").val();
		var user_name = $("#profile_name_edit").val();
		var user_email = $("#profile_cell_number_edit").val();
		var user_password = $("#profile_password_edit").val();
		var user_password_confirm = $("#profile_password_confirm").val();
		var user_cell_number = $("#profile_email_edit").val();
		if (user_password_confirm == user_password) {
			$.ajax({
				url: UrlUpdateUsersProfile,
				type: 'POST',
				data: {
					id: userIdProfile,
					user_name: user_name,
					user_email: user_email,
					user_password: user_password,
					cell_number: user_cell_number
				},
				dataType: "JSON",
				success: function(result) {
					if (!result.error) {
						if (result.status == 0) {
							alert('Your Profile updated successfully');
							$("#profile").modal('hide');
						} else {
							$("#profile").modal('hide');
						}
					}
				}

			});
		} else {
			alert('Passwords do not match');
		}
	});
	var id = new Date().getTime();



	var receiveUrl = "<?php echo base_url(); ?>api/department/getAll";
	getDepartmentData();

	function getDepartmentData(status) {

		$('test').dataTable({
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
						return '<button type="button" class="btn btn-primary" onclick="updateDepartment(\'' + row.id + '\',\'' + row.department_name + '\',\'' + row.department_type + '\' );"  data-toggle="modal"  data-target="#edit_department" class="btn btn-sm btn-info"><i class="fa fa-edit">Edit</button>'

					}
				}
			],
			"dom": "Bfrtip",
			"buttons": [
				'excel', 'pdf'
			]
		});
	}
	//=============Stock Master =================
	var stockMasterUrl = "<?php echo base_url(); ?>api/stockmaster/getAll";
	getStockMasterData();

	function getStockMasterData(status) {

		$('#stock_master_table').dataTable({
			// ... skipped other options ...
			"bDestroy": true,
			"bSort": false,

			"ajax": {
				"url": stockMasterUrl,
				"dataSrc": "stock_items",
				"data": {
					status: status
				}

			},

			"columns": [

				{
					"data": "description",
				},
				
				{
					"data": "department_type"
				},
				{
					"data": "unit_type"
				},
				{
					"data": "stock_code"
				},
				{
					"data": "max_quantity"
				},
				{
					"data": "min_quantity"
				},
				
				{
					"data": "unit_icn"
				},								
				
				

				{
					//adds td row for button
					
					render: function(data, type, row) {
						
						return '<button type="button" class="btn btn-primary" onclick="updateMasterStock(\'' + row.id + 
						// '\',\'' + row.stock_master_id + 
						'\',\'' + row.description + 
						'\',\'' + row.unit_type + 
						'\',\'' + row.department_type + 
						'\',\'' + row.max_quantity +
						'\',\'' + row.min_quantity + 
						'\',\'' + row.unit_icn + 
						'\',\'' + row.stock_code + '\' );"  data-toggle="modal"  data-target="#edit_stock_master" class="btn btn-sm btn-info"><i class="fa fa-edit">Edit</button>'
					}
				}
			],
			"dom": "Bfrtip",
			"buttons": [
				'excel', 'pdf'
			]
		});
	}

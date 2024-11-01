jQuery(document).ready(function($) {

	$("#wpservicecom_form").on("submit",function(e) {

		if( $("#wpservicecom_slug").val().length < 3 ){
			$("#wpservicecom_validation").html("<p>Slug is required.</p>").show();
			$("#wpservicecom_slug").focus();
			e.preventDefault();
			return;
		}

		if( $(".wpservicecom-button input:checked").size() == 0 ){
			$("#wpservicecom_validation").html("<p>Button style is required.</p>").show();
			$("#wpservicecom_slug").focus();
			e.preventDefault();
			return;
		}

		if( !$("#wpservicecom_terms").is(":checked") ){
			$("#wpservicecom_validation").html("<p>Please accept out terms.</p>").show();
			$("#wpservicecom_terms").focus();
			e.preventDefault();
			return;
		}

		$("#wpservicecom_validation").empty().hide();

	});
});
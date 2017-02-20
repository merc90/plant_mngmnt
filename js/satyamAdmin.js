$(".admin-reset-password").on("click", function(){
	adminID = $(this).data("idvalue");
	if(confirm("Are you sure to Reset Password for this User?"))
	{
			$.ajax({
			  type: "POST",
			  url: site_url+"/manage_admins/resetAdminPassword/",
			  data: {"adminID":adminID},
			  datatype: "html",
			  success: function(result){
			        //alert(result);
			      }
			})
	}
});



$(".block-admin-user").on("click", function(){
	adminID = $(this).data("idvalue");
	if(confirm("Are you sure to Block this User?"))
	{
		$.ajax({
		  type: "POST",
		  url: site_url+"/manage_admins/blockAdminUser/",
		  data: {"adminID":adminID},
		  datatype: "html",
		  success: function(result){
		        window.location.reload(true);
		      }
		  });
	}
});

$(".unblock-admin-user").on("click", function(){
	adminID = $(this).data("idvalue");

	if(confirm("Are you sure to UnBlock this User?"))
	{
		$.ajax({
		  type: "POST",
		  url: site_url+"/manage_admins/unblockAdminUser/",
		  data: {"adminID":adminID},
		  datatype: "html",
		  success: function(result){
		         window.location.reload(true);
		      }
		  })
	}
});

function checkForAdminEmail(formSubmit){

		var email = $("#adminEmail").val();
		$.ajax({
		  type: "POST",
		  url: site_url+"/manage_admins/existAdminUser/",
		  data: $('form#addAdminForm').serialize(),
		  datatype: "html",
		  success: function(result){
		  	if(result == "true") {
		  		$("#adminEmail").val("");
		  		$("#adminEmail").focus();
		  		$("#email_error").show();
		      $("#email_error").text("email already registered").fadeOut( 10000 );
		      return false;
		    }
		    else
		    {
		    	if(formSubmit) {
		    		alert("success");//$('form#addAdminForm').submit();
		    		$(location).attr('href',site_url+"/manage_admins/");
		    	}
		    }
		  }
		});

		return true;
}

$('form#addAdminForm').submit(function(){
	checkForAdminEmail(true);
	return false;
});


$("#forgetPasswordBtn").on("click", function(){

		var email = $("#forgotPasswordEmail").val();
		if(email == "")
		{
			$("#email_error").text("Please provide your Email");
			return false;
		}
        var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
    	if(!email.match(emailRegEx))
		{
			$("#email_error").text("Please provide valid Email");
			return false;
		}

	    $("#email_error").text("");
		$.ajax({
		  type: "POST",
		  url: site_url+"/satyam_index/forgotAdminPassword/",
		  data: {"email":email},
		  datatype: "html",
		  success: function(result){
		  		$("#adminEmail").val("");
		  		$("#fp_pwd_success").show();
		        $("#fp_pwd_success").text(result).fadeOut( 10000 );
		        $("#modal-forgot-password").hide();
		      }
		  })
});

$('#user_status_change_form').submit(function(evnt){
		evnt.preventDefault();
		$.post(
				$('#user_status_change_form').attr('action'),
				$("#user_status_change_form").serialize(),
				function (data) {alert("success");}
		);
});



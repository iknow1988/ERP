$(document).ready(function(){
	$('#loggedin').hide();
    $("#btn_login").click(
        function (evt) {
            var postdata = "username="+$('#username').val()+"&"+
            "password="+$('#password').val();
//alert(postdata);
            $.ajax({
                type: 'POST',
                url: base_url() + 'session/login',
                data: postdata,
                datatype: 'html',
                success : function (result) {
                    if (result == "error") {
                        alert("Wrong username and/or password");
                    } else if(result == "Professorfalse"||result == "Associate Professorfalse"||result == "Assistant Professorfalse"||result == "Lecturerfalse"){
                        $('#logged_name').html("Logged in as : "+result);
                        $('#login').hide('slow');
                        $('#loggedin').show('slow');
						var theUrl = base_url()+"HomePage/teacherHomePage" ;
     					location.href = theUrl;

                    }
					else if(result == "Professortrue"||result == "Associate Professortrue"||result == "Assistant Professortrue"||result == "Lecturertrue"){
                        $('#logged_name').html("Logged in as : "+result);
                        $('#login').hide('slow');
                        $('#loggedin').show('slow');
						var theUrl = base_url()+"HODHomePage_controller/HODHomePage" ;
     					location.href = theUrl;

                    }
					 else if(result == "Head Assistant"){
                        $('#logged_name').html("Logged in as : "+result);
                        $('#login').hide('slow');
                        $('#loggedin').show('slow');
						var theUrl = base_url()+"HaHomePage_controller/haHomePage" ;
     					location.href = theUrl;

                    }
					else if(result == "Data Entry Assistant"){
                        $('#logged_name').html("Logged in as : "+result);
                        $('#login').hide('slow');
                        $('#loggedin').show('slow');
						var theUrl = base_url()+"deaHomePage_controller/deaHomePage" ;
     					location.href = theUrl;

                    }
					else if(result == "Senior Lab Instructor"){
                        $('#logged_name').html("Logged in as : "+result);
                        $('#login').hide('slow');
                        $('#loggedin').show('slow');
						var theUrl = base_url()+"sliHomePage_controller/sliHomePage" ;
     					location.href = theUrl;

                    }
                }
            });
        });
    $("#btn_logout").click(
        function (evt) {
//            alert("loggin out");
            window.location = base_url() + "session/logout";
            return false;
//            $.ajax({
//                type: 'POST',
//                url: 'session/logout',
//                success : function (result) {
//                    if (result == "error") {
//                        alert("error loggin out!");
//                    } else {
////                        $('#logged_name').html("");
////                        $('#loggedin').hide('slow');
////                        $('#login').show('slow');
//                    }
//                }
//            });
       })
});
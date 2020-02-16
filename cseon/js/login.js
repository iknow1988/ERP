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
                    } else {
                        $('#logged_name').html("Login as: "+result);
                        $('#login').hide('slow');
                        $('#loggedin').show('slow');
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
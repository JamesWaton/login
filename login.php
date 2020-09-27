<?php
    session_start();

    //here we can choose how to store the data eg for the data base but here i am doing session as i wont to demonstrate how it works
    if (isset($_POST['userID'])) {
        $_SESSION['userID'] = $_POST['userID'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['picture'] = $_POST['picture'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['accessToken'] = $_POST['accessToken'];

        exit("success");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Facebook Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
<div class="container" style="margin-top:100px">
    <div claas="row justify-content-center">
        <div class="col-md-6 col-offset-3">
            <form>
                    <input class="form-control" placeholder="Email.."><br>
                <input class="form-control" placeholder="Password..."><br>
                <input type="submit" value="Log In">
                <input type="button" onclick="login()" value="Log In With Facebook">
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
// information gained was from Facebook Login Tutorial Using Javascript SDK & Graph API
    var person = {userID:"", name:"", accessToken:"", picture:"", email:"" };



    function login(){
        FB.login(function (response){
            if(response.status == "connected"){
                person.userID = response.authResponse.userID
                person.accessToken = response.authResponse.accessToken
                FB.api('/me?fields=id,name,email,picture.type(large)', function (userData){
                   person.name = userData.name;
                   person.email = userData.email;
                   person.picture = userData.picture.data.url;

                   //when adding other logins add sessions cookies to store the data

                    $.ajax({
                        url: "login.php",
                        method: "POST",
                        data: person,
                        dataType: 'text',
                        success: function (serverResponse) {
                            console.log(person);
                            if (serverResponse == "success")
                                window.location = "index.php";

                        }
                    });

                });
            };

            //scope will be specifying what parts of you profile the app is accessing
        }, {scope:'public_profile, email'})

    }

    // This is found on the facebook developer website then app id is added linking it to my app.
    window.fbAsyncInit = function() {
        FB.init({
            appId            : 'decided not to post this due to privacy ',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v8.0'
        });
    };
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>



</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="./assets/css/user.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->
<script>
    function loginAdmin(){
        window.location.replace('./login.php');
    }

    let gender,course;
    function changeDDGender(){
        gender = document.querySelector('#gender').value;
    }
    function changeDDCourse(){
        course = document.querySelector('#course').value;
    }

    function submit_reg(){
        // console.log(gender);
        // console.log(course);
        var formData = new FormData();
        formData.append('fName',  $("#fName").val());
        formData.append('lName', $("#lName").val());
        formData.append('email', $("#email").val());
        formData.append('phone', $("#phone").val());
        formData.append('gender',gender);
        formData.append('course',course);

        $checkVal = true;
        for (const value of formData.values()) {
          console.log(value);
            if(value=='' || value=='undefined')
                $checkVal = false;
        }
        // console.log($countValues);
        if($checkVal){
            $.ajax({
                type: "POST",
                url: "./admin/dBconnection/api.php/?q=submitReg",
                data : formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data){
                    // alert(data.message);
                    // console.log(data.message);
                    // window.location.replace();
                    window.location.replace('./files/registered.php');
                    console.log("Sucess");
                },
                error: function(xhr, status, error){
                    // window.location.reload();
                    console.log("Nooooo!!!!");
                    // window.location.replace('./files/registered.php');

                    // alert("Fill in the details");
                },
            });

        }else{
            alert("Fill all Fields.");
            console.log();
        }

    }
</script>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <h3>Welcome</h3>
                        <img src="./assets/images/login-page-img.png" alt="">
                        <p>You are 30 seconds away from gaining new Experience.</p>
                        <input type="button" class="" name="submit" onclick="loginAdmin()" value="Login as Admin"/>
                        <!-- <input type="submit" name="" value="Login"/><br/> -->
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Course Registration Form </h3>
                                <form method="POST">
                                    <div class="row register-form">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="fName" placeholder="First Name *" value="" required/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="lName" placeholder="Last Name *" value="" required />
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control" id="gender" onchange="changeDDGender()" required>
                                                    <option class="hidden"  selected disabled>Gender *</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="email" placeholder="Your Email *" value="" required/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" minlength="10" maxlength="10" id="phone" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" required/>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" id="course" onchange="changeDDCourse()" required>
                                                    <option class="hidden"  selected disabled>Please select your Course. *</option>
                                                    <option>Web Development</option>
                                                    <option>App Development</option>
                                                    <option>Graphic Designing</option>
                                                </select>
                                            </div>

                                            <input type="button" class="btnRegister" name="submit" onclick="submit_reg()" value="Register"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
</body>
</html>
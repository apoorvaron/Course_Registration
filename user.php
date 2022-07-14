<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="./assets/images/reg-img.jpg"
    />
  </head>
<body style="background-color: #0d6efd">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
        console.log(gender);
        console.log(course);
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
<section class="vh-100" style="background-color: #0d6efd">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                      Course Registration
                    </p>

                    <form class="mx-1 mx-md-4" method="POST">
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="text"
                            id="fName"
                            class="form-control"
                            placeholder="First Name *"
                            required
                          />
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="text"
                            id="lName"
                            class="form-control"
                            placeholder="Last Name *"
                            required
                          />
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="email"
                            id="email"
                            class="form-control"
                            placeholder="Email *"
                            required
                          />
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <div class="form-group">
                                <input
                                    type="text"
                                    minlength="10"
                                    maxlength="10"
                                    id="phone"
                                    name="txtEmpPhone"
                                    class="form-control"
                                    placeholder="Your Phone *"
                                    value=""
                                    required
                                />
                            </div>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <div class="form-group">
                            <select
                              class="form-control"
                              id="gender"
                              onchange="changeDDGender()"
                              required
                            >
                              <option class="hidden" selected disabled>
                                Gender *
                              </option>
                              <option>Male</option>
                              <option>Female</option>
                              <option>Other</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <div class="form-group">
                            <select
                              class="form-control"
                              
                              id="course"
                              onchange="changeDDCourse()"
                              required
                            >
                              <option class="hidden" selected disabled>
                                Please select your Course. *
                              </option>
                              <option>Web Development</option>
                              <option>App Development</option>
                              <option>Graphic Designing</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div
                        class="d-flex justify-content-center mx-4 mb-3 mb-lg-4" style="float:right;    "
                      >
                        <input type="button" name="submit" class="btn btn-primary btn-lg" style=" margin-left: 45%;"                       onclick="submit_reg()"    value="Register"/>
                      </div>
                    </form>
                    <button type="button" class="btn btn-dark btn-lg" style="margin-left: 8%;" onclick="loginAdmin()">
                      Login as Admin
                    </button>
                  </div>
                  <div
                    class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2"
                  >
                    <img
                      src="./assets/images/reg-img.jpg"
                      class="img-fluid"
                      alt="Sample image"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</body>
</html>
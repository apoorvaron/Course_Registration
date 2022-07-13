	<!-- nav bar -->
	<?php
	include("./includes/header.php");
  // session_start();
  // if(!$_SESSION['auth']){
  //   header('location: ../../../login.php');
  //   }
  //   $now = time(); // Checking the time now when home page starts.

  //   if ($now > $_SESSION['expire']) {
  //       session_destroy();
  //       header('location: auth/login.php');
  //   }
	?>
  
        <div class="container-fluid">
          <!-- ============================================================== -->

          <!-- Table -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- column -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <!-- title -->
                  <div class="d-md-flex">
                    <div>
                      <h4 class="card-title">Student Details</h4>
                    </div>
                  </div>
                  <!-- title -->
                  <div class="table-responsive">
                    <table
                      class="table mb-0 table-hover align-middle text-nowrap"
                    >
                      <tbody>
                        <tr>
                          <td>
                            <div class='d-flex align-items-center'>
                              <div class='m-r-10'>
                              </div>
                              <div>
                                <h4 class='m-b-0 font-16'>S.No</h4>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class='d-flex align-items-center'>
                              <div class='m-r-10'>
                              </div>
                              <div>
                                <h4 class='m-b-0 font-16'>Name</h4>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class='d-flex align-items-center'>
                              <div class='m-r-10'>
                              </div>
                              <div>
                                <h4 class='m-b-0 font-16'>Email</h4>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class='d-flex align-items-center'>
                              <div class='m-r-10'>
                              </div>
                              <div>
                                <h4 class='m-b-0 font-16'>Phone No.</h4>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class='d-flex align-items-center'>
                              <div class='m-r-10'>
                              </div>
                              <div>
                                <h4 class='m-b-0 font-16'>Gender</h4>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class='d-flex align-items-center'>
                              <div class='m-r-10'>
                              </div>
                              <div>
                                <h4 class='m-b-0 font-16'>Course</h4>
                              </div>
                            </div>
                          </td>

                        </tr>
                        <?php
                          // Include config file
                          // require_once "config.php";
                          require('../admin/dBconnection/database.php');
                          $database = new Database();
                          $link = $database->connect();

                          $sql = "SELECT * FROM courseReg WHERE course ='Graphic Designing'";
                          if($result = mysqli_query($link, $sql)){
                              if(mysqli_num_rows($result) > 0){
                                      while($row = mysqli_fetch_array($result)){
                                              echo "<tr>
                                                      <td>".$row['id']."</td>
                                                      <td>
                                                        <div class='d-flex align-items-center'>
                                                          <div class='m-r-10'>
                                                          </div>
                                                          <div>
                                                            <h4 class='m-b-0 font-16'>".$row['fName']." ".$row['lName']."</h4>
                                                          </div>
                                                        </div>
                                                      </td>
                                                      <td>".$row['email']."</td>
                                                      <td>".$row['phone']."</td>
                                                      <td>".$row['gender']."</td>
                                                      <td>
                                                        <h5 class='m-b-0'>".$row['course']."</h5>
                                                      </td>
                                                    </tr>";
                                      }
                              } else{
                                  echo "<p class='lead'><em>No Record Found.</em></p>";
                              }
                          } else{
                              echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                          }
                          // Close connection
                          mysqli_close($link);
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->


          <!-- ============================================================== -->
          <!-- Recent comment and chats -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->

        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
        <?php
	include("./includes/footer.php")
	?>
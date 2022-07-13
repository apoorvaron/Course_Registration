	<!-- nav bar -->
	<?php
	include("./includes/header.php");
	?>
  

                        <?php

                          // require('../admin/dBconnection/database.php');
                          // $database = new Database();
                          // $link = $database->connect();

                          // $sql = "SELECT * FROM courseReg ";
                          // if($result = mysqli_query($link, $sql)){
                          //     if(mysqli_num_rows($result) > 0){
                          //             while($row = mysqli_fetch_array($result)){
                          //                     echo "<tr>
                          //                             <td>".$row['id']."</td>
                          //                             <td>
                          //                               <div class='d-flex align-items-center'>
                          //                                 <div class='m-r-10'>
                          //                                 </div>
                          //                                 <div>
                          //                                   <h4 class='m-b-0 font-16'>".$row['fName']." ".$row['lName']."</h4>
                          //                                 </div>
                          //                               </div>
                          //                             </td>
                          //                             <td>".$row['email']."</td>
                          //                             <td>".$row['phone']."</td>
                          //                             <td>".$row['gender']."</td>
                          //                             <td>
                          //                               <h5 class='m-b-0'>".$row['course']."</h5>
                          //                             </td>
                          //                           </tr>";
                          //             }
                          //     } else{
                          //         echo "<p class='lead'><em>No Record Found.</em></p>";
                          //     }
                          // } else{
                          //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                          // }
                          // // Close connection
                          // mysqli_close($link);
                        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="" crossorigin="anonymous"></script>
  <script>
    let url = '../admin/dBconnection/api.php/?q=getDesignStudent';
    var adminPage = document.getElementById("adminPage");
    // galleryImage.innerHTML = "ll";

    $(document).ready(function() {
      // console.log("efd");
      $.ajax({
        url: url,
        method: 'GET',
        dataType: 'JSON',
        success: function(data) {
          console.log("admin-page data", data);
          data.forEach(myFunc);

          function myFunc(row) {
            adminPage.innerHTML += ` <tr>
                                          <td>${ row.id }</td>
                                          <td>
                                            <div class='d-flex align-items-center'>
                                              <div class='m-r-10'>
                                              </div>
                                              <div>
                                                <h4 class='m-b-0 font-16'>${row.fName} ${row.lName}</h4>
                                              </div>
                                            </div>
                                          </td>
                                          <td>${row.email}</td>
                                          <td>${row.phone}</td>
                                          <td>${row.gender}</td>
                                          <td>
                                            <h5 class='m-b-0'>${row.course}</h5>
                                          </td>
                                        </tr>`;
          }
        },
                error: function(xhr, status, error){
                    // window.location.reload();
                    console.log("Nooooo!!!!");
                    // window.location.replace('./files/registered.php');

                    // alert("Fill in the details");
                },
      })
    })
  </script>

               
  <?php
	include("./includes/footer.php")
	?>
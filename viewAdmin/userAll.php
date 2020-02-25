<?php
session_start();
 include_once "validations/middleware.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<link rel="stylesheet" href="../assets/css/navbar.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="view-users.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<!------ Include the above in your HEAD tag ---------->

</head>

<div>

<?php include_once "navBar/navBar.php"  ?> 

  <body>
    <?php
   

    try {

      include_once "databaseQueries/connection.php";
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    ?>

    <div id="tabs" class="project-tab" style="margin-top: 50px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All Users</a>

              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

               	<table class="products table table-striped text-center"  border="5px">



                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>IsAdmin</th>
                      <th>Profile Image</th>
                      <th>Room No.</th>
                      <th>Ext.</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                  $select = "SELECT * FROM category_product";
                  $select = "select * from users";
                  $res = $conn->query($select);
                  while ($row = $res->fetch()) {


                    echo "<tbody>";
                    echo " <tr>";
                    echo "<td>" . $row['name'] . "<br>" . "</td>";
                    echo "<td>" . $row['email'] . "<br>" . "</td>";
                    echo "<td>" . $row['is_admin'] . "<br>" . "</td>";
                    echo "<td><img src='" . $row["profile_path"] . "' height='100' width='100'>";"</td>";

                    echo "<td>" . $row['room_No'] . "<br>" . "</td>";
                    echo "<td>" . $row['Ext'] . "<br>" . "</td>";

                    echo "<td><a class=\"btn btn-danger\" href=\"delete.php?id=" . $row['id'] . "\">Delete</a>
                     
                    <a class=\"btn btn-primary\" href=\"update.php?id=" . $row['id'] . "\">Update</a></td>";
                    echo "</tr>";
                    echo "</tbody>";
                  }

                  ?>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


</body>

</html>
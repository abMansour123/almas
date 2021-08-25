<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title> Add employee</title>
</head>
<?php
include '../../shared/config.php';
include '../../shared/sidebar.php';
include '../../shared/auth.php';








//insert into employee database
if (isset($_POST['einfo'])) {
  $name = $_POST['name'];
  $salary = $_POST['salary'];
  $dep = $_POST['dep'];
  $email = $_POST['email'];
  $password = $_POST['empPass'];

  $secur = "SELECT * FROM employee WHERE empEmail = '$email'";
  $d = mysqli_query($conn, $secur);
  $r = mysqli_num_rows($d);
  if ($r > 0) { ?>
    <script>
      alert(' This Email Already Exit')
    </script>; <?php } else {
                $insert = " INSERT INTO `employee` VALUES (NULL , '$name' , $salary , $dep , '$email' , '$password')";
                $s = mysqli_query($conn, $insert);
                header('location:emList.php');
              }
            }


            //edit
            $name = "";
            $salary = "";
            $upEmail = "";
            $upPass = "";

            $ebutton = false;
            if (isset($_GET['edit'])) {
              $ebutton = true;
              $id = $_GET['edit'];
              $select = "SELECT * FROM `employee` WHERE id= $id";
              $s = mysqli_query($conn, $select);
              $row = mysqli_fetch_assoc($s);
              $name =  $row['empName'];
              $salary = $row['salary'];
              $upEmail = $row['empEmail'];
              $upPass = $row['empPass'];
            }

            if (isset($_POST['update'])) {
              $name = $_POST['name'];
              $salary = $_POST['salary'];
              $depid = $_POST['dep'];
              $upEmail = $_POST['email'];
              $upPass = $_POST['empPass'];

              $secur = "SELECT * FROM employee WHERE empEmail = '$upEmail'";
              $d = mysqli_query($conn, $secur);
              $r = mysqli_num_rows($d);
              if ($r > 2) { ?>
    <script>
      alert('email already exit')
    </script>; <?php } else {


                $update = "UPDATE `employee` SET empName = '$name' , salary = '$salary' , depId = '$depid' , empEmail = '$upEmail' , empPass = '$upPass' where id = $id";
                $f = mysqli_query($conn, $update);

                header('location:emList.php');
              }
            }
                ?>

<!--add employee form-->
<div class="container pt-5" style="text-align: center;">
  <h1 style="color: #ef8354 ;" class="display-2">Add a new Employee</h1>
</div>
<div class="container col-5 mt-5 ml-5">
  <form method="POST">
    <div class="mb-3">
      <label for="formGroupExampleInput">Employee Name</label>
      <input value="<?php echo $name ?>" name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="please type employee name" required>
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput2">Employee Salary</label>
      <input value="<?php echo $salary ?>" name="salary" type="text" class="form-control" id="formGroupExampleInput2" placeholder="please type employee salary" required>
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput2">Email</label>
      <input value="<?php echo $upEmail ?>" name="email" type="email" class="form-control" id="formGroupExampleInput2" placeholder="please type employee email"  required>
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput2">Password</label>
      <input value="<?php echo $upPass ?>" name="empPass" type="text" class="form-control" id="formGroupExampleInput2" placeholder="please type employee password"  required>
    </div>
    <div class="mb-3">
      <!--dep dropdown options -->
      <label for="exampleFormControlSelect1">Department</label>
      <select name="dep" class="form-control" id="exampleFormControlSelect1" required>
        <?php
        $select = "SELECT * FROM `department`";
        $s = mysqli_query($conn, $select);
        foreach ($s as $dep) { ?>
          <option value="<?php echo $dep['id']; ?>"> <?php echo $dep['depName']; ?> </option>
        <?php } ?>
      </select>

      <?php if ($ebutton) : ?>
        <div class="d-grid gap-2">
          <button name="update" type="submit" class="btn btn-secondary mt-5">edit</button>
        </div>
      <?php else : ?>
        <div class="d-grid gap-2">
          <button name="einfo" type="submit" class="btn btn-secondary mt-5">SUBMIT</button>
        </div>
      <?php endif; ?>
    </div>
  </form>
</div>

<?php include '../../shared/script.php'; ?>
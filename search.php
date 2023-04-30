<?php
include "db.php";
$search = $_POST['search'];
echo $search;
$sql = "SELECT * FROM `features` WHERE name like '%$search%' ";
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
<style>
* {
  box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
  font-family: Arial;
  padding: 20px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>
</head>

<body>

    <h2 style="text-align:center">Product Card</h2>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="card">
      <h2><?php echo $row['name'] ?></h2>
      <h5>ID : <?php echo $row['id'] ?></h5>
      
      <p><?php  echo $row['description']?></p>

      <a href='viewmore.php?var=<?php echo $row['id']; ?>&type=courses'>View More</a>
      <a href="apply.php?id=<?php echo $row['id'] ?>" class="card-link">Apply</a>
    </div>



    <?php

        }
    } else {
    }
    ?>



</body>

</html>
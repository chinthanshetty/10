<?php 
  session_start(); 
?>

                    <!-- <button class="btn al  btn-lg" type="button"
                        onclick="location.href='skilltest.php';">here</button>
<span class="as"></span>
                    
                    <button class="btn al  btn-lg" type="button"
                        onclick="location.href='register.php';">EMPLOYEE</button>
<span class="as"></span>
                    <button class="btn  btn-lg al" type="button"
                        onclick="location.href='register_company.php';">COMPANY</button>
 -->




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial;
  color: white;
}

.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

.left {
  left: 0;
  background-color: #28bcff;
}

.right {
  right: 0;
  background-color: #2196f3;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.centered img {
  width: 150px;
}
</style>
</head>
<body>
<button type="button"
                        onclick="location.href='register.php';">
<div class="split left">
  <div class="centered">
    <img src="img/employee.png" alt="Employee">
    <h1 style="color:white;font-size: 30px;">Employee</h1>
    <!-- <p>click here to continue</p> -->
  </div>
</div>
</button>
<button type="button"
                        onclick="location.href='register.php';">
<div class="split right">
  <div class="centered">
    <img src="img/urban.png" alt="Company">
    <h1 style="color:white;font-size: 30px;">Company</h1>
    <!-- <p>click here to continue</p> -->
  </div>
</div>
</button>
</body>
</html> 

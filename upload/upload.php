<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSS Button hover animation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
     <meta charset="utf-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Responsive Navbar</title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body{
            background-image: linear-gradient(to bottom, #0D3E68, #ffffff);
            height: 100vh; 
        }
        .wrapper {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%); 
}
        .box {
  position: relative;
  display: inline-block;
  font-family: poppins;
  padding: 15px 20px;
  margin: 5px;
  background: #262626; 
  color: #fff;
  text-decoration: none;
  font-size: 20px;
  z-index: 1;  
}
        .effect:nth-child(1):before{
            background-color: #3b5998;  
        }
        .effect:nth-child(2):before{
            background-color: #bd081c;  
        }
        .effect:nth-child(3):before{
            background-color: #DC4E41;  
        }
        .effect:nth-child(4):before{
            background-color: #ff0000;  
        }
        
        
        .effect:before {
  content: "";
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  height: 100%;
  width: 0;
  z-index: -1;
  transition: .5s;
  box-sizing: border-box;
}
.effect:hover:before {
  width: 100%;
}


 
    </style>
</head>
<body>

   <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Jobbester</label>
      <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="adminlogin.php">Admin</a></li>
       
      </ul>
    </nav>

    <div class="wrapper">
        <a href="foodadd.php" class="box effect">
        <i class="fa fa-upload"></i> &nbsp;Upload
      </a>
       <a href="foodinfo.php" class="box effect">
        <i class="fa fa-eye"></i> &nbsp;View Uploads
      </a>
        <a href="user_info.php" class="box effect">
        <i class="fa fa-users"></i> &nbsp;View Users 
      </a>         
        <a href="#" class="box effect">
        <i class="fa fa-youtube"></i> &nbsp;Youtube   
      </a>
    </div>
</body>
</html>
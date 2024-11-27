<span style="font-family: verdana, geneva, sans-serif;">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard </title>
  <link rel="stylesheet" href="../styles/admindashboard.css" />
  
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <style>
    
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700");
*{
  margin: 0;
  padding: 0;
  outline: none;
  border: none;
  text-decoration: none;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body{
  background: #dfe9f5;
}

.container{
  display: flex;
}
nav{
  position: relative;
  top: 0;
  bottom: 0;
  height: 100vh;
  left: 0;
  background: #fff;
  width: 280px;
  overflow: hidden;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.logo{
  text-align: center;
  display: flex;
  margin: 10px 0 0 10px;
}

.logo span{
  font-weight: bold;
  padding-left: 15px;
  font-size: 18px;
  text-transform: uppercase;
}
a{
  position: relative;
  color: rgb(85, 83, 83);
  font-size: 14px;
  display: table;
  width: 280px;
  padding: 10px;
}
nav .fas{
  position: relative;
  width: 70px;
  height: 40px;
  top: 14px;
  font-size: 20px;
  text-align: center;
}
.nav-item{
  position: relative;
  top: 12px;
  margin-left: 10px;
}
a:hover{
  background: #eee;
}
.logout{
  position: absolute;
  bottom: 0;
}

/* Main Section */
.main{
  position: relative;
  padding: 20px;
  width: 100%;
}
.main-top{
  display: flex;
  width: 100%;
}
.main-top i{
  position: absolute;
  right: 0;
  margin: 10px 30px;
  color: rgb(110, 109, 109);
  cursor: pointer;
}
.main-skills{
  display: flex;
  margin-top: 20px;
}
.main-skills .card{ 
  width: 50%;
  margin: 10px;
  background: #fff;
  text-align: center;
  border-radius: 20px;
  padding: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.main-skills .card h3{
  margin: 10px;
  text-transform: capitalize;
}
.main-skills .card p{
  font-size: 12px;
}
.main-skills .card button{
  background: black;
  color: #fff;
  padding: 7px 15px;
  border-radius: 10px;
  margin-top: 15px;
  cursor: pointer;
  
}

.main-skills .card i{
  font-size: 22px;
  padding: 10px;
}

    </style>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="admindashboard.php" class="logo">
          <span class="nav-item">DashBoard</span>
        </a></li>
        <li><a href="admindashboard.php">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a></li>
        <li><a href="http://localhost/sneaker_hub/admin/adminusers.php">
          <i class="fas fa-user"></i>
          <span class="nav-item">Users</span>
        </a></li>
        <li><a href="admin_page.php">
        <i class="fas fa-shopping-bag"></i>
          <span class="nav-item">Products</span>
        </a></li>
        <li><a href="admin_order.php">
          <i class="fas fa-archive"></i>
          <span class="nav-item">Orders</span>
        </a></li>
      
        
        <li><a href="../login/logout.php" class="logout">
          <i class="fas fa-sign-out-alt" ></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>
    <section class="main">
      <div class="main-top">
       

        <p id="datetime"></p>
      </div>
      <div class="main-skills">

    <section class="main">
      <div class="main-top">
        <h1>Admin Management System</h1>
        
      </div>
      <div class="main-skills">
        <div class="card">
          <i class="fas fa-users" ></i>
          <h3>Users</h3>
          <a href="adminusers.php"><button>Click Here</button></a>
          
        </div>
        <div class="card">
          <i class="fas fa-shopping-bag"></i>
          <h3>Products</h3>
          <a href="admin_page.php"> <button> Click Here</button></a>
          
        </div>
        <div class="card">
          <i class="fas fa-archive"></i>
          <h3>Orders</h3>
          
          <a href="admin_order.php"><button>Click Here</button></a>
        </div>
     
      </div>
      
    </section>
  </div>
  <script>
    
    function updateDateTime() {
      const dateTimeElement = document.getElementById('datetime');
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', timeZoneName: 'short' };
      const currentDateTime = new Date().toLocaleDateString('en-US', options);
      dateTimeElement.textContent = currentDateTime;
    }

  
    updateDateTime();

    setInterval(updateDateTime, 1000);
  </script>
</body>
</html></span>
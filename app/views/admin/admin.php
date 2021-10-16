<!DOCTYPE html>
<html>
    <head>
        <title>
            Admin
        </title>
        <link rel="stylesheet" href="<?=ASSETS?>css/headerStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/adminStyle1.css">




    </head>

    <body>
    <header>
        <nav class="top_nav_admin">
            <div class="nav_item1">

            </div>
            <div class="nav_item2">
                
                <a class="a_navitem2" href="<?=ROOT?>forums">Notifications</a>
            </div>
            <?php if(!Auth::logged_in()):?>
            <div class="nav_item3">
                <i class="fas fa-user-circle fa-10x" id="login_logo"></i>
                <a class="a_navitem3" href="<?=ROOT?>login"> Log In</a>  
            </div>
            <?php endif;?>

            <?php if(Auth::logged_in()):?>
            <div class="dropdown">
                <button class="dropbtn"><?=Auth::fname()?>  
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="#">Dashboard</a>
                <a href="#">My Account</a>
                <a href="<?=ROOT?>logout">Log Out</a>
                </div>
            </div> 
            <?php endif;?>

        </nav>
        </header>
        
        <div class="bg_image_container">
        <img class="bg_image" src="<?=ASSETS?>img/admin.jpg">
        </div>

        <div class="sidebar">
        <div class="nav_item_admin">
        <img class="logo_admin" src="<?=ASSETS?>img/logo.png">               
        </div>

        <div class="tablinks" onclick="openCard(event, 'dashboard')" id="defaultOpen">Dashboard</div>
        <div class="tablinks" onclick="openCard(event, 'users')">Users</div>
        <div class="tablinks" onclick="openCard(event, 'feedbacks')">Feedbacks</div>
        <div class="tablinks" onclick="openCard(event, 'channeling')">Channeling</div>
        <div class="tablinks" onclick="openCard(event, 'products')">Products</div>
        <div class="tablinks" onclick="openCard(event, 'payments')">Payments</div>
        <div class="tablinks" onclick="openCard(event, 'articles')">Articles</div>
        <div class="tablinks" onclick="openCard(event, 'forums')">Forums</div>
        <div class="tablinks" onclick="openCard(event, 'reports')">Reports</div>

        </div>

        <div  id="dashboard" class="tabcontent">
        <div class="content1">
        <div class="card">
                <div class="card1"> <div class="card_number">10</div></div>
                <div class="card2"><div ><img src="https://img.icons8.com/color/48/000000/medical-doctor.png"/></div>
                <div class="card_content">Active Doctors</div></div>
        </div>
        <div class="card">
                <div class="card1"><div class="card_number">15</div></div>
                <div class="card2"><div class="card_content"><img src="https://img.icons8.com/color/48/000000/call-in-bed.png"/></div>
                <div class="card_content">Active Patients</div></div>
        </div>
        <div class="card">
                <div class="card1"><div class="card_number">20</div></div>
                <div class="card2"><div class="card_content"><img src="https://img.icons8.com/fluency/48/000000/reseller.png"/></div>
                <div class="card_content">Active Sellers</div></div>
        </div>
        </div>

        <div class="content2">
        <div class=cards>
                <div class="cards1"> <div><img class="chart1"src="https://www.w3schools.com/python/img_matplotlib_pie1.png"/></div></div>
                
                <div class="cards2">
                <div class="card_content1">

        <div class="cards2-1">
                <div class=""><div >Total Revenue</div>
                <div class="">10,000</div></div>
        </div>
        <div class="cards2-1">
                <div class=""><div >Total Cost</div>
                <div class="">5,000</div></div>
        </div>
        <div class="cards2-1">
                <div class=""><div >Total Profit</div>
                <div class="">5,000</div></div>
        </div>
                </div>
                <div ><img class="chart2" src="https://miro.medium.com/max/1400/1*bFUKtr4h4mzmY5uHuEz_zA.png"/></div>
            </div>
        </div>
        

            </div>
        </div>

        <div id="users" class="tabcontent">
        <div class="content">
        <div class="content1">
        <div class="card">
                <div class="card1"> <div class="card_number">10</div></div>
                <div class="card2"><div ><img src="https://img.icons8.com/color/48/000000/medical-doctor.png"/></div>
                <div class="card_content">Active Doctors</div></div>
        </div>
        <div class="card">
                <div class="card1"><div class="card_number">15</div></div>
                <div class="card2"><div class="card_content"><img src="https://img.icons8.com/color/48/000000/call-in-bed.png"/></div>
                <div class="card_content">Active Patients</div></div>
        </div>
        <div class="card">
                <div class="card1"><div class="card_number">20</div></div>
                <div class="card2"><div class="card_content"><img src="https://img.icons8.com/fluency/48/000000/reseller.png"/></div>
                <div class="card_content">Active Sellers</div></div>
        </div>
        <div style="background-color:#3D3E3D; height:160px;" class="card">
                <div class="card1"><div class="card_number">35</div></div>
                <div class="card2"><div class="card_content"><img src="https://img.icons8.com/color/48/000000/user.png"/></div>
                <div class="card_content">Common Users</div>
                <a href="<?=ROOT?>admin/addNewUser"><button class="common_user_add"> Add a new User</button></a>
            </div>
        </div>
        </div> 
        <div class="content2">
        <form class="search_form">
                <div class=row>
                    <div><label for="name">Name of the User</label></div>
                    <div><input type="text" id="name" name="name" placeholder="Enter Name" > </div>
                </div>

                <div class=row>
                    <div><label for="category">Category</label></div>
                    <div><select id="category" name="category">
                        <option value ="Doctor">Doctor</option>
                        <option value ="Patient">Patient</option>
                        <option value ="Seller">Seller</option>
                        <option value selected="Common User">Common User</option>
                    </select></div>
                </div>
                <div>
                <input type="submit"  value="search">
                </div>
            </form>
        </div>  
        
        <div class="content3">
           

            <div class="heading">
                <div class="heading_1">Name of the user</div>
                <div class="heading_2">Categories</div>
                <div class="heading_3">Options</div>
            </div>
            <hr class="h1">
            <div class="line1">
                <div class="heading_1" >M.K.T.Perera</div>
                <div class="heading_2">Doctor</div>
                <div class="heading_3">
                    <button class="button1">View</button>
                    <button class="button1">Update</button>
                    <button class="button1">Delete</button>
                </div>
            </div>
            <div class="line1">
                <div class="heading_1" >M.K.T.Perera</div>
                <div class="heading_2">Doctor</div>
                <div class="heading_3">
                    <button class="button1">View</button>
                    <button class="button1">Update</button>
                    <button class="button1">Delete</button>
                </div>
            </div>
            <div class="line1">
                <div class="heading_1" >M.K.T.Perera</div>
                <div class="heading_2">Doctor</div>
                <div class="heading_3">
                    <button class="button1">View</button>
                    <button class="button1">Update</button>
                    <button class="button1">Delete</button>
                </div>
            </div>


        </div>

        <div id="feedbacks" class="tabcontent">
        <div id="channeling" class="tabcontent">
        <div id="products" class="tabcontent">
        <div id="payments" class="tabcontent">
        <div id="articles" class="tabcontent">
        <div id="forums" class="tabcontent">
        <div id="reports" class="tabcontent">


        
    
    
    
    </div>
        </div>


     <script>
    function openCard(evt, Name) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(Name).style.display = "block";
     evt.currentTarget.className += " active";
    }

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
    </body>
</html>


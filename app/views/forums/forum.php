<!DOCTYPE html>
<html>
    <head>
        <title>
            Forum   
        </title>
        <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/forumStyle.css">

        <?php $this -> view ("header")?>
    </head>

    <body id="body">
        
        <main>
            <div class="forum_content">

                <div class="tab">
                    <button class="tablinks" onclick="openCard(event, 'doctor')" id="defaultOpen">Talk about Doctors</button>
                    <button class="tablinks" onclick="openCard(event, 'herb')">Talk about Herbs</button>
                    <button class="tablinks" onclick="openCard(event, 'product')">Talk about Products</button>
                    </div>

<!------------------------------------------------------------------------------------------------------------->
                    <div id="doctor" class="tabcontent">
                        <div class=container>

                        <div  class="body_content">
                            <div> <a href="<?=ROOT?>forum/addForumDoctor"><button class="add">Start a new discussion<i class="fas fa-long-arrow-alt-right"></i></button></a></div><br>
                            <div> <button class="add A"> <i class="far fa-comment-alt"></i>All discussions</button></a></div>
                            <div> <button class="add A"><i class="fas fa-forward"></i> Newest discussions</button></a></div>
                            <div> <button class="add A"><i class="fas fa-certificate"></i> Verified discussions</button></a></div>
                            <div> <button class="add A"><i class="far fa-star"></i> Following</button></a></div>
                            <div> <button class="add A"><i class="far fa-comment-dots"></i> Feedbacks</button></a></div>


                        </div>

                        <div class="body_container_main_sub">
                                <?php if ($rows) : ?>
                                    <?php foreach ($rows as $row):?>
                                    <div class='body_container'>
                                        
                                        <div class='body_container1'>
                                            <div class="user">
                                                <div class="user_image"><img class="profile_pic" src="<?=ASSETS?>img/profile_picture1.jpg"/></div>
                                                <!--<img src="https://img.icons8.com/fluency/48/000000/edit-user-male.png"/>-->
                                                <div class="user_name">Name</div>
                                            </div>
                                        </div>
                                        <div class = 'body_container2'>
                                            <div class="line1">
                                                <h3> <?=esc($row->name)?> </h3>
                                                <div class="available"> 
                                                <a href="<?=ROOT?>channeling/doctors/2?"><button class="forum_button view">View Doctor</button> </a>
                                                </div>
                                            </div>
                                            
                                            <br>
                                            <div class="line2"><p style="text-align:left;"><?=esc($row->description)?></p> </div><br> 
                                            <?php if ($row->tpNumber) : ?>
                                            <div class="line3"><p style="text-align:left;">Contact Number:<?=esc($row->tpNumber)?></p></div>
                                            <?php endif; ?> 
                                            <?php if ($row->location) : ?>
                                            <div class="line3"><p style="text-align:left;">Location: <?=esc($row->location)?></p></div>
                                            <?php endif; ?> 
                                            <div class="forum_buttons">
                                            <a href="<?=ROOT?>forum/updateForumDoctor/<?=$row->forumDoctorid?>"><button class="forum_button update">Update</button></a>
                                            <a href="<?=ROOT?>forum/deleteForumDoctor/<?=$row->forumDoctorid?>"><button class="forum_button delete">Delete</button></a>
                                            <button class="forum_button">reply</button>
                                            </div>
                                        </div>

                                    </div>

                                    <?php endforeach;?>
                                <?php else : ?>
                                <h4>No Forums to show</h4>
                                <?php endif; ?> 

                        </div>

                       

                    </div>
                    </div>

<!------------------------------------------------------------------------------------------------------------->

                    <div id="herb" class="tabcontent">
                        <div class=container>

                            <div  class="body_content">
                                <div> <a href="<?=ROOT?>forum/addForumDoctor"><button class="add">Start a new discussion<i class="fas fa-long-arrow-alt-right"></i></button></a></div><br>
                                <div> <button class="add A"> <i class="far fa-comment-alt"></i>All discussions</button></a></div>
                                <div> <button class="add A"><i class="fas fa-forward"></i> Newest discussions</button></a></div>
                                <div> <button class="add A"><i class="fas fa-certificate"></i> Verified discussions</button></a></div>
                                <div> <button class="add A"><i class="far fa-star"></i> Following</button></a></div>
                                <div> <button class="add A"><i class="far fa-comment-dots"></i> Feedbacks</button></a></div>


                            </div>

                            <div class="body_container_main_sub">
                                        <div class='body_container'>
                                            
                                            <div class='body_container1'>
                                                <div class="user">
                                                    <div class="user_image"><img class="profile_pic" src="<?=ASSETS?>img/profile_picture1.jpg"/></div>
                                                    <!--<img src="https://img.icons8.com/fluency/48/000000/edit-user-male.png"/>-->
                                                    <div class="user_name">Peter</div>
                                                </div>
                                            </div>
                                            <div class = 'body_container2'>
                                                <div class="line1">
                                                    <h3> Ashwagandha </h3>
                                                    <div class="available"> 
                                                    <a href="<?=ROOT?>articles/articleDetails/2"><button class="forum_button view">View Article</button> </a>
                                                    </div>
                                                </div>
                                                
                                                <br>
                                                <div class="line2"><p style="text-align:left;">Ashwagandha is a very good herb for stress. you have to take it twice a day. i have those herbs in my garden. please contact me if you want it.</p> </div><br> 
                                                <div class="line3"><p style="text-align:left;">Contact Number: 0777986455 </p></div>
                                                <div class="image"><img class="forum_image" src="<?=ASSETS?>img/forum1.jpeg"/></div><br>

                                                <div class="line3"><p style="text-align:left; color:green;">Verified Content <br>Checked by:Dr.Thush Perera<br>General Physician</p></div>



                                                <div class="forum_buttons">
                                                <a href="<?=ROOT?>forum/updateForumDoctor/<?=$row->forumDoctorid?>"><button class="forum_button update">Update</button></a>
                                                <a href="<?=ROOT?>forum/deleteForumDoctor/<?=$row->forumDoctorid?>"><button class="forum_button delete">Delete</button></a>
                                                <button class="forum_button">reply</button>
                                                </div>
                                            </div>

                                        </div>


                            </div>



                        </div>
                        

                    </div>

<!------------------------------------------------------------------------------------------------------------->

                    <div id="product" class="tabcontent">
                    
                    <div class=container>

                            <div  class="body_content">
                                <div> <a href="<?=ROOT?>forum/addForumDoctor"><button class="add">Start a new discussion<i class="fas fa-long-arrow-alt-right"></i></button></a></div><br>
                                <div> <button class="add A"> <i class="far fa-comment-alt"></i>All discussions</button></a></div>
                                <div> <button class="add A"><i class="fas fa-forward"></i> Newest discussions</button></a></div>
                                <div> <button class="add A"><i class="fas fa-certificate"></i> Verified discussions</button></a></div>
                                <div> <button class="add A"><i class="far fa-star"></i> Following</button></a></div>
                                <div> <button class="add A"><i class="far fa-comment-dots"></i> Feedbacks</button></a></div>


                            </div>

                            <div class="body_container_main_sub">
                                        <div class='body_container'>
                                            
                                            <div class='body_container1'>
                                                <div class="user">
                                                    <div class="user_image"><img class="profile_pic" src="<?=ASSETS?>img/profile_picture1.jpg"/></div>
                                                    <!--<img src="https://img.icons8.com/fluency/48/000000/edit-user-male.png"/>-->
                                                    <div class="user_name">Peter</div>
                                                </div>
                                            </div>
                                            <div class = 'body_container2'>
                                                <div class="line1">
                                                    <h3> Ashwagandha Root Powder </h3>
                                                    <div class="available">
                                                    <a href="<?=ROOT?>seller/productDetails/1"><button class="forum_button view">View Product</button></a>  
                                                    </div>
                                                </div>
                                                
                                                <br>
                                                <div class="line2"><p style="text-align:left;">Spring Valley Ashwagandha Root Powder Vegetarian Capsules are dietary supplements that may promote general wellness. </p> </div><br> 
                                                <div style="width:250px;" class="image"><img class="forum_image" src="<?=ASSETS?>img/forum2.jpeg"/></div><br>




                                                <div class="forum_buttons">
                                                <a href="<?=ROOT?>forum/updateForumDoctor/<?=$row->forumDoctorid?>"><button class="forum_button update">Update</button></a>
                                                <a href="<?=ROOT?>forum/deleteForumDoctor/<?=$row->forumDoctorid?>"><button class="forum_button delete">Delete</button></a>
                                                <button class="forum_button">reply</button>
                                                </div>
                                            </div>

                                        </div>


                            </div>



                        </div>
                        

                </div>

               
            </div>
        </main>
        
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

        <!--footer-->
        <?php $this->view("footer") ?>
        <!--end of footer-->

    </body>
</html>

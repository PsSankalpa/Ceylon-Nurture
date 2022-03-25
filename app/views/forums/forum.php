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
                                <div> <a href="<?=ROOT?>forum/addForumHerb"><button class="add">Start a new discussion<i class="fas fa-long-arrow-alt-right"></i></button></a></div><br>
                                <div> <button class="add A"> <i class="far fa-comment-alt"></i>All discussions</button></a></div>
                                <div> <button class="add A"><i class="fas fa-forward"></i> Newest discussions</button></a></div>
                                <div> <button class="add A"><i class="fas fa-certificate"></i> Verified discussions</button></a></div>
                                <div> <button class="add A"><i class="far fa-star"></i> Following</button></a></div>
                                <div> <button class="add A"><i class="far fa-comment-dots"></i> Feedbacks</button></a></div>


                            </div>

                            <div class="body_container_main_sub">
                                <?php if ($rows1) : ?>
                                    <?php foreach ($rows1 as $row):?>
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
                                                <a href="<?=ROOT?>channeling/doctors/2?"><button class="forum_button view">View Article</button> </a>
                                                </div>
                                            </div>
                                            
                                            <br>
                                            <div class="line2"><p style="text-align:left;"><?=esc($row->description)?></p> </div>
                                            <div class="image"><img class="image_forum" src="<?= ASSETS2 . $row->image ?> "></div><br> 
                                            
                                            <div class="forum_buttons">

                                            <?php if ($rows3) : ?>
                                            <a href="<?=ROOT?>doctor/addArticles/<?=$rows3[0]->userid?>"><button class="forum_button update">Verify</button></a>
                                            <?php endif; ?> 

                                            <a href="<?=ROOT?>forum/updateForumHerb/<?=$row->forumHerbid?>"><button class="forum_button update">Update</button></a>
                                            <a href="<?=ROOT?>forum/deleteForumHerb/<?=$row->forumHerbid?>"><button class="forum_button delete">Delete</button></a>
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

                    <div id="product" class="tabcontent">
                    
                    <div class=container>

                            <div  class="body_content">
                                <div> <a href="<?=ROOT?>forum/addForumProduct"><button class="add">Start a new discussion<i class="fas fa-long-arrow-alt-right"></i></button></a></div><br>
                                <div> <button class="add A"> <i class="far fa-comment-alt"></i>All discussions</button></a></div>
                                <div> <button class="add A"><i class="fas fa-forward"></i> Newest discussions</button></a></div>
                                <div> <button class="add A"><i class="fas fa-certificate"></i> Verified discussions</button></a></div>
                                <div> <button class="add A"><i class="far fa-star"></i> Following</button></a></div>
                                <div> <button class="add A"><i class="far fa-comment-dots"></i> Feedbacks</button></a></div>


                            </div>

                            <div class="body_container_main_sub">
                                <?php if ($rows2) : ?>
                                    <?php foreach ($rows2 as $row):?>
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
                                                <a href="<?=ROOT?>channeling/doctors/2?"><button class="forum_button view">View Product</button> </a>
                                                </div>
                                            </div>
                                            
                                            <br>
                                            <div class="line2"><p style="text-align:left;"><?=esc($row->description)?></p> </div>
                                            <div class="image"><img class="image_forum" src="<?= ASSETS2 . $row->image ?> "></div><br> 
                                            <div class="forum_buttons">
                                            <a href="<?=ROOT?>forum/updateForumDoctor/<?=$row->forumProductid?>"><button class="forum_button update">Update</button></a>
                                            <a href="<?=ROOT?>forum/deleteForumDoctor/<?=$row->forumProductid?>"><button class="forum_button delete">Delete</button></a>
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

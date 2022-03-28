<!DOCTYPE html>
<html>
    <head>
        <title>
            Forum   
        </title>
        <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/forumStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/channelingStyle.css">


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
                            <div> <button class="add A"><i class="far fa-star"></i> Following</button></a></div>


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

                                            <?php 
                                            $forumdoctor = new forumdoctor();
                                            $forumid=$row->forumDoctorid;
                                            $useridforumrow=$forumdoctor->where('forumDoctorid',$forumid);
                                            $useridforum=$useridforumrow[0]->userid;
                                            $userid=Auth::userid();
                                            ?>
                                            <?php if ($userid == $useridforum) : ?>

                                            <a href="<?=ROOT?>forum/updateForumDoctor/<?=$row->forumDoctorid?>"><button class="forum_button update" >Update</button></a>
                                            <a href="<?=ROOT?>forum/deleteForumDoctor/<?=$row->forumDoctorid?>"><button class="forum_button delete">Delete</button></a>
                                            <?php endif;?>
                                            <button class="forum_button" id="reply_button">reply</button>

                                           
                                            </div>
                                             <!-- reply input -->
                                             <div class="reply_area " id="reply_area">

                                             <?php 

                                                    $forumDoctorid = $row->forumDoctorid;

                                                    $forumreplydoctor = new forumreplydoctor();
                                                    $data4=$forumreplydoctor->where("forumDoctorid",$forumDoctorid);

                                                    

                                              ?> 
                                              <br>
                                            <?php if ($data4) : ?>

                                              <?php foreach($data4 as $row):?>
                                                <?php
                                                    $userid = Auth::userid();
                                                    $useridforum = $row->userid;

                                                    ?>

                                                <?php if ($userid == $useridforum) : ?>
                                                <input style="background-color:white; float:right; width:80%; border:none" disabled type="text" value="<?=get_var('doctorid',$row->reply)?>">
                                                <?php else : ?>
                                                <input style="background-color:#90e7f8; float:left; width:80%; border:none" disabled type="text" value="<?=get_var('doctorid',$row->reply)?>">
                                                <?php endif;?>

                                            <?php endforeach;?>
                                            <?php endif;?>


                                             <form class="regi_form" enctype="multipart/form-data" method="POST">

                                                <div class="col-75">
                                                    <input type="text" style=" float:right; width:80%" value="<?=get_var('reply')?>" id="reply" name="reply" placeholder="Add your reply here ...">
                                                    <input hidden type="number" value="<?=get_var('doctorid',$row->forumDoctorid)?>" id="doctorid" name="doctorid">

                                                </div>
                                                <div class="row">
                                                <input type="submit" value="Submit">
                                                <input type="reset" value="Reset">
                                                </div>
                                            </form>
                                                <!-- <form method="POST">
                                                <textarea value="<?=get_var('reply')?>" name="reply" id="reply" placeholder="Add your reply here ..." ></textarea>
                                                <a href="<?=ROOT?>forum/forumReplyDoctor/<?=$row->forumDoctorid?>"><input type="submit" value="submit"> </a>
                                                <form>-->
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
                                            
                                            <?php if (($row->verification) == TRUE) : ?>
                                                <p style="color:green; text-align:left">Verified Content <br></p>
                                                <p style="color:green; text-align:left">Verified Doctor Name: <?=$row->verifiedDoctorName?></p><br>
                                                <a href="<?=ROOT?>channeling/doctors/<?=$row->verifiedDoctorid?>"><button class="forum_button update" style="width:100px" >View Doctor</button></a>

                                                <?php endif; ?> 


                                            <div class="forum_buttons">

                                            <?php if (($rows3) && (($row->verification) == FALSE)) : ?>
                                            <a href="<?=ROOT?>forum/verification/<?=$row->forumHerbid?>"><button class="forum_button update">Verify</button></a>
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
                                <div> <button class="add A"><i class="far fa-star"></i> Following</button></a></div>


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


            reply

            const targetDiv = document.getElementById("reply_area");
            const btn = document.getElementById("reply_button");

            btn.onclick = function () {
            if (targetDiv.style.display != "none") {
                targetDiv.style.display = "none";
            } else {
                targetDiv.style.display = "block";
            }
            };

            // function showReply(){
            //     //get the reply area using it's id
            //     var replyArea = document.getElementById("reply_area");
            //     //display reply area by using display property
            //     repylyArea.setAttribute("style", "display:block;");

            // }


        </script>

        <!--footer-->
        <?php $this->view("footer") ?>
        <!--end of footer-->

    </body>
</html>

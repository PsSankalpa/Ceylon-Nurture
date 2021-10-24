<!DOCTYPE html>
<html>
    <head>
        <title>
            Forum
        </title>
        <?php $this -> view ("header")?>
        <link rel="stylesheet" href="<?=ASSETS?>css/forum.css">

    </head>

    <body class="bg">
        
        
       

        <main>
            <div class="body_container_main">

                <div class="tab">
                    <button class="tablinks" onclick="openCard(event, 'doctor')" id="defaultOpen">Talk about Doctors</button>
                    <button class="tablinks" onclick="openCard(event, 'herb')">Talk about Herbs</button>
                    <button class="tablinks" onclick="openCard(event, 'product')">Talk about Products</button>
                    </div>

<!------------------------------------------------------------------------------------------------------------->
                    <div id="doctor" class="tabcontent">

                        <div  class="body_content">
                            <div><input type=search class="search" placeholder="Search"> </div>
                            <div> <a href="<?=ROOT?>forum/addForumDoctor"><button class="add">Add to forums</button></a></div>
                        </div>

                        <div class="body_container_main_sub">
                        
                        <?php if ($rows) : ?>
                            <?php foreach ($rows as $row):?>

                                <div class='body_content1'>

                                    <div class="line1">

                                        <h3> <?=esc($row->name)?> </h3>
                                        <div class="available"> Available 
                                            <label class="switch">
                                            <input disabled type="checkbox" checked>
                                            <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="line2"><?=esc($row->description)?> </div><br> 
                                    <div class="line3">Contact Number: <?=esc($row->tpNumber)?></div>
                                    <div class="line3">Location: <?=esc($row->location)?></div>

                                    <div class="forum_buttons">
                                    <a href="<?=ROOT?>forum/updateForumDoctor/<?=$row->forumDoctorid?>"><button class="forum_button update">Update</button></a>
                                    <a href="<?=ROOT?>forum/deleteForumDoctor/<?=$row->forumDoctorid?>"><button class="forum_button delete">Delete</button></a>
                                    <button class="forum_button">reply</button>
                                    </div>


                                </div>

                            <?php endforeach;?>

                        <?php else : ?>
                        <h4>No Forums to show</h4>
                        <?php endif; ?>

                        </div>


                    </div>

<!------------------------------------------------------------------------------------------------------------->

                    <div id="herb" class="tabcontent">
                   
                        <div class="body_content">
                            <div> Search </div>
                            <div> <a href="<?=ROOT?>forum/addForumHerb"><button>Add to forums</button></a></div>
                        </div>

                        <div class="body_container_main_sub">
                    
                            <div class='body_content1'>
                                <div class="line1">
                                    <h3 > Name </h3>
                                    <div> availability</div>
                                </div>

                                <div class="line2">description</div>
                                <div class="line3">image</div>
                                <button class="reply_button">reply</button>
                            </div>
                        
                        </div>

                    </div>

<!------------------------------------------------------------------------------------------------------------->

                    <div id="product" class="tabcontent">
                    
                        <div class="body_content">
                            <div> Search </div>
                            <div> <a href="<?=ROOT?>forum/addForumProduct"><button>Add to forums</button></a></div>
                        </div>

                        <div class="body_container_main_sub">
                    
                            <div class='body_content1'>
                                <div class="line1">
                                    <h3 > Name </h3>
                                    <div> availability</div>
                                </div>

                                <div class="line2">description</div>
                                <div class="line3">image</div>
                                <button class="reply_button">reply</button>
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

    </body>
</html>

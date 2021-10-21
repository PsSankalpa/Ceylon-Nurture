<!DOCTYPE html>
<html>
    <head>
        <title>
            Landing
        </title>
        <?php $this -> view ("header")?>
        <link rel="stylesheet" href="<?=ASSETS?>css/homeStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/forum.css">

    </head>

    <body>
        
        
        <div class="bg_image_container">
        <img class="bg_image" src="<?=ASSETS?>img/forum.jpg">
        </div>

        <main>
            <div class="body_container_main">

                <div class="tab">
                    <button class="tablinks" onclick="openCard(event, 'doctor')" id="defaultOpen">Talk about Doctors</button>
                    <button class="tablinks" onclick="openCard(event, 'herb')">Talk about Herbs</button>
                    <button class="tablinks" onclick="openCard(event, 'product')">Talk about Products</button>
                    </div>

<!------------------------------------------------------------------------------------------------------------->
                    <div id="doctor" class="tabcontent">

                        <div class="body_content">
                            <div> Search </div>
                            <div> <a href="<?=ROOT?>forum/addForumDoctor"><button>Add to forums</button></a></div>
                        </div>

                        <div class="body_container_main_sub">
                        
                        <?php if ($rows) : ?>
                            <?php foreach ($rows as $row):?>

                                <div class='body_content1'>

                                    <div class="line1">

                                        <h3 > <?=esc($row->name)?> </h3>
                                        <div> availability</div>
                                    </div>

                                    <div class="line2"><?=esc($row->description)?> <?=esc($row->tpNumber)?></div>
                                    <div class="line3"><?=esc($row->location)?></div>
                                    <a href="<?=ROOT?>forum/updateForumDoctor/<?=$row->forumDoctorid?>"><button class="reply_button">Update</button></a>
                                    <a href="<?=ROOT?>forum/deleteForumDoctor/<?=$row->forumDoctorid?>"><button class="reply_button">Delete</button></a>

                                    <button class="reply_button">reply</button>


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

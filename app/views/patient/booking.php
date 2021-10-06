<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>
            <?php $this -> view ("header")?>
            <link rel="stylesheet" href="<?=ASSETS?>css/booking.css">
        </title>

</head>
<body>
    <main>
        <div class="bg_image_container">
            <img class="bg_image" src="<?=ASSETS?>img/channeling.jpg">
        </div>

        <div class="channeling_search">
            <h1>Ayurveda Doctors</h1>
            <form class="search_form">
                <div class=row>
                    <div><label for="doctor_name">Name of the Doctor:</label></div>
                    <div><input type="text" id="doctor_name" name="doctor_name" placeholder="Enter Doctor's Name" > </div>
                </div>

                <div class=row>
                    <div><label for="specialized_category">Specialized Category</label></div>
                    <div><select id="specialized_category" name="specialized_category">
                        <option value ="b">b</option>
                        <option value selected="a">a</option>
                    </select></div>
                </div>
                <div class=row>
                    <div><label for="hospital">Hospital</label></div>
                    <div><select id="hospital" name="hospital">
                        <option value ="b">b</option>
                        <option value ="a">a</option >
                    </select></div>
                </div>
                <div class=row>
                    <div><label for="date">Date</label></div>
                    <div><input type="date" id="date" name="date" ></div>
                </div>

                <div>
                <input type="submit"  value="search">
                </div>
   
            </form>
        </div>
    </main>


</body>
</html>
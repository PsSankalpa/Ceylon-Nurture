<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>     Channeling </title>

            
            <?php $this -> view ("header")?>
            <link rel="stylesheet" href="<?=ASSETS?>css/channeling1.css">


</head>
<body class="regi">

        <div class="container center_channeling">
            <h1>Channel a Doctor</h1>

            <form class="regi_form" enctype="multipart/form-data" method="POST">

            <div class="row">
            <div class="col-25">
                <label for="name">Name of the Doctor</label>
            </div>

            <div class="col-75">
                <input type="text" value="<?=get_var('name')?>" id="name" name="name" placeholder="Name of the Doctor">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="speciality">Speciality</label>
            </div>

            <div class="col-75">
            <select name="speciality">
                <option>--Select Speciality--</option>
                        <option>Ayurvedha Panchakrama Prathikara</option>
                        <option>General Physician</option>
                </select>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="hospital">Hospital</label>
            </div>

            <div class="col-75">
            <select name="hospital">
                <option>--Select Hospital--</option>
                        <option>Arogya Hospital</option>
                        <option>Osu Sewana</option>
                </select>
            </div>
            </div>


            <div class="row">
            <div class="col-25">
                <label for="date">Date</label>
            </div>
            <div class="col-75">
            <input type="date" id="date" name="date" >
            </div>
            </div>
            <br>
            <div class="row">
            <a href="<?=ROOT?>booking"><input type="submit" value="Search"></a>
            <input type="reset" value="Reset">
            </div>
        </form>             
        </div>


</body>
</html>
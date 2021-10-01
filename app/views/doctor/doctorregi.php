<html>
<head>
<title>Doctor's Form</title>
<?php $this -> view ("header",$data)?>
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/doctorFormStyle.css">
</head>
<body>
    <div class="background">
    <hr>
    <h1>Update as a Doctor</h1>
    
        <div class="container">
            <form action="" method="post">
                <div class="row">
                    <div class="headings">
                    <label for="name">Name with Initials</label>
                   <!-- <select name="name" id="name" onchange="titleChange()">
                    <option value="Mr." selected>Dr.</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Miss.">Miss.</option>
                    </select>-->
                    </div>
                    <div class="data">
                        <input type="text" value="<?=get_var('nameWithInitials')?>" id="name" name="name" placeholder="Name with Initials">
                    </div>
                </div>
                <div class="row">
                    <div class="headings">
                    <label for="gender">Gender</label>
                    </div>
                    <div class="radio-toolbar">
                        <input type="radio" id="male" name="gender" value="Male">
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="Female">
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="Other">
                        <label for="other">Other</label>
                    </div>   
                </div>
                <div class="row">
                    <div class="headings">
                    <label for="DOB">Date of Birth</label>
                    </div>
                    <div class="data">
                        <input type="date" value="<?=get_var('dob')?>" id="dob" name="dob">
                    </div>
                </div>
                <div class="row">
                    <div class="headings">
                    <label for="regNo">Registration Number</label>
                    </div>
                    <div class="data">
                        <input type="text" value="<?=get_var('registrationNumber')?>" id="name" name="name" placeholder="Fill your Medical Registration Number">
                    </div>
                </div>
                <div class="row">
                    <div class="headings">
                    <label for="specialities">Specialities</label>
                    </div>
                    <div class="data">
                        <input type="text" value="<?=get_var('specialities')?>"  id="specialities" name="specialities" placeholder="Any Speciality">
                    </div>
                </div>
                <div class="row">
                    <div class="headings">
                    <label for="profilepic">Profile Photo</label>
                    </div>
                    <div class="data">
                        <input type="file" value="<?=get_var('profilePhoto')?>" id="profilepic" name="filename">
                    </div>
                </div>
                <div class="row">
                    <div class="headings">
                    <label for="qualifications"> Qualifications</label>
                    </div>
                    <div class="data">
                        <input type="file" value="<?=get_var('qualifications')?>"  id="profilepic" name="filename"> <!-- (Add your relevant medical certificates)-->
                    </div>
                </div>
                <div class="submitbtn">
                    <input style="float:right; margin-right:20px;" type="submit">
                </div>
            </form> 
        </div>
    </div>
</body>
</html>
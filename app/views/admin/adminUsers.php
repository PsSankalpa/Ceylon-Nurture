<!DOCTYPE html>
<html>

<head>
    <title>
        Users
    </title>
    <link rel="stylesheet" href="<?= ASSETS ?>css/commonStyle.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/adminStyle.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body id="body">
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="<?= ROOT ?>home/home">
                        <span class="icon"><img class="logo" src="<?= ASSETS ?>img/logo.png"></span>
                        <span class="title">
                            <h2> Ceylon Nurture </h2>
                        </span>
                    </a>

                </li>
                <a href="<?= ROOT ?>admin">
                    <li>
                        <a href="<?= ROOT ?>admin">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span class="title"> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>admin/users">
                            <span class="icon"><i class="fas fa-users"></i></span>
                            <span class="title">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>admin/feedbacks">
                            <span class="icon"><i class="far fa-comments"></i></span>
                            <span class="title">Feedbacks</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>admin/channeling">
                            <span class="icon"><i class="fas fa-hospital-user"></i></span>
                            <span class="title">Channeling</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>admin/products">
                            <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                            <span class="title">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>admin/payments">
                            <span class="icon"><i class="fas fa-file-invoice-dollar"></i></span>
                            <span class="title">Payments</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>header/viewArticles">
                            <span class="icon"><i class="far fa-newspaper"></i></span>
                            <span class="title">Articles</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>forum">
                            <span class="icon"><i class="far fa-comment-alt"></i></span>
                            <span class="title">Forums</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>admin/reports">
                            <span class="icon"><i class="far fa-chart-bar"></i></span>
                            <span class="title">Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>logout">
                            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                            <span class="title">Sign out</span>
                        </a>
                    </li>
            </ul>

        </div>


        <div class="main">
            <div class="topbar">

                <div class="toggle" onclick="toggleMenu();">
                    <i class="fas fa-bars"></i>
                </div>

                <div class="topbar_side">
                    <div class="notifications">
                        <div><i class="far fa-bell"></i> </div>
                        <div><i class="fas fa-sliders-h"></i></i></div>
                    </div>
                    <div class="profile">
                        <img class="profile_pic" src="<?= ASSETS ?>img/profile_picture1.jpg">
                        <?php if (Auth::logged_in_admin()) : ?>
                            <p> Hi <?= Auth::fname() ?></p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <div class="overview">

                <div class="toggle">
                    <h4>Users</h4>
                </div>

                <div class="topbar_side heading">
                    <i class="far fa-calendar-alt"> 2021/04/01 - 2021/06/30</i>
                </div>

            </div>

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?= $uCount['doctors'] ?></div>
                        <div class="cardName">
                            
                            <form action="" method="POST">
                                <input type="hidden" value="doctors" name="search">
                                <button type="submit" id="btns-p" class="u-btns">Doctors</button>
                            </form>
                            
                        </div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-user-md"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"> <?= $uCount['patients'] ?></div>
                        <!--need to add the patient count-->
                        <div class="cardName">

                            <form action="" method="POST">
                                <input type="hidden" value="patients" name="search">
                                <button type="submit" id="btns-p" class="u-btns">Patients</button>
                            </form>
                            
                        </div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-user-injured"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?= $uCount['sellers'] ?></div>
                        <div class="cardName">

                            <form action="" method="POST">
                                <input type="hidden" value="sellers" name="search">
                                <button type="submit" id="btns-p" class="u-btns">Sellers</button>
                            </form>
                            
                        </div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-user-tie"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?= $uCount['commonusers'] ?></div>
                        <div class="cardName">

                            <form action="" method="POST">
                                <input type="hidden" value="commonuser" name="search">
                                <button type="submit" id="btns-p" class="u-btns">Common Users</button>
                            </form>

                        </div>
                        <div class="cardName"><a href="<?= ROOT ?>admin/add?>"><button class="button_typeB">Add a User</button></a></div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-user"></i>
                    </div>
                </div>

            </div>

            <div class="detailsA">

                <div class="upcomingChanneling">
                    <div class="cardHeader">
                        <h3>All Users</h3>
                        <?php if ($rows) : ?>

                    </div><br>
                    <table>
                        <thead>
                            <tr>
                                <td>Name with Initials</td>
                                <td>Username</td>
                                <td>Email</td>
                                <td>Telephone</td>
                                <td>Gender</td>
                                <td>Options</td>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $row) : ?>

                                <tr>
                                    <td><?= $row->nameWithInitials ?></td>
                                    <td><?= $row->username ?></td>
                                    <td><?= $row->email ?></td>
                                    <td><?= $row->tpNumber ?></td>
                                    <td><?= $row->gender ?></td>
                                    <td>
                                        <div class="user_buttons">
                                            <div class="user_edit"><a href="<?= ROOT ?>admin/update/<?= $row->userid ?>"><i class="fas fa-user-edit"></i></a></div>
                                            <div class="user_delete"><a href="<?= ROOT ?>admin/delete/<?= $row->userid ?>"><i class="fas fa-user-minus"></i></a></div>
                                        </div>
                                    </td>

                                </tr>

                            <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <h4>No Users to show</h4>
            <?php endif; ?>



            </div>











        </div>

    </div>


    <script>
        function toggleMenu() {
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');


            toggle.classList.toggle('active');
            navigation.classList.toggle('active');
            main.classList.toggle('active');


        }
    </script>


</body>

</html>
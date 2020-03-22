<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANPRO-RS - HOME</title>

    <style>
        body {
            font-family: "Verdana", Geneva, sans-serif;
            background-color: #f2f2f2;
        }

        .box-content-menu {
            box-shadow: 11px 13px 24px -5px rgba(0, 0, 0, 0.2);
            min-height: 220px;
            padding: 1rem;
            position: relative;
            min-width: 350px;
            padding-top: 5rem;
            border-radius: 0px 0px 60px 60px;
            border: 2px dashed #555;
        }

        .title-app {
            color: #ffffff;
            background-color: #ffa217;
            padding: 1rem;
            border-radius: 8px 8px 0px 0px;
            margin-bottom: 3rem;
            width: calc(100% - 2rem);
            position: absolute;
            top: -3rem;
            left: 0;
            /* box-shadow: 11px 13px 24px -5px rgba(0, 0, 0, 0.2); */
        }

        .container-home-page {
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90vh;
        }

        .button {
            padding: 1rem;
            background-color: #1faafa;
            border-radius: 10px;
            color: #fff;
            width: 50%;
            font-weight: 400;
            text-decoration: unset;
            font-size: 18px;
            box-shadow: 11px 13px 24px -5px rgba(0, 0, 0, 0.2);
        }

        .menu-btn {
            display: flex;
            width: 100%;
        }

        .menu-btn:hover {
            transition: all 0.3s ease-out;
            transform: translateY(-35px);
        }

        .button:hover {
            background: linear-gradient(122deg, rgba(0, 98, 204, 1) 16%, rgba(76, 205, 230, 1) 55%);
            transition: all 0.3s ease-out;
        }

        .roles {
            margin-top: 5rem;
            border: 2px dashed #555;
            padding: 1rem;
            /* border-top: 0; */
            /* border-bottom: 0; */
            text-align: center;
            border-radius: 30px;
            display: inline-block;
            color: #ffa217;
        }
    </style>
</head>

<body>
    <div class="container-home-page">
        <div class="box-content-menu">
            <h3 class="title-app">. MANPRO-RS - HOME PAGE .</h3>
            <?php if ($this->session->userdata('role_id') == '4') { ?>
                You are login as User
            <?php } ?>
            <br>

            <div class="menu-btn">
                <a class="button" style="margin-right:1rem;" href="<?php echo base_url() ?>admin/login">ADMIN PAGE</a>

                <?php if ($this->session->userdata('role_id')) { ?>
                    <a class="button" style="margin-left:1rem;" href="<?php echo base_url() ?>logout">LOGOUT</a>
                <?php } else {  ?>
                    <a href="<?php echo base_url() ?>user/login">LOGIN</a>
                <?php } ?>
            </div>

            <div class="roles">
                <?php if ($this->session->userdata('role_id') == '1') { ?>
                    You are login as Admin ...
                <?php } ?>
            </div>



        </div>
    </div>
</body>

</html>
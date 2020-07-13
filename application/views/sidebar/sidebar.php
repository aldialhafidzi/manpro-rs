<aside class="main-sidebar sidebar-light-warning elevation-4">
    <a href="index3.html" class="brand-link">
        <!-- <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`,`menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                           ";
        $menu = $this->db->query($queryMenu)->result_array();
        ?> -->

        <img src="<?= base_url() ?>public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <h4 class="brand-text font-weight-light text-center text-light">MANPRO-APP</h4>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <!-- <a href="#" class="d-block"><?= $user['nama']; ?></a> -->
                <!-- <small class="text-light">Your login as <span style="text-transform: capitalize;"><?= $user['role_id']; ?> </span></small> -->
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <?php foreach ($menu as $m) : ?>
                    <li class="nav-header"><?= $m['menu']; ?></li>
                    <?php
                        $menuId = $m['id'];
                        $querySubMenu = " SELECT *
                                            FROM `user_sub_menu` 
                                           WHERE `menu_id` = $menuId
                                             AND `is_active` = 1
                                    ";
                        $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <?php if ($title == $sm['title']) : ?>
                            <li class="nav-link active">
                                <?php else : ?>
                                    <li class="nav-link">
                                <?php endif; ?>
                            <a href="<?= base_url($sm['url']); ?>" class="nav-link">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span>
                            </a>
                            </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>

                    <li class="nav-header"></li>

                    <li class="nav-item mb-5">

                        <a href="<?= base_url() ?>home/logout" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>

            </ul>
        </nav>
    </div>
</aside>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
</aside>
<footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="http://adminlte.io">MANPRO-RS</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0 Beta
    </div>
</footer>
</div>

<script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/public/dist/js/adminlte.js"></script>
<script src="<?= base_url() ?>public/plugins/chart.js/Chart.min.js"></script>
<script src="<?= base_url() ?>public/dist/js/demo.js"></script>
<script src="<?= base_url() ?>public/dist/js/pages/dashboard3.js"></script>
<?php $this->load->view('notifications/notif'); ?>
</body>

</html>
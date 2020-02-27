<h1>This is a Home Page !</h1>
<br>

<?php if ($this->session->userdata('role_id') == '4') { ?>
    You are login as User.
<?php } ?>
<br>
<br>
<a href="<?php echo base_url() ?>admin/login">Go To Admin Page</a> |

<?php if ($this->session->userdata('role_id')) { ?>
    <a href="<?php echo base_url() ?>logout">LOGOUT</a>
<?php } else{  ?>
    <a href="<?php echo base_url() ?>user/login">LOGIN</a>
<?php } ?>
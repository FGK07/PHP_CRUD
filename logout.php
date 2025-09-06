<?php
session_start();
session_destroy();
header("Location: dashboard_login_admin.php");
exit();

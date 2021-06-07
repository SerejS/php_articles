<?php
session_start();
unset($_SESSION['user_id']);
echo '<script>history.back()</script>';

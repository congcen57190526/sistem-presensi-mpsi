<?php
session_start();
session_destroy();
header("Location: http://localhost/sistem-presensi-mspi/");
exit();

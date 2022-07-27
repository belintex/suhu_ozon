<?php
    $konek = mysqli_connect('localhost', 'root', '', 'auth');

    $sql = mysqli_query($konek, "SELECT * FROM switchings");
    $data = mysqli_fetch_array($sql);
    $relay = $data['relay'];
    echo $relay;
?>
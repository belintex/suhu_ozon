<?php
    $konek = mysqli_connect('localhost', env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE'));

    $sql = mysqli_query($konek, "SELECT * FROM switchings");
    $data = mysqli_fetch_array($sql);
    $relay = $data['fan'];
    echo $relay;
?>
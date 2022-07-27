<?php

//include library utama
include_once 'coders.php';

// Buat Instance baru
$app = new TestData();

// Baca query dari alamat
$app->query_string = $_SERVER['QUERY_STRING'];

// Cek apakah ada query bernama mode?
if ($app->is_url_query('mode')) {

    // Bagi menjadi beberapa operasi
    switch ($app->get_url_query_value('mode')) {

        default:
            $app->read_data();
        
        case 'save':
            if ($app->is_url_query('suhu_object') && $app->is_url_query('suhu_lingkungan')) 
            {
                $temp = $app->get_url_query_value('suhu_object');
                $humid = $app->get_url_query_value('suhu_lingkungan');
                $app->create_data($temp, $humid);
            } else {
                $error = [
                    'suhu_object'=>'required',
                    'suhu_lingkungan'=> 'required',
                ];
                echo $app->error_handler($error);
            }
        break;

        case 'delete':
            if ($app->is_url_query('id'))
            {
                $id = $app->get_url_query_value('id');
                $app->delete_data($id);
            } else {
                $error = [
                    'id'=>'required',
                ];
                echo $app->error_handler($error);
            }
        break;

        case 'update':
            if ($app->is_url_query('id'))
            {
                $id = $app->get_url_query_value('id');
                
                if ($app->is_url_query('suhu_object'))
                {
                    $temp = $app->get_url_query_value('suhu_object');
                    $app->update_data($id, $temp);
                }

                if($app->is_url_query('suhu_lingkungan'))
                {
                    $humid = $app->get_url_query_value('suhu_lingkungan');
                    $app->update_data($id, $humid);
                }
            } else {
                $error = [
                    'id'=>'required',
                    'suhu_object'=>'OR required',
                    'suhu_lingkungan'=>'OR required',
                ];
                echo $app->error_handler($error);
            }
        break;

    }
} else {
    $app->read_data();
}

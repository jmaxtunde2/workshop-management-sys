<?php
/**
 * Created by Perfect Tech Lab.
 * Date: 2021/05/12
 * Time: 6:50 PM
 * File Name: helper.php
 */


 use Illuminate\Support\Facades\Auth;
 use Carbon\Carbon;
 use Illuminate\Support\Facades\Session;
 use Illuminate\Support\Str;
 use App\User;




function getLevel($level) {
    $type = "";
    switch ($level) {
        case 1:
            $type = "user";
            break;       
        case 4:
            $type = "admin";
            break;

    }
    return $type;
}



?>

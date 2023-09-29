<?php

// ==========================================================
//  Copyright Reserved Wael Wael Abo Hamza (Course Ecommerce)
// ==========================================================

define("MB", 1048576);

function filterRequest($requestname)
{
    return  htmlspecialchars(strip_tags($_POST[$requestname]));
}

function getData($table, $where = null, $values = null)
{
    global $con;
    $data = array();
    $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

function getAllData($table, $where = null, $values = null, $json = true, $message = 'none', $customQuery = false, $print = true)
{
    global $con;
    $data = array();
    if ($customQuery == true) {
        $stmt = $con->prepare($table);
    } else if ($where == null) {
        $stmt = $con->prepare("SELECT  * FROM $table");
    } else {
        $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
    }
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if ($json == true) {
        if ($print == true) {
            if ($count > 0) {
                printSuccess('none', $data);
            } else {
                printFailure();
            }
        }
        return $count;
    } else {

        return $data;
    }
}






function insertData($table, $data, $json = true)
{
    global $con;
    foreach ($data as $field => $v)
        $ins[] = ':' . $field;
    $ins = implode(',', $ins);
    $fields = implode(',', array_keys($data));
    $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

    $stmt = $con->prepare($sql);
    foreach ($data as $f => $v) {
        $stmt->bindValue(':' . $f, $v);
    }
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
        printSuccess('Added Successfully');
    } else {
        return $count;
    }
}


function updateData($table, $data, $where, $json = true)
{
    global $con;
    $cols = array();
    $vals = array();

    foreach ($data as $key => $val) {
        $vals[] = "$val";
        $cols[] = "`$key` =  ? ";
    }
    $sql = "UPDATE $table SET " . implode(', ', $cols) . "WHERE $where";

    $stmt = $con->prepare($sql);
    $stmt->execute($vals);

    $count = $stmt->rowCount();
    if ($json == true) {
        if ($count > 0) {
            printSuccess();
        } else {
            printFailure();
        }
    }
    return $count;
}

function deleteData($table, $where, $json = true)
{
    global $con;
    $stmt = $con->prepare("DELETE FROM $table WHERE $where");
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
        
            echo json_encode(array("status" => "success"));
        
    }
    return $count;
}

function imageUpload($dir, $imageRequest)
{
    if (isset($_FILES[$imageRequest])) {
        global $msgError;
        $imagename  = rand(1000, 10000) . $_FILES[$imageRequest]['name'];
        $imagetmp   = $_FILES[$imageRequest]['tmp_name'];
        $imagesize  = $_FILES[$imageRequest]['size'];
        $allowExt   = array("jpg", "png", "gif", "mp3", "pdf");
        $strToArray = explode(".", $imagename);
        $ext        = end($strToArray);
        $ext        = strtolower($ext);

        if (!empty($imagename) && !in_array($ext, $allowExt)) {
            $msgError = "EXT";
        }
        if ($imagesize > 2 * MB) {
            $msgError = "size";
        }
        if (empty($msgError)) {
            move_uploaded_file($imagetmp,  $dir . $imagename);
            return $imagename;
        } else {
            return "fail";
        }
    }else
    {
       return 'empty';
    }
}



function deleteFile($dir, $imagename)
{
    if (file_exists($dir . "/" . $imagename)) {
        unlink($dir . "/" . $imagename);
    }
}

function checkAuthenticate()
{
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
        if ($_SERVER['PHP_AUTH_USER'] != "wael" ||  $_SERVER['PHP_AUTH_PW'] != "wael12345") {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }

    // End 
}


function   printFailure($message = "none")
{
    echo json_encode(array("status" => "failure", "message" => $message));
}
function   printSuccess($message = "none", $data = null)
{
    echo  json_encode(array("status" => "success", "message" => $message, 'data' => $data));
}

function valid($count, $successMessage, $failereMessage, $data)
{
    if ($count > 0) {
        printSuccess($successMessage, $data);
    } else {
        printFailure($failereMessage);
    }
}


function sendGCM($title, $message, $topic, $pageid, $pagename)
{


    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array(
        "to" => '/topics/' . $topic,
        'priority' => 'high',
        'content_available' => true,

        'notification' => array(
            "body" =>  $message,
            "title" =>  $title,
            "click_action" => "FLUTTER_NOTIFICATION_CLICK",
            "sound" => "default"

        ),
        'data' => array(
            "pageid" => $pageid,
            "pagename" => $pagename
        )

    );


    $fields = json_encode($fields);
    $headers = array(
        'Authorization: key=' . "AAAAtUVT23I:APA91bGzpr5u2r_65vwjAwQJQGHu3Ktw9-aMoHvzEkS9x5iMBPQPl0AormGjP0T4g7TFMSk4kq2WUJDNVsf56PxzO0diuKdCD55Q_aRWpn62Mgf8FOa0pvz-dlsyDw0fDH05OXTkrGNi",
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

    $result = curl_exec($ch);
    return $result;
    curl_close($ch);
}

function sendandInsertNotifications($userid, $title_en, $body_en,$title_ar, $body_ar, $image, $topic, $pageid)
{
    global $con;
    $stmt =  $con->prepare("INSERT INTO `notifications`( `notifications_userid`, `notifications_title_en`,`notifications_title_ar`, `notifications_body_en`, `notifications_body_ar`,`notifications_image`) VALUES (?,?,?,?,?,?)");
    $stmt->execute(array($userid, $title_en,$title_ar, $body_en,$body_ar, $image));
    $count = $stmt->rowCount();
    sendGCM($title_en, $body_en, $topic, $pageid, 'en');

    return $count;
}

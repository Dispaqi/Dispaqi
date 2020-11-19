function getIP(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
/* Getting the IP. */
$ip = getIP();

/* Declare file name */
$filename = "yourfilename.txt";

/* Open/Create said file */
$ipfile = fopen($filename, "a+") or die("Unable to open file!");

/* Read the said file */
$ipget = fread($ipfile, filesize($filename));

/* Check to see if the IP is already on the list */
if(!strstr($ipget, $ip)){
    /* adds it (not on list) */
    fwrite($ipfile, $ip);
}else{
    /* Doesn't add it (already on the list) */
    echo 'IP Already On File.';
}

/* Close said file */
fclose($ipfile);

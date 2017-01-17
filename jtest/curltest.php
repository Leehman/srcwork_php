
<?php
/*
    $curl = curl_init();
    $fp = fopen("/xampp/htdocs/html/tstweb/jobtests/retfile.txt", "w");
    curl_setopt ($curl, CURLOPT_URL, "http://www.php.net");
    curl_setopt($curl, CURLOPT_FILE, $fp);

    curl_exec ($curl);
    curl_close ($curl);
	*/
?>

<?php
	/*
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"ftp://ftp.gnu.org");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec ($curl);
    curl_close ($curl);
    print $result;
	*/
?>

<?php
	/*
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"ftp://ftp.gnu.org");
    curl_setopt($curl, CURLOPT_FTPLISTONLY, 1);
    curl_setopt($curl, CURLOPT_USERPWD, "anonymous:your@email.com");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec ($curl);
    curl_close ($curl);
    print $result;
	*/
?>

<?php
	/*
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"ftp://ftp.gnu.org");
    curl_setopt($curl, CURLOPT_FTPLISTONLY, 1);
    curl_setopt($curl, CURLOPT_USERPWD, "foo:barbaz");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec ($curl);
    echo curl_error($curl);
    curl_close ($curl);
    print $result;
	*/
?>

<?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"http://localhost/html/tstweb/jobtests/posttest.php");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "Hello=World&Foo=Bar&Baz=Wombat");

    curl_exec ($curl);
    curl_close ($curl);
?>
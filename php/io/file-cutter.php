<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tmp = 'tmp/';
        $targetFile = $tmp . basename($_FILES['upFile']['name']);
        $uploadOk = 1;

        if (move_uploaded_file($_FILES['upFile']['tmp_name'], $targetFile)) {
            $handle = fopen($targetFile, 'r');
            $row = 1;
            $tmpF = "";

            if ($handle) {
                if (!empty($_POST['finish_row'])) {
                    while (($line = fgets($handle)) !== false) {
                        if ($row == $_POST['finish_row']) {
                            break;
                        }

                        if ($row >= $_POST['start_row']) {
                            $tmpF .= $line;
                        }
                        ++$row;
                    }
                } else {
                    while (($line = fgets($handle)) !== false) {
                        if ($row >= $_POST['start_row']) {
                            $tmpF .= $line;
                        }
                        ++$row;
                    }
                }

                fclose($handle);
                header("Content-Type: text/plain");
                header("Content-Disposition: attachment; filename=result.txt");
                // Disable caching
                header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
                header("Pragma: no-cache"); // HTTP 1.0
                header("Expires: 0"); // Proxies
                echo $tmpF;
            } else {
                header('Location: http://localhost/file-cutter.php/?error=Can%20not%20read%20file');
            }
        } else {
            header('Location: http://localhost/file-cutter.php/?error=Can%20not%20upload%20file');
        }
    } else {
        if (isset($_GET['error'])) {
            $err = "<label>".$_GET['error']."</label><br>";
        } else {
            $err = "";
        }
        echo "
<!DOCTYPE html>
<html>
<head>
    <title>Selection File Row</title>
</head>
<body>
    $err
    <form action='file-cutter.php' method='POST' accept-charset='utf-8' enctype='multipart/form-data'>
        <input type='file' name='upFile'>
        <input type='number' name='start_row'>
        <input type='number' name='finish_row' placeholder='empty for end of file' value=''>
        <input type='submit' name='OK'>
    </form>
</body>
</html>
";
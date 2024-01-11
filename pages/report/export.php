<?php
include "connection.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['export'])) {
    // If export button is clicked, handle export logic

    $selectedData = isset($_POST['Data']) ? mysqli_real_escape_string($conn, $_POST['Data']) : '';
    $header = "$selectedData\n";
    $result = '';

    switch ($selectedData) {
        case 'Income':
            $sql = "SELECT count(*) as NumberofResident, round(monthlyincome,-1) as Income FROM tblresident group by monthlyincome";
            break;
        case 'Education':
            $sql = "SELECT count(*) as NumberofResident, HighestEducationalAttainment FROM tblresident group by highesteducationalattainment";
            break;
        case 'zone':
            $sql = "SELECT count(*) as NumberofResident, Zone FROM tblresident r group by r.zone";
            break;
        case 'Age':
            $sql = "SELECT COUNT(*) as NumberofResident, Age FROM tblresident GROUP BY age";
            break;
        case 'All':
            $sql = "SELECT * FROM tblresident";
            break;
        default:
            // Handle the case when no option is selected
            break;
    }

    $exportData = mysqli_query($conn, $sql) or die("Sql error : " . mysqli_error($conn));

    $fields = mysqli_num_fields($exportData);

    for ($i = 0; $i < $fields; $i++) {
        $header .= mysqli_fetch_field_direct($exportData, $i)->name . "\t";
    }

    while ($row = mysqli_fetch_row($exportData)) {
        $line = '';
        foreach ($row as $value) {
            if ((!isset($value)) || ($value == "")) {
                $value = "\t";
            } else {
                $value = str_replace('"', '""', $value);
                $value = '"' . $value . '"' . "\t";
            }
            $line .= $value;
        }
        $result .= trim($line) . "\n";
    }

    $result = str_replace("\r", "", $result);

    if ($result == "") {
        $result = "\nNo Record(s) Found!\n";
    }

    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=export.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print "$header\n$result\n\n";
}
?>

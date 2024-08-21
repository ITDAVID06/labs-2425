<?php

$csv_file = '../lab2a/registrations.csv';


$file_handle = fopen($csv_file, 'r');

if ($file_handle !== false) {

    $headers = fgetcsv($file_handle);

    $rows = [];
    while (($row = fgetcsv($file_handle)) !== false) {
        $rows[] = $row;
    }

    fclose($file_handle);
} else {
    die('Failed to open the CSV file.');
}

?>
<html>
<head>
    <meta charset="utf-8">
    <title>CSV Data Display</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .p-section--hero {
            padding: 20px;
        }
        .row--50-50-on-large {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .col {
            flex: 1 1 100%;
            max-width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border: 1px solid #dddddd;
            word-wrap: break-word;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<section class="p-section--hero">
    <div class="row--50-50-on-large">
        <div class="col">
            <div class="p-section--shallow">
                <h1>Registered Users</h1>
            </div>
            <div class="p-section--shallow">
                <table aria-label="Registered Users Data">
                    <thead>
                        <tr>
                            <th>Complete Name</th>
                            <th>Birthday</th>
                            <th>Age</th>
                            <th>Contact Number</th>
                            <th>Sex</th>
                            <th>Program</th>
                            <th>Complete Address</th>
                            <th>Email Address</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <?php foreach ($row as $key => $value): ?>
                                <td><?php echo htmlspecialchars($value); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

</body>
</html>

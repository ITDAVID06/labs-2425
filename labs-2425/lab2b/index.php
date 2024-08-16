<?php

define('CUSTOMERS_FILE_PATH', 'customers-100000.csv');

// Start time measurement using microtime
$time_start = microtime(true);

usleep(mt_rand(100, 10000));


function get_hundred_customers_data()
{
    $opened_file_handler = fopen(CUSTOMERS_FILE_PATH, 'r');

    $data = [];
    $headers = [];
    $row_count = 0;
    while (!feof($opened_file_handler)) {

        $row = fgetcsv($opened_file_handler, 1024);
        if (!empty($row)) {
            if ($row_count == 0) {
                array_push($headers, $row);    
            } else {
                array_push($data, $row);
            }
        }

        $row_count++;

    }

    return [
        'headers' => $headers,
        'data' => $data
    ];
}

$customers = get_hundred_customers_data();

// End time measurement
$time_end = microtime(true);
$elapsed_time = $time_end - $time_start;

// Format the server end time
$end_time_formatted = date('Y-m-d H:i:s') . sprintf('.%06d', ($time_end - (int)$time_end) * 1000000);

?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>
<body>

<h1>
    Customers
</h1>
<h4>
<?php foreach(range('A', 'Z') as $letter): ?>
    <a href="filtered.php?letter=<?php echo $letter; ?>"><?php echo $letter; ?></a>
<?php endforeach; ?>
</h4>
<small>
The dataset is retrieved from this URL <a href="https://www.datablist.com/learn/csv/download-sample-csv-files">https://www.datablist.com/learn/csv/download-sample-csv-files</a>
</small>
<p>
    <strong>Time Elapsed:</strong> <?php echo number_format($elapsed_time, 6); ?> seconds
</p>
<p>
    <strong>Script Finished At:</strong> <?php echo htmlspecialchars($end_time_formatted); ?>
</p>
<table aria-label="Customers Dataset">
    <thead>
        <tr>
            <th>Customer ID</th>
            <th>Complete Name</th>
            <th>Company</th>
            <th>Address</th>
            <th>Email Address</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($customers['data'] as $record):
    ?>
        <tr>
            <td><?php echo htmlspecialchars($record[1]); ?></td>
            <td><?php echo "<strong>" . htmlspecialchars($record[3]) . "</strong>, " . htmlspecialchars($record[2]); ?></td>
            <td><?php echo htmlspecialchars($record[4]); ?></td>
            <td><?php echo htmlspecialchars($record[7]); ?></td>
            <td><?php echo htmlspecialchars($record[9]); ?></td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>

</body>
</html>

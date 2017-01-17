<?php
	/*
    $employees = simplexml_load_file('employees.xml');
    var_dump($employees);
	*/
?>
<?php
    //$employees = simplexml_load_file('employees.xml');

    //foreach ($employees->employee as $employee) {
     //   print "{$employee->name} is {$employee->title} at age {$employee->age}\n"."<br>";
    //}
?>
<?php
    $xml = simplexml_load_file('employees.xml');

    echo "<strong>Matching employees with name 'Laura Pollard'</strong><br />";
    $employees = $xml->xpath('/employees/employee[name="Laura Pollard"]');

    foreach($employees as $employee) {
        echo "Found {$employee->name}<br />";
    }

    echo "<br />";

    echo "<strong>Matching employees younger than 54</strong><br />";
    $employees = $xml->xpath('/employees/employee[age<54]');

    foreach($employees as $employee) {
        echo "Found {$employee->name}<br />";
    }

    echo "<br />";

    echo "<strong>Matching employees as old or older than 48</strong><br />";
    $employees = $xml->xpath('//employee[age>=48]');

    foreach($employees as $employee) {
        echo "Found {$employee->name}<br />";
    }

    echo "<br />";

?>
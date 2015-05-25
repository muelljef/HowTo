<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>How to use the NREL PVWatts (Version 5) - Variables Page 1</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
    <div id="heading1">
        <h1>How to use the NREL PVWatts (Version 5) - Variables Page 1</h1>
        <p>by Jeff Mueller</p>
    </div>
    <div id="content">
        <h3>System Size (required)</h3>
        <p> The system capacity or nameplacte capacity is the maximum output the system is rated for. Of course the system will
            not run at full capacity all the time because the sun does not always 'saturate' the cells (ie a cloudy day or night time) or other
            losses within the system reduce the output. This is the figure that is generally quoted as installed capacity for either
            a home or commercial application. Actual production will be calculated using this and a few other factors.
        </p>
        <h3>Module Type</h3>
        <p>
            The module type can be specified as Standard, Premium, or thin film type solar arrays as 0, 1 or 2 respectively.
            The standard will be the most common and what we will use in our first example. Premium solar arrays tend to be more
            efficient, but more costly and thin film solar arrays tend to be cheaper, but less efficient.
        </p>
        <p>The following table are assumptions for difference module types from the PVWatts 5 Manual.
        <img src="pvwattsEfficiencyTable.png">
        </p>
        <p>
            I have setup curl calls same as our original example only changing the module_type values to 0 (standard),
            1 (premium) and 2 (thin film) to compare how the different types of solar arrays compare.
        </p>
            <?php include 'moduleExample.php'?>
        <p>
            There are actually some unexpected results here. The thin film PV produces the greatest amount of output even
            though it generally is considered a lower efficiency panel. Either there is something going on here I cannot explain
            or there could be an error in the API documentation. The results would make more sense if more sense if
            0=thin film, 1=standard, and 2=premium.
        </p>
        <p>
            (At the time of writing this the results have the standard=4768, the premium=4827, and the thin film=4877.) If
            thin film < standard < premium than the API has been changed.
        </p>
        <h3>Losses</h3>
        <p>
            The system losses are entered as a percent and account for things like soil, shading, wiring, and other aspects.
            The PVWatts 5 manual suggests a 14% value as a default value for losses so that was the reason I selected 14% for
            our examples. For more on losses see the PVWatts Manual
        </p>
        <a href="http://www.nrel.gov/docs/fy14osti/62641.pdf">Dobos, A. P. PVWatts Version 5 Manual. NREL/TP-6A20-62641, 2014.</a>
        <h3>Array Type</h3>
        <p>
            There are 5 array type options available for analysis through the PVWatts api. Fixed - Open Rack, Fixed - Roof Mounted,
            1-Axis, 1-Axis Backtracking, and 2-Axis.
        </p>
        <p>
            Let's break it down a little. There are 3 basic mountings fixed, 1-axis, or 2 axis. The fixed mounting is just what it
            sounds like the array is mounted in a fixed position and does not move. The 1-axis array will pivot on 1 axis following
            the sun throughout the day in order to achieve higher energy production. The 2 axis system also pivots on a 2nd axis
            and that axis follows the sun throughout the year to provide higher energy production.
        </p>
        <p>
            Within the fixed axis option PVWatts provides the Open Rack and Roof Mounted options. These options affect assumptions made
            about operation temperatures because a open rack mounted system is assumed to have plenty of airflow underneath it allowing
            the modules better cooling which leads to efficiencies.[1]
        </p>
        <p>
            The diffence between the 1-Axis options is '1-Axis' means the PV array will follow the sun and point directly at the sun
            and the '1-Axis Backtracking' will still follow the sun but will consider other arrays positioned nearby. To sum it up you
            would consider backtracking if you had more than one 1-Axis arrays closely positioned.[2]
        </p>
        <p>
            I have setup curl calls the same as our original example only changing the array_type values to 0(fixed - open rack),
            1(fixed - roof mounted),  2(1-Axis) and 4(2-axis) to compare how the different types of solar array mountings.
            As we are only looking at a small array I decided to leave backtracking out as that is more for a multi-panel
            array configuration.
        </p>
        <?php include 'arrayExample.php' ?>
        <p>
            Here the results make a little more sense compared to what the documentation suggests. You can see that 2 axis
            arrays will produce the greatest amount of energy, then 1 axis, then fixed axis, and within the fixed axis arrays
            the open rack array will produce more energy than the roof mounted array because the open rack array gets better
            cooling and as a result operational efficiency.
        </p>
        <p>System Advisor Model Version 2015.1.30 (SAM 2014.1.30) User Documentation. Sizing the Flat Plate PV System. National Renewable Energy Laboratory. Golden, CO.</p>
        <a href="https://sam.nrel.gov/node/69341">[1]Link to explanation of Open Rack vs Roof Mounted</a>
        <a href="https://www.nrel.gov/analysis/sam/help/html-php/index.html?libraries.htm">[2]System Advisor Model - Photovoltaic Systems</a><br>
    </div>
    <div id="prevNext">
        <div id="prev"><a href="example.php">PREV</a></div>
        <div id="next"><a href="variablesTwo.php">NEXT</a></div>
    </div>
    <div id="parts">
        <?php include 'links.php' ?>
</div>
</body>
</html>
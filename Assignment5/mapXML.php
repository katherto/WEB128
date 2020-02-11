<?php
    //Markers for GeoLocations with descriptions
    //Name, Address, Lat, Lng
    $markers = array(
        array('Small Cakes', "14150 W 119th St, Olathe, KS 66062", 38.912850, -94.750160),
        array('Wahlburgers', "11935 S Blackbob Rd, Olathe, KS 66062", 38.911870, -94.760340),
        array('AMC DINE-IN Studio 28', "12075 S Strang Line Rd, Olathe, KS 66062", 38.907370, -94.767090),
        array('Arapaho Park', "Arapaho Park Olathe, KS 66062", 38.884580, -94.768830)
    );

    header("Content-type: text/xml");
    // Start XML file, echo parent node
    echo "<?xml version='1.0' ?>";
    echo '<markers>';

    // Iterate through the rows of the $markers array, printing XML nodes for each
    // HINT: Use a foreach loop to grab each element of the $markers array which will return an array.
    // remember $markers is a two dimensional array
    // create a counter to keep track of the current "id" to be part of the marker tag
    $markerId = 1;
    $arr = $markers;
    
    foreach ($arr as $k => $v) {  //Update this foreach statement to work properly with your variables
        // each iteration through the loop create an echo statement that has content like the following
        // <marker id="1" name="JCCC" address="12345 College Blvd, Overland Park, KS 662210" lat="38.922180" lng="-94.732550" />
        echo "<marker id=\"$markerId\" name=\"$v[0]\" address=\"$v[1]\" lat=\"$v[2]\" lng=\"$v[3]\" />";
        $markerId++;
    }

    // End XML file
    echo '</markers>';
    // Once this file is updated you can open it directly and verify the output of the XML script is working 
?>
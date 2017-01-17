<?php
    $parser = xml_parser_create();

    function startElement($parser, $el_name, $attributes) {
        $line = xml_get_current_line_number($parser);
        $attribute_type = $attributes['TYPE'];
    
        switch ($attribute_type) {
            case "programming":
                print "Programming headline found on line $line<br />";
                break;
            case "sci-tech":
                print "Sci/tech headline found on line $line<br />";
                break;
        }
    }

    function endElement($parser, $el_name) {
        print "Closed element $el_name.<br />";
    }

    xml_set_element_handler($parser, "startElement", "endElement");

    function charData($parser, $chardata) {
        $line = xml_get_current_line_number($parser);
        $chardata = trim($chardata);
        if ($chardata == "") return;

        print "Character data found on line $line. The data was $chardata<br />";
    }

    xml_set_character_data_handler($parser, "charData");

    $file = '/xampp/htdocs/html/tstweb/jobtests/newsp.xml';

    if (!file_exists($file)) {
        print "Error loading XML file - please check the file exists and that you have access to it.";
        exit;
    } else {
        print "XML file loaded successfully!<br /><br />";
    }

    $data = file_get_contents($file);

    if (!xml_parse($parser, $data, true)) {
        print "<H1>Unrecoverable XML error encountered! </H1>";
        printf("<P> The error report was %s at line %d</P>", xml_error_string(xml_get_error_code($parser)),
        xml_get_current_line_number($parser));
    } else {
        print "<br /><br />Parsing complete.";
    }

    xml_parser_free($parser);
?>
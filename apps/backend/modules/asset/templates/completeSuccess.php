<?php
 
// we're rewriting the view for the taggable plugin to output JSON instead of HTML
// see http://wiki.jqueryui.com/Autocomplete
 
$tags_simple = array();
foreach ( $tagSuggestions as $suggestion ) {
  $tags_simple[] =  $suggestion['suggested' ];
}
 
echo json_encode($tags_simple);
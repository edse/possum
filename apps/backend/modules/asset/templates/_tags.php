<?php use_helper('JavascriptBase' , 'Tags' )  ?>
<?php  
 
// much of this I copied and adapted from a cached admin generator template.
$name = 'new_tags' ; $label = '' ; $help = '' ; 
$class = 'sf_admin_form_row sf_admin_text sf_admin_form_field_tags' ;
 
 ?>
 
  <div class="<?php echo $class ?><?php $form[$name]->hasError() and print ' errors'  ?>">
    <?php echo $form[$name]->renderError() ?>
    <div>
      <?php echo $form[$name]->renderLabel($label) ?>
 
      <div class="content"><?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
 
 
<?php // tag cloud will go here, see below ?>
 
 
</div>
 
      <?php if ($help): ?>
        <div class="help"><?php echo __($help, array(), 'messages' ) ?></div>
      <?php elseif ($help = $form[$name]->renderHelp()): ?>
        <div class="help"><?php echo $help ?></div>
      <?php endif; ?>
    </div>
  </div>
 
<?php // list of current tags, with remove buttons ?>
<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_tags">
<div style="margin-bottom: 15px;">
<label>Current tags</label>
<div class="content">
<div class="taglist"><span><nobr>&nbsp;</nobr></span>
   <?php foreach ( $form->getObject()->getTags() as $t):   ?>
    <span><nobr><?php 
 
echo link_to_function("Remove '$t'", 
           "remove_tag(".json_encode($t).", this)", 
           "class=removetag")
 
  ?>&nbsp;<?php echo $t  ?></nobr></span>
    <?php endforeach;  ?>
</div>
<span id="remove_tag_help" style="display:none;">Tag(s) removed. Remember to save the asset.</span>
</div>
</div>
 
 
 
 
 
 <?php echo link_to_function("Choose from the most used tags &gt;&gt;", '$("#add_tag_from_cloud").show(); $(this).hide()') ?>
 
<div id="add_tag_from_cloud" class="tag_cloud popular" style="display:none">
<h3>Popular tags</h3>
<?php 
// gets the popular tags
$tags = PluginTagTable::getPopulars();
 
// Display the tags cloud, using link_to_function() instead of link_to()
// The %s in the second arg will be substituted with the tag text.
echo tag_cloud($tags, 'add_tag("%s")' , array(
				'link_function'    =>  'link_to_function' ,  
				'link_options'    =>  array('class=addtag' )
					     )
	       );
 
  ?>
</div>
 
 
 
 
 
</div>






<script>
$(function() {
            // add fancy jQuery UI button styles.  See additional in "CSS" below
	    $(".taglist a").button({icons:{primary:'ui-icon-trash'}, text: false});
});
 
function remove_tag (tag, element) {
  remove_field = $("#asset_remove_tags");
  if ( remove_field.val().length ) {
    remove_field.val( remove_field.val()  + "," + tag );
  }
  else {
    remove_field.val( tag );
  }
  $(element).parent().parent().hide();
  $("#remove_tag_help").show();
  setTimeout('$("#remove_tag_help").fadeOut()',900);
}

function add_tag (tag) {
  add_field = $("#new_tags");
 
  if ( add_field.val() == "Add tags with commas" ) {
    add_field.val( tag );
    add_field.css("color", "black");
  }
  else if ( add_field.val().length ) {
    add_field.val( add_field.val()  + ", " + tag );
  }
  else {
    add_field.val( tag );
  }
  $(element).hide();
}

	$(function() {
 
// for debug info, uncomment these lines and add a <div id="autocomplete_log">
// 		function log(message) {
// 			$("<div/>").text(message).prependTo("#autocomplete_log");
// 			$("#autocomplete_log").attr("scrollTop", 0);
// 		}
		function split(val) {
			return val.split(/\s*,\s*/);
		}
		function extractLast(term) {
		        last = split(term).pop();
// 			log ( "extracted last = "+last );
			return last;
		}
 
 
		$("#new_tags").autocomplete({
 
			source: function(request, response) {
		      $.getJSON(<?php echo json_encode(url_for("asset/complete")) ?>, {
					current: extractLast(request.term)
				}, response);
			},
			search: function() {
				// custom minLength
				var term = extractLast(this.value);
				if (term.length < 1) {
					return false;
				}
			},
		        focus: function(event, ui) {
				// prevent value inserted on focus
				return false;
			},
			select: function(event, ui) {
				var terms = split( this.value );
				// remove the current input
				terms.pop();
				// add the selected item
				terms.push( ui.item.value );
				// add placeholder to get the comma-and-space at the end
				terms.push("");
				this.value = terms.join(", ");
				return false;
			}
 
		});
	});
</script>
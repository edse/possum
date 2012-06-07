<?php use_helper('I18N', 'Date') ?>

        <div id="alerts">
        </div>


<div id="header">
	<form action="<?php echo url_for('homepage')?>search/do" method="post" id="form">
      <span class="search">
    <span id="basic-search-controls">
    <a onclick="$('#advanced-options').toggle(); return false;" href="#" id="advanced-link">avançada</a>
      
      <input type="text" onfocus="if (this.value=='Busque por palavra-chave') this.value=''; this.style.color = ''; searchQueryClicked = true;" onkeyup="goog.i18n.bidi.setDirAttribute(event,this)" style="color: rgb(153, 153, 153);" value="Busque por palavra-chave" class="txt" id="video-search-query" name="search_query" size="30"/>

    <button aria-pressed="false" role="button" class=" yt-uix-button yt-uix-button-primary" onclick="$('#form').submit();return false;" id="video-search-button" type="button"><span class="yt-uix-button-content">Busca</span></button>
    </span>
  </span>
  </form>
  <h1 class="breadcrumbs">
<?php echo __('Search', array(), 'messages') ?>
  </h1>
  <div class="clear"/>

  </div>


<?php echo ">>>".count($assets) ?>

<div id="content">
      <div id="video-search">
    <div class="video-search-controls">
      <div id="advanced-options" class="module-advanced" style="display: none;">
        <div class="close-link">
          <a onclick="$('#advanced-options').toggle(); return false;" href="#">Close</a><img alt="" src="/img/pixel.gif" onclick="yt.style.toggle('advanced-options');"/>
        </div>

        <!-- 
		<div class="advanced-col">
          <p><strong>Claim and review status</strong></p>
          <select id="video-search-controls-filter" name="search_filter">
            <option selected="" value="0">Any</option>
            <option value="20">New (Never reviewed)</option>
            <option value="12">Reviewed & not claimed</option>
            <option value="2">Claimed</option>
          </select>
        </div>

        <div class="advanced-col">
          <p><strong>Category</strong></p>
          <select onchange="updateSubCategories(this.value);" id="video-search-controls-category_id" name="category_id">
            <option value="0">Any</option>
              <option value="2">Autos & Vehicles</option>
              <option value="23">Comedy</option>
              <option value="27">Education</option>
              <option value="24">Entertainment</option>
              <option value="1">Film & Animation</option>
              <option value="20">Gaming</option>
              <option value="26">Howto & Style</option>
              <option value="10">Music</option>
              <option value="25">News & Politics</option>
              <option value="29">Nonprofits & Activism</option>
              <option value="22">People & Blogs</option>
              <option value="15">Pets & Animals</option>
              <option value="28">Science & Technology</option>
              <option value="17">Sports</option>
              <option value="19">Travel & Events</option>
          </select>
          <div style="display: none;" id="subcategories">
            <p><strong>Subcategory</strong></p>
            <select id="video-search-controls-subcategory_id" name="subcategory_id">
            </select>
          </div>
          <div id="auto-captions">
            <input type="checkbox" name="include_auto_captions_checkbox" id="video-search-controls-include_auto_captions_checkbox"/><label for="video-search-controls-include_auto_captions_checkbox">include search from auto-generated captions</label>
          </div>
        </div>

        <div class="advanced-col">
          <p><strong>Sort by</strong></p>
          <select id="video-search-controls-sort_by" name="search_sort_by">
            <option value="R">Relevance</option>
            <option value="D">Date</option>
            <option value="V">Views</option>
          </select>
        </div>

        <div id="saved-search-select-div" class="advanced-col"> 
      <p><strong>Saved searches</strong></p>
          <p>
            <a onclick="showImportSearch(); return false;" id="import-search-link" href="#">
Import a search definition file
            </a>
          </p>
          <div style="display: none;" id="import-search-controls">
            <p>Select an XML file to upload</p>
            <form method="POST" enctype="multipart/form-data" action="/mclaim_api">
              <input type="hidden" value="1" name="action_import_search"/>
              <input type="file" accept="text/xml" name="xml_search_data" size="15"/><br/>
              <input type="submit" value="Upload" name="do_import_search"/>
              <a onclick="hideImportSearch(); return false;" id="import-search-cancel" href="#">
Cancel
              </a>
            <input type="hidden" name="session_token" value="LtOU4wVhMSLBIUBLexli8M0LnhZ8MTI5NDQ1Mzc1MQ=="/></form>
          </div>
        </div>
		-->
      </div>
    </div>

  



  <div class="yt-alert yt-alert-success yt-rounded" style="display: none;" id="autoreview-success-alert-container">
      <img alt="Alert icon" class="icon master-sprite" src="/img/pixel.gif"/>

    <div class="yt-alert-content">
            The first 200 search results have been submitted to automated review.


    </div>

      <button class="close master-sprite" onclick="_hidediv(this.parentNode);" type="button">
        close
      </button>
  </div>

  



  <div class="yt-alert yt-alert-error yt-rounded" style="display: none;" id="autoreview-error-alert-container">
      <img alt="Alert icon" class="icon master-sprite" src="/img/pixel.gif"/>

    <div class="yt-alert-content">
            Could not submit the search to automated review.


    </div>

      <button class="close master-sprite" onclick="_hidediv(this.parentNode);" type="button">
        close
      </button>
  </div>
  
  <div id="video-search-content">
    <div class="video-search-loading hid" style="display: none;">Loading... <img src="/images/loader.gif"/></div>
    <div class="video-search-message">Procure por assets de qualquer tipo.</div>
    <div class="video-search-pager yt-pager hid" style="display: none;"><a class="yt-pager-first" href="javascript:;" style="display: none;">« First</a><a class="yt-pager-prev" href="javascript:;" style="display: none;">‹ Prev</a><span class="yt-pager-showing"><strong>Results</strong> <strong>0</strong> - <strong>0</strong> of <strong>0</strong></span><a class="yt-pager-next" href="javascript:;" style="display: none;">Next ›</a><a class="yt-pager-last" href="javascript:;" style="display: none;">Last »</a></div>
    <table style="display: none;" class="video-search-table yt-data-table hid">
      <thead>
        <tr>
          <th class="unsortable video-search-col-status">Status</th>
          <th class="unsortable">Video</th>
          <th class="unsortable video-search-col-preview">Preview</th>
          <th class="unsortable video-search-col-views">Views</th>
          <th class="unsortable video-search-col-date">Date</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="video-search-results hid" colspan="5" style="display: none;"/>
        </tr>
      </tbody>
    </table>
    <div class="video-search-pager yt-pager hid" style="display: none;"><a class="yt-pager-first" href="javascript:;" style="display: none;">« First</a><a class="yt-pager-prev" href="javascript:;" style="display: none;">‹ Prev</a><span class="yt-pager-showing"><strong>Results</strong> <strong>0</strong> - <strong>0</strong> of <strong>0</strong></span><a class="yt-pager-next" href="javascript:;" style="display: none;">Next ›</a><a class="yt-pager-last" href="javascript:;" style="display: none;">Last »</a></div>
  </div>
  </div>


  <div style="display: none;" id="_templates">



    <div class="video-search-result">
      <div class="video-search-result-header">
        <table>
          <tbody><tr>
            <td class="video-search-col-status">
              <span class="video-search-result-status"/>
              <span class="video-search-result-owner"/>
            </td>
            <td>
              <span class="video-search-result-title"/>
              <span class="video-search-result-description"/>
            </td>
            <td class="video-search-col-preview">
              <span class="video-search-result-thumbnails">
                <img/><img/><img/>
              </span>
            </td>
            <td class="video-search-col-views">
              <span class="video-search-result-views"/>
            </td>
            <td class="video-search-col-date">
              <span class="video-search-result-date"/>
            </td>
          </tr>
        </tbody></table>
      </div>
      <div class="video-search-result-body">
        <table class="video-search-result-table">
          <tbody><tr>
            <td class="video-search-result-info">
              <div class="video-search-result-embed"/>
              <div class="video-search-result-metadata-container">
                <table class="video-search-result-metadata module-info"><tbody/></table>
              </div>
            </td>
            <td class="video-search-result-action">
              <div style="display: none;" class="video-search-result-errors wizard-errors"/>
            </td>
          </tr>
        </tbody></table>
      </div>
    </div>


    <div class="video-search-result-claim">
      <div>
        <span class="video-search-result-claim-title"/>
        (<span class="video-search-result-claim-asset-link"><a target="_blank">view asset</a></span><span class="video-search-result-claim-claim-link">, <a target="_blank">view claim</a></span>)
        <span class="video-search-result-claim-add-ownership"/>
      </div>
      <div class="video-search-result-claim-metadata"/>
    </div>


    <div class="video-search-result-action-choice">
      <div style="display: none;" class="video-search-result-action-owner-claims"><h3>My assets claimed in this video</h3></div>
      <div style="display: none;" class="video-search-result-action-nonowner-claims"><h3>Third-party assets claimed in this video</h3></div>
      <div style="display: none;" class="video-search-result-action-add-asset-button"/>
      <div class="video-search-result-action-no-claim-button"/>
      <div style="display: none;" class="video-search-result-action-autoreview-button"/>
    </div>


    <div class="asset-search">

    <div style="display: none;">
      <span class="asset-search-heading-type-C">Composition</span>
      <span class="asset-search-heading-type-E">Television Episode</span>
      <span class="asset-search-heading-type-G">General</span>
      <span class="asset-search-heading-type-H">Television Show</span>
      <span class="asset-search-heading-type-M">Sound Recording</span>
      <span class="asset-search-heading-type-N">None</span>
      <span class="asset-search-heading-type-S">Television Season</span>
      <span class="asset-search-heading-type-U">Music Video</span>
      <span class="asset-search-heading-type-W">Web</span>
      <span class="asset-search-heading-type-V">Movie</span>
    </div>
    <h3>Find the <span class="asset-search-heading-type-holder"/> asset you are claiming in this video</h3>

      <div class="asset-search-controls">
          <input type="text" onfocus="if (this.value=='None') this.value=''; this.style.color = '';" onkeyup="goog.i18n.bidi.setDirAttribute(event,this)" style="color: rgb(153, 153, 153);" value="" class="txt asset-search-controls-query" size="20"/>


<span class="yt-uix-button-group"><button aria-pressed="false" role="button" onclick=";return false;" class="start asset-search-controls-search yt-uix-button yt-uix-button-primary" type="button"><span class="yt-uix-button-content">Search my assets</span></button><button aria-expanded="false" aria-pressed="false" aria-haspopup="true" aria-activedescendant="" role="button" onclick=";return false;" class="end asset-search-controls-menu yt-uix-button yt-uix-button-primary yt-uix-button-arrowbutton" type="button"> <img alt="" src="/img/pixel.gif" class="yt-uix-button-arrow"/><ul aria-haspopup="true" role="menu" class="yt-uix-button-menu yt-uix-button-menu-primary" style="display: none;"><li id="23033616252" role="menuitem"><span onclick=";return false;" class="search-my-assets yt-uix-button-menu-item">Search my assets</span></li><li id="79214864645" role="menuitem"><span onclick=";return false;" class="search-third-party-assets yt-uix-button-menu-item">Search third-party assets</span></li><li id="52511544499" role="menuitem"><span onclick=";return false;" class="search-all-assets yt-uix-button-menu-item">Search all assets</span></li></ul></button></span>
    
        <a class="asset-search-controls-create-asset" href="#">Create new asset</a>
      </div>

      <div class="asset-search-loading">Loading... <img src="/img/loader.gif"/></div>
      <div class="asset-search-message"/>
      <div class="asset-search-pager"/>
      <table class="asset-search-table yt-data-table">
        <thead>
          <tr>
            <th class="unsortable asset-search-col-title">Asset Title</th>
            <th class="unsortable asset-search-col-owner">Owner</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="asset-search-results" colspan="2"/>
          </tr>
        </tbody>
      </table>
      <div class="asset-search-pager"/>

      <div>
        <span class="wizard-back-button"/>
      </div>
    </div>


    <div style="display: none;" class="asset-search-result">
      <div class="asset-search-result-header">
        <table class="asset-search-result-header-table">
          <tbody><tr>
            <td class="asset-search-col-title">
              <span class="asset-search-result-title"/>
            </td>
            <td class="asset-search-col-owner">
              <span class="asset-search-result-owner"/>
            </td>
          </tr>
        </tbody></table>
      </div>
      <div class="asset-search-result-body">
        <table class="asset-search-result-body-table">
          <tbody><tr>
            <td class="asset-search-result-info">
            </td>
            <td class="asset-search-result-action">
              <div style="display: none;" class="asset-search-result-errors wizard-errors"/>
            </td>
          </tr>
        </tbody></table>
      </div>
    </div>


    <div class="asset-search-result-action-choice">
      <div style="display: none;" class="asset-search-result-action-choice-myclaim">
You already have a claim on this video with this asset (<a class="asset-search-result-action-choice-myclaim-link" target="_blank">view claim</a>)
      </div>
      <div style="display: none;" class="asset-search-result-action-choice-new-claim"/>
      <div style="display: none;" class="asset-search-result-action-choice-other-claim">
This asset already appears in a third-party claim on this video
      </div>
    </div>

  </div>

  </div>
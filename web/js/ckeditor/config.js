﻿/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	//config.toolbar = 'Basic';
	config.language = 'pt-BR';
	// config.uiColor = '#AADC6E';
	config.toolbar_Full =
	[
	    ['Source'],
    /*
      ['Cut','Copy','Paste','PasteText','PasteFromWord'],
    */
      ['Paste','PasteText','PasteFromWord'],
	    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	    '/',
	    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
      ['NumberedList','BulletedList','-','Outdent','Indent'],
    /*
      ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
    */
	    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],['TextColor','BGColor'],
    /*
	    ['BidiLtr', 'BidiRtl' ],
    */
      '/',
	    ['Link','Unlink','Anchor'],
      ['Table','HorizontalRule','SpecialChar','PageBreak'],
      ['Styles','Format','Font','FontSize'],
      ['ShowBlocks','Maximize']
		/*
	    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe']
		,
	    '/',
	    ['Styles','Format','Font','FontSize'],
	    ['TextColor','BGColor'],
	    ['Maximize', 'ShowBlocks']
	    */
	];
};



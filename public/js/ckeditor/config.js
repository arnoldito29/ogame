/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
config.toolbar = 'MyBasic';

    config.toolbar_full =[
        { name: 'document', items : ['Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates'] },
        { name: 'clipboard', items : ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo'] },
        { name: 'editing', items : ['Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt'] },
        { name: 'forms', items : ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'] },
        { name: 'basicstyles', items : ['Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat'] },
        { name: 'links', items : ['Link','Unlink','Anchor'] },
        { name: 'colors', items : ['TextColor','BGColor'] },
        '/',
        { name: 'insert', items : ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'] },
        { name: 'paragraph', items : ['NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'] },
        { name: 'styles', items : ['Styles','Format','Font','FontSize'] },
    ];

    config.toolbar_my_basic=[
            { name: 'document', items : ['Source','NewPage','Preview'] },
            { name: 'basicstyles', items : ['Bold','Italic','Strike','-','RemoveFormat'] },
            { name: 'clipboard', items : ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo'] },
            { name: 'editing', items : ['Find','Replace','-','SelectAll','-','Scayt'] },
            '/',
            { name: 'styles', items : ['Styles','Format'] },
            { name: 'paragraph', items : ['NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote'] },
            { name: 'insert', items :['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'] },
            { name: 'links', items : ['Link','Unlink','Anchor'] },
            { name: 'tools', items : ['Maximize'] }
    ];
    config.toolbar_basic = [
            { name: 'document', items : ['Source','NewPage','Preview'] },
            { name: 'basicstyles', items : ['Bold','Italic','Strike','-','RemoveFormat'] },
            { name: 'clipboard', items : ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo'] },
            { name: 'editing', items : ['Find','Replace','-','SelectAll','-','Scayt'] },
            '/'
    ];
};

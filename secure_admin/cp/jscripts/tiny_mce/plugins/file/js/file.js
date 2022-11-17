tinyMCEPopup.requireLangPack();

var oldWidth, oldHeight, ed, url;

if (url = tinyMCEPopup.getParam("media_external_list_url"))
	document.write('<script language="javascript" type="text/javascript" src="' + tinyMCEPopup.editor.documentBaseURI.toAbsolute(url) + '"></script>');

function init() {
	var pl = "", f, val;
	var type = "flash", fe, i;

	ed = tinyMCEPopup.editor;

	tinyMCEPopup.resizeToInnerSize();
	f = document.forms[0]

	fe = ed.selection.getNode();
	if (/mceItem(Flash|ShockWave|WindowsMedia|QuickTime|RealMedia)/.test(ed.dom.getAttrib(fe, 'class'))) {
		pl = fe.title;

		switch (ed.dom.getAttrib(fe, 'class')) {
			case 'mceItemFlash':
				type = 'flash';
				break;

			case 'mceItemFlashVideo':
				type = 'flv';
				break;

			case 'mceItemShockWave':
				type = 'shockwave';
				break;

			case 'mceItemWindowsMedia':
				type = 'wmp';
				break;

			case 'mceItemQuickTime':
				type = 'qt';
				break;

			case 'mceItemRealMedia':
				type = 'rmp';
				break;
		}

		document.forms[0].insert.value = ed.getLang('update', 'Insert', true); 
	}

	document.getElementById('filebrowsercontainer').innerHTML = getBrowserHTML('filebrowser','src','file','file');
	document.getElementById('qtsrcfilebrowsercontainer').innerHTML = getBrowserHTML('qtsrcfilebrowser','qt_qtsrc','media','media');
	document.getElementById('bgcolor_pickcontainer').innerHTML = getColorPickerHTML('bgcolor_pick','bgcolor');

}

function insertMedia() {
	var fe, f = document.forms[0], h;
	tinyMCEPopup.restoreSelection();
	fe = ed.selection.getNode();
	h="<a href='"+f.src.value+"' target='_blank'>"+f.dtext.value+"</a>";
	ed.execCommand('mceInsertContent', false, h);
	tinyMCEPopup.close();
}

tinyMCEPopup.onInit.add(init);

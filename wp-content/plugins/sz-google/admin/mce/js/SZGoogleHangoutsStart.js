// Definizione variabile principale per contenere
// le funzioni che verranno richiamate da popup

var SZGoogleDialog = 
{
	local_ed:'ed',

	// Funzione init per le operazioni iniziali del
	// componente da eseguire in questo stesso file

	init: function(ed) {
		SZGoogleDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},

	// Funzione cancel associata al bottone di fine
	// schermata presente in ogni popup di shortcode

	cancel: function(ed) {
		tinyMCEPopup.close();
	},

	// Funzione insert per la creazione del codice
	// shortcode con tutti le opzioni preimpostate

	insert: function(ed) {

		tinyMCEPopup.execCommand('mceRemoveNode',false,null);
 
		// Calcolo i valori delle variabili direttamente
		// dai campi del form senza sottomissione standard

		var output  = '';

		var type     = jQuery('#ID_type'    ).val();
		var topic    = jQuery('#ID_topic'   ).val();
		var width    = jQuery('#ID_width'   ).val();
		var align    = jQuery('#ID_align'   ).val();
		var text     = jQuery('#ID_text'    ).val();
		var img      = jQuery('#ID_img'     ).val();
		var position = jQuery('#ID_position').val();

		if (jQuery('#ID_badge'  ).val() == '0') text     = '';
		if (jQuery('#ID_badge'  ).val() == '0') img      = '';
		if (jQuery('#ID_badge'  ).val() == '0') position = '';

		if (jQuery('#ID_width_auto' ).is(':checked')) width  = 'auto';

		// Composizione shortcode selezionato con elenco
		// delle opzioni disponibili e valore associato

		output = '[sz-hangouts-start ';

		if (type     != '') output += 'type="'     + type     + '" ';
		if (topic    != '') output += 'topic="'    + topic    + '" ';
		if (width    != '') output += 'width="'    + width    + '" ';
		if (align    != '') output += 'align="'    + align    + '" ';
		if (text     != '') output += 'text="'     + text     + '" ';
		if (img      != '') output += 'img="'      + img      + '" ';
		if (position != '') output += 'position="' + position + '" ';

		output += '/]';

		// Una volta eseguita la composizione del comando shotcode
		// richiamo i metodi di tinyMCE per inserimento in editor		

		tinyMCEPopup.execCommand('mceReplaceContent',false,output);
		tinyMCEPopup.close();
	}
};

// Inizializzo il dialogo tinyMCE e richiamo
// anche la routine init per le operazioni iniziali

tinyMCEPopup.onInit.add(SZGoogleDialog.init,SZGoogleDialog);
// Imposta la lingua in base alla lingua del browser
// oppure in base alla scelta precedente
// La scelta è tracciata con una variabile globale di sessione
// Se la lingua del browser non è tra le opzioni: inglese

/* Settaggio lingua */
function setLanguageID(){
  //console.log("setLanguageID() ID e basta PARTITA");
  // Mantiene il settaggio della lingua della sessione
  // altrimenti seleziona quella del browser
  if (localStorage.langID) {
    return;
    //lgID = localStorage.langID;
  } else {
    lgID = navigator.language || navigator.userLanguage;
    lgID = lgID.split('-')[0];
    localStorage.langID = lgID;
  }

  //return lgID;
}

/* Settaggio <select> */
function setSelect(lgID) {
  //console.log("setSelect(lgID) PARTITA");
  jQuery("option").filter(":selected").removeAttr("selected");
  jQuery("#" + lgID).attr("selected", "selected");
  //console.log("jQuery('#' + lgID) è VUOTO? = " + (jQuery('#' + lgID) == null) );
  //console.log("jQuery('#' + lgID) = " + jQuery('#' + lgID) );
  //jQuery("#" + lgID).prop("selected", true);
  //console.log(jQuery("#" + lgID).attr("selected"));
  //console.log(lgID);

  //return lgID;
}

/* Settaggio della copertina del libro in base alla lingua */
/* Da cancellare */
function setBookCover(lgID) {
  var url = "/wp-content/themes/lovecraft-child/assets/images/" + lgID + "_cover.png";
  //console.log(url);
    jQuery("#book-cover").attr("src", url);
}

/* Settaggio sidebar-book */
function setSidebar() {
  jQuery(document).ready(function () {
    if (!localStorage.langID) {
      setLanguageID();
    }
    lgID = localStorage.langID;
    //console.log(lgID);
    //console.log(jQuery("#" + lgID).length);
    if (jQuery("#" + lgID).length < 1) {
      lgID = "en";
    }
  setSelect(lgID);
  //setBookCover(lgID);
  } );
}

/* Check e settaggio lingua a caricamento pagina */
function langBoot() {
  var lgID = '';
  lgID = setLanguageID();
  lgID = setSelect(lgID);
  //alert(jQuery('#' + lgID).attr('selected'););
  //document.write(jQuery('#' + lgID).length);

  return lgID;
}

/* Preparazione url REST nel caso i Custom Fields sono attribuiti a cf_quote*/
function urlMaker(lang) {
  // *******************************************
  // preparazione parte di endpoint
  // *******************************************
  //var lgID = localStorage.langID;
  var lgID = lang;
  var fields = '&_fields=' + 'id,' + 'meta.' + lgID + '_cf_page_num,' + 'meta.' + lgID + '_cf_text,' + 'meta.' + lgID + '_cf_keyword';
  // *******************************************
  // preparazione route
  // scambiare quando si passa a WordPress
  // *******************************************
  // definitivo con Custom Fields in cf_quote:
  var url = window.location.protocol + '//' + window.location.hostname + '/wp-json/wp/v2/cf_quote?';
  // Provvisorio:
  //var url = 'http://readingbahnhofzoo.local' + '/wp-json/wp/v2/cf_quote?';
  var include = 'include=';
  // cattura l'ID del post
  var quotes = function (){jQuery('.wkvbz');};
  var IDs = '';
  function creaArray() { quotes.each(function () {
    var idz = this.id;
    idz = idz.split('-')[1] + ',';
    IDs = IDs + idz;
  });
};
include = include + IDs.substr(0, IDs.length - 1);
url = url + include + fields;

return url;
}

/* Preparazione url REST in caso i Custom Fields sono attribuiti a Post*/
function urlMakerPost(lang) {
  //console.log('urlMakerPost() partita!');
  //console.log('lang = ' + lang);
  // *******************************************
  // preparazione parte di endpoint
  // *******************************************
  //var lgID = localStorage.langID;
  var lgID = lang;
  var fields = '&_fields=' + 'id,' + 'meta.' + lgID + '_cf_page_num,' + 'meta.' + lgID + '_cf_text,' + 'meta.' + lgID + '_cf_keyword';
  // *******************************************
  // preparazione route
  // scambiare quando si passa a WordPress
  // *******************************************
  // definitivo con Custom Fields in cf_quote:
  //var url = window.location.protocol + '//' + window.location.hostname + '/wp-json/wp/v2/cf_quote?';
  // definitivo con Custom Fields in Post:
  var url = window.location.protocol + '//' + window.location.hostname + '/wp-json/wp/v2/posts?';
  // Provvisorio:
  //var url = 'http://readingbahnhofzoo.local' + '/wp-json/wp/v2/cf_quote?';
  var include = 'include=';
  // cattura l'ID del post
  ///var quotes = function (){jQuery('.wkvbz');};
  ///var quotes = function (){jQuery('div.x');};

  var quotes = jQuery('div.x');
  //console.log("quotes.length: " + quotes.length);

  /*var myIDs = '';
  myIDs = function creaArray(quotes) { quotes.each(function () {
    var idz = this.id;
    //console.log("questo è idz: " + idz);
    idz = idz.split('-')[1] + ',';
    myIDs = myIDs + idz;
    //return myIDs;
  });
  console.log('Lista dei myIDs chiamati2: ' + myIDs);
};*/

var myIDs = creaArray(quotes);

include = include + myIDs.substr(0, myIDs.length - 1);
url = url + include + fields;

//test
//console.log('Lista degli IDs chiamati+++: ' + myIDs);
//console.log('Questo è url completo: ' + url);

return url;
}

/* Crea un array di IDs presi da oggetto jQuery da passare a ajax */
function creaArray(quotes) {
  var myIDs = '';
  quotes.each(function () {
    var idz = this.id;
    idz = idz.split('-')[1] + ',';
    myIDs = myIDs + idz;
  });
  return myIDs;
}

/* Estrae i dati dall'oggeto JSON e li trasforma in testo */
function cleanObject(obj, language) {
  //console.log('cleanObject() partita!');
  var clean = {};
  // campo pagina:
  var pg = obj.meta[language + '_cf_page_num'];
  pg = parseInt(pg);
  pg = JSON.stringify(pg);
  clean.pg = pg;
  // campo keyword:
  var key = obj.meta[language + '_cf_keyword'];
  key = JSON.stringify(key);
  key = key.substring(2, key.length - 2);
  clean.key = key;
  // campo testo (quote):
  var quoteText = obj.meta[language + '_cf_text'];
  quoteText = JSON.stringify(quoteText);
  quoteText = quoteText.substring(2, quoteText.length - 2);
  clean.quoteText = quoteText;

//console.log('clean = ' + clean);
  return clean;
}

/* Crea 2 blocchi di testo: prima e dopo la keyword */
function cutText(quoteText, key) {
  //console.log('cutText() partita!');
  var chunks = [quoteText.substring(0, quoteText.indexOf(key)),
    quoteText.substring(quoteText.indexOf(key) + key.length),
  ];
//console.log('chunks[0] = ' + chunks[0]);
//console.log('chunks[1] = ' + chunks[1]);
  return chunks;
}

/* Inietta il testo nei tag generati dal template */
function pasteTextInHTML(obj, clean) {
  //console.log('pasteTextInHTML() partita!');
  //console.log('clean.quoteText = ' + clean.quoteText);
  //console.log('clean.key = ' + clean.key);
  //console.log('clean.page-num = ' + clean.pg);

  var chunks = cutText(clean.quoteText, clean.key);
  //console.log('ID Post = #post-' + obj.id);
  //console.log(jQuery('#post-' + obj.id).find('.page-num').text(clean.pg));
  jQuery('#post-' + obj.id).find('.text0').text(chunks[0]);
  jQuery('#post-' + obj.id).find('.keyword').find('strong').text(clean.key);
  jQuery('#post-' + obj.id).find('.text1').text(chunks[1]);
  jQuery('#post-' + obj.id).find('.page-num').text(clean.pg);
}

/* Chiamata AJAX */
function serverCall(url, language) {
  //console.log('serverCall() partita!');
  //var myData =
  jQuery.ajax({
    url: url,
    data: {
      format: 'json'
    },
    error: function () {
      jQuery('#info').html('<p>An error has occurred</p>');
    },
    dataType: 'json',
    success: function (data) {
      //console.log("Questo è data: " + data);
      for (var property in data) {
        var obj = data[property];
        var clean = cleanObject(obj, language);
        pasteTextInHTML(obj, clean);
        stickCredits(language);
        // .im è invisibile, la nuova classe rende visibile la img
        jQuery("img.im").addClass("thumbVis");
        // riorganizza gli spazi nel blocco quote
        sameHight();

      }
    },
    type: 'GET'
  });

  //return myData;
}





// box immagine stessa altezza box del paragrafo
function sameHight() {
      jQuery(".c").each(function() {
        jQuery(this).height(jQuery(this).siblings(".d").height()  );
        	});
jQuery(".im").attr("visibility", "visible"); /* non va.... */
}

/* Click su <select> */
function doSomething(value) {
  localStorage.langID = value;
  var url = urlMakerPost(value);
  serverCall(url, value);
  setBookCover(value);
}



/* A pagina pronta */
function loadBook() {
  /*  window.onload = function() {
  alert('Page is loaded');
}; */
//console.log('loadBook() partita!');
jQuery(document).ready(function () {
  //alert('Page is loaded 1');
  var lg = localStorage.langID;
  //var lg = localStorage.langID;
  var url = urlMakerPost(lg);
  // **********************
  // url per test:
  //var url = 'http://readingbahnhofzoo.local/wp-json/wp/v2/cf_quote?include=124,118&_fields=id,meta.de_cf_page_num,meta.de_cf_text,meta.de_cf_keyword';
  //var url = 'http://readingbahnhofzoo.local/wp-json/wp/v2/cf_quote?include=124,118&_fields=id,meta.' + lg + '_cf_page_num,meta.' + lg + '_cf_text,meta.' + lg + '_cf_keyword';
  // **********************
  serverCall(url, lg);
  //alert('Page is loaded 2');
  //var myData = serverCall(url, lg);
  stickCredits(lg);
});
}

function stickCredits(lg) {
  var deLink = "https://www.carlsen.de/taschenbuch/wir-kinder-vom-bahnhof-zoo/978-3-551-31732-2";
  var de = '<a href="' + deLink + '" target="_blank"><i>Christiane F.: Wir Kinder vom Bahnhof Zoo.</i></a> Nach Tonbandprotokollen aufgeschrieben von Kai Hermann und Horst Rieck. Carlsen, Hamburg 2009.';
  var enLink = "https://lernerbooks.com/shop/show/19804";
  var en = '<a href="' + enLink + '" target="_blank"><i>Zoo Station: The Story of Christiane F.</i></a> by Christiane Vera Felscherinow, Kai Hermann, Horst Rieck. Zest Books LLC, San Francisco 2013.';
  var itLink = "https://www.rizzolilibri.it/ricerca/?tipo=Tutti&cerca=Noi%2C%20i%20ragazzi%20dello%20zoo%20di%20Berlino";
  var it = '<a href="' + itLink + '" target="_blank"><i>Noi, i ragazzi dello zoo di Berlino</i></a>, Christiane F., Rizzoli 1981.';
  var html = "";
  switch (lg) {
  case "de":
    html = de;
    break;
  case "en":
    html = en;
    break;
  case "it":
     html = it;
    break;
  }
  jQuery(".bkCredits").html(html);
}

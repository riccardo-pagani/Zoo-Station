/*
++++++++++++++++++++
UI della pagina Book
++++++++++++++++++++
*/

// box immagine stessa altezza box del paragrafo
function sameHight() {
  jQuery(".c").each(function() {
    jQuery(this).height(jQuery(this).siblings(".d").children(".tx").height()  );
  });
}

// listener per ridimensionamento browser
function resizeSameHight() {
  jQuery(window).on("resize", function () {
    sameHight();
  });

  //jQuery(".tx").height(this).on("change", function () {
  //  sameHight();
  //});

}

// event listener per blocco quote
function revealImage() {
  var enter = {
    "margin-left" : "130px",
    //"transition": "margin-left 1s cubic-bezier(0.5, 0, 0.2, 1)",
    //"transition": "margin-left 1s ease 0.25s",
    "margin-right" : "-130px",
    "transition": "margin-left 1s ease 0.25s, margin-right 1s ease 0.25s",
  };
  var leave = {
    "margin-left" : "0px",
    //"transition": "margin-left 1s cubic-bezier(0.5, 0, 0.2, 1) 0.25s",
    "margin-right" : "0px",
    "transition": "margin-left 1s ease 0.25s, margin-right 1s ease 0.25s",
  };
  jQuery(".d").on("mouseenter", function() {
    jQuery(this).css(enter);
  });
  jQuery(".c").on("mouseover", function() {
    jQuery(this).siblings(".d").css(enter);
  });
  jQuery(".d").on("mouseleave", function() {
    jQuery(this).css(leave);
  });
  jQuery(".c").on("mouseleave", function() {
    jQuery(this).siblings(".d").css(leave);
  });
}

// A caricamento pagina
function startPage() {
  jQuery(document).ready(function () {
    sameHight();
    resizeSameHight();
    reveal();
    //revealImageSroll();
  });
}

// Apre finestra immagine durante lo scroll
function revealImageSroll() {

  // YAIR EVEN OR
  // 2014

  var getElementsInArea = (function(docElm){
      var viewportHeight = docElm.clientHeight;

      return function(e, opts){
          var found = [], i;

          if( e && e.type == 'resize' )
              viewportHeight = docElm.clientHeight;

          for( i = opts.elements.length; i--; ){
              var elm        = opts.elements[i],
                  pos        = elm.getBoundingClientRect(),
                  topPerc    = pos.top    / viewportHeight * 100,
                  bottomPerc = pos.bottom / viewportHeight * 100,
                  middle     = (topPerc + bottomPerc)/2,
                  inViewport = middle > opts.zone[1] &&
                               middle < (100-opts.zone[1]);

              elm.classList.toggle(opts.markedClass, inViewport);

              if( inViewport )
                  found.push(elm);
          }
      };
  })(document.documentElement);


  ////////////////////////////////////
  // How to use:

  window.addEventListener('scroll', f)
  window.addEventListener('resize', f)

  function f(e){
      getElementsInArea(e, {
          elements    : document.querySelectorAll('div.d'),
          markedClass : 'highlight--1',
          zone        : [5, 45] // percentage distance from top & bottom
      });
  }
}

/* ++++++++++++++++++++++++++ */
/*           REVEAL           */
/* ++++++++++++++++++++++++++ */
function reveal() {
  if ("ontouchstart" in document.documentElement)
  {
    revealImageSroll() ;
  }
  else
  {
   revealImage();
  }
}

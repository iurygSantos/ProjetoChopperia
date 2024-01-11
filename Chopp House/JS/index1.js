  /*evento da caixa de busca*/ 
  var div_busca   = document.querySelector(".div-busca"); 
  var search      = document.getElementById("search");

  function click_iconSearch() { 

      if (search.style.width < '220px') {
        div_busca.style.width     = '260px';
        search.style.width        = '220px';
        search.style.borderBottom = 'solid 1px #fff';
        search.style.position     = 'absolute';
        search.style.right        = '35px';
        search.placeholder        = 'O que você está buscando?';

        search.focus();
      }  
      // else if (search.style.width >= '220px') {
      //   div_busca.style.width     = '30px';
      //   search.style.width        = '20px';
      //   search.style.borderBottom = '';
      //   search.style.position     = 'relative';
      //   search.style.right        = '0px';
      //   search.placeholder        = '';
        
      // }
  }

  search.addEventListener("focusout", () => { 
    search.blur();  

    div_busca.style.width     = '30px';
    search.style.width        = '20px';
    search.style.borderBottom = 'none';
    search.style.position     = '';
    search.placeholder        = '';

    cont_click = 0
  });
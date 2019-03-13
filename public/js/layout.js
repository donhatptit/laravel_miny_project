var layerOpacity = document.getElementsByClassName("layer_opacity")[0];
var nav_item = document.getElementsByClassName("nav-item");
for (i = 0; i < nav_item.length; i++) {
    nav_item[i].onmouseover = function() {
        if (window.outerWidth > 768) {
            layerOpacity.style.height = document.getElementsByTagName('body')[0].clientHeight + "px";
        }
    };
    nav_item[i].onmouseout = function() {
        if (window.outerWidth > 768) {
            layerOpacity.style.height = "0px";
        }
    }
}
//open menu
// Mobile: Menu CanVas
var menuButton = document.getElementById("icon-nav");
let navTag = document.getElementsByClassName("menu")[0];
var closeButton = document.getElementsByClassName("close-nav-mobile")[0];

if (window.outerWidth <= 768) {
    layerOpacity.style.height = document.getElementsByTagName('body')[0].clientHeight + "px";
}

menuButton.onclick = function() {
    navTag.style.marginLeft = "0";
    layerOpacity.style.marginLeft = "0";
    document.getElementsByTagName('body')[0].style.overflow = "hidden";
}

closeButton.onclick = function() {
    navTag.style.marginLeft = `-${0.8 * document.getElementsByTagName('body')[0].clientWidth}px`;
    layerOpacity.style.marginLeft = "-100%";
    document.getElementsByTagName('body')[0].style.overflow = "unset";
}
window.onresize = function(){
    if (window.outerWidth > 769) {
        navTag.style.removeProperty('margin-left');
    }

}
layerOpacity.onclick = function(){
   navTag.style.marginLeft = `-${0.7 * document.getElementsByTagName('body')[0].clientWidth}px`;
    layerOpacity.style.marginLeft = "-100%";
    document.getElementsByTagName('body')[0].style.overflow = "unset";
}
// Mobile: Menu Accordion
  

for (let i = 0; i < nav_item.length; i++) {
    nav_item[i].addEventListener("click", function(event) {
        if (event.target.tagName ==="I") {
            // console.log(event.target.tagName)
        var current = nav_item[i];

        var list_menu_active = document.getElementsByClassName('active');
        if (list_menu_active.length) {
            for (let i = 0; i < list_menu_active.length; i++) {
                if (current == list_menu_active[i]) { continue };
                list_menu_active[i].classList.remove('active');
                                 }
        }
   

        if(current.classList.contains('active')){
          current.classList.add('reactive');
            setTimeout(function() {

           current.classList.remove('active'); 
           current.classList.remove('reactive')
         },300);
        }
        else {
            current.classList.add('active');
        }
        }
        
    })


}
window.addEventListener('load', function(ev){
    setActionIconPlus();
   })
function expandSideMenu(des){

    document.getElementById(des).classList.remove('fa-angle-down');
    document.getElementById(des).classList.add('fa-angle-up');

    document.getElementById(des).onclick = function(){
     
        document.getElementById(des).classList.remove('fa-angle-up');
        document.getElementById(des).classList.add('fa-angle-down');
        setActionIconPlus();
    }


}
function setActionIconPlus(){
    var iconplus = document.getElementsByClassName('sidebar-icon-plus');

    for(var i = 0; i < iconplus.length; ++i){
        iconplus[i].onclick = function(){
            expandSideMenu(this.id);
        }
    }
}
// Go to Top
var toTop = document.getElementById("goto-top");
   window.onscroll = function(){
    if(document.body.scrollTop>20 || document.documentElement.scrollTop >20){
        toTop.style.display = "block";
    }
    else{

        toTop.style.display="none";
    }
   };
  toTop.addEventListener("click", function(){

  scrollToTop(500);
});
function scrollToTop(scrollDuration) {

    var scrollStep = -window.scrollY / (scrollDuration / 15),
        scrollInterval = setInterval(function(){
        if ( window.scrollY != 0 ) {
            window.scrollBy( 0, scrollStep );
        }
        else clearInterval(scrollInterval); 
    },15);
}
// search ajax js
        $(document).ready(function(){
        $('.search').keyup(function(){
        var txt = $('.search').val();
        $.post('controller/api/controller_ajax_trangchu.php', {data: txt}, function(data){

            $('.danhsach').html(data); 
        });
    });
});


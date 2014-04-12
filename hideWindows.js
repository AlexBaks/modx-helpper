$(document).mouseup(function (e) {
    var container = $("Элемент в не которого был произведен клик");
    if (container.has(e.target).length === 0){
        container.hide();    
    }
});

/*Улучшеный вариант*/
$(document).click(function(e){ 
    var elem = $("Элемент в не которого был произведен клик"); 
    if(e.target!=elem[0]&&!elem.has(e.target).length){ 
        elem.hide(); 
    } 
});

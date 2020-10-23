
$("#hints-table tr").hover(function(){
    
    let val=$('#hints-table tr').index(this);
    let tabletd='#hints-table tr:nth-child('+(val+1)+') td';

    $(tabletd).removeClass('none').removeClass('fadeout');

    $(tabletd).addClass('block').outerWidth();

    $(tabletd).addClass('fadein');
    
})


$("#hints-table tr").on("mouseleave",function(){
    
    let val=$('#hints-table tr').index(this);
    let tabletd='#hints-table tr:nth-child('+(val+1)+') td';

    $(tabletd).removeClass('block').removeClass('fadein');

    $(tabletd).addClass('none').outerWidth();

    $(tabletd).addClass('fadeout');
})
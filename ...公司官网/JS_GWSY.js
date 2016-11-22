$(function(){
    var i=0;
    var t1;
    $('#an span').eq(i).css({
        'background':'pink'
    })
    $('#an span').click(function(){

        n=$('#an span ').index(this)
        $('.lbtxx').fadeOut(50).eq(n).fadeIn(50);
        $('#an span').css({'background':''}).eq(n).css({
            'background':'pink'
        })
        i=n
    })
    t1=setInterval(al,2000);
    function al(){
        i++;
        if(i>=3){
            i=0
        }
        $('.lbtxx').fadeOut(500).eq(i).fadeIn(500);
        $('#an span').css({'background':''}).eq(i).css({
            'background':'pink'
        })
    }
    $('#lbt').hover(function(){
            clearInterval(t1)
        },
        function(){
            t1=setInterval(al,2000);
        })
    //案例部分

    $('.but').eq(0).css('background','#B82A2F');
    $('.jt').eq(0).css('display','block');
    $('.alt').eq(0).css('display','block');
    $('.but').click(function(){
        var b= $('.but').index(this);
        $('.but').css('background','').eq(b).css('background','#B82A2F');
        $('.jt').css('display','none').eq(b).css('display','block');
        $('.alt').css('display','none').eq(b).css('display','block');

    })












})


/**
 * Created by 89293 on 2016/10/13.
 */

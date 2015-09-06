
$(document).ready(function() {
    
    /*var cate_slug = 'doc-bao'; //default active home middle category is doc-bao
    $('#ctnNavCt li .sa_div').click(function(e){
        e.preventDefault();
        
            var setpos = $('#mainTop').offset().top;
            $('html, body').animate({
                scrollTop: setpos
            }, 10);
            
           $('#ctnNavCt li .sa_div').removeClass('active');
           $(this).addClass('active');
          
           
           $('#contentBox').find('.activeBox').remove();//remove activeBox
           
           var cate_slug = $(this).parent().find('.cate_slug').val();//get category slug 
           
           switch(cate_slug){
                case 'doc-bao':
                    var content = '<div id="docbao-tabs" class="activeBox nang_wtt"> <input class="page cate_slug_box" type="hidden" value="doc-bao"/> </div>';
                    $('#contentBox').append(content);
                    break;
                case 'tam-su':
                    var content = '<div id="tamsu-tabs" class="activeBox nang_wtt"> <input class="page cate_slug_box" type="hidden" value="tam-su"/> </div>';
                    $('#contentBox').append(content);
                    break;
                case 'lam-dep':
                    var content = '<div id="lamdep-tabs" class="activeBox nang_wtt"> <input class="page cate_slug_box" type="hidden" value="lam-dep"/> </div>';
                    $('#contentBox').append(content);
                    break;
                case 'me-va-be':
                    var content = '<div id="mevabe-tabs" class="activeBox nang_wtt"> <input class="page cate_slug_box" type="hidden" value="me-va-be"/> </div>';
                    $('#contentBox').append(content);
                    break;
                case 'giai-tri':
                    var content = '<div id="giaitri-tabs" class="activeBox nang_wtt"> <input class="page cate_slug_box" type="hidden" value="giai-tr"/> </div>';
                    $('#contentBox').append(content);
                    break;
                default:
                    break;
           }
           
           
           var temp_date_1 = '';
           var current_date_1 = '';
           if($('.lastpost_date:last').length <= 0)
           {
                current_date_1 = '2020-12-12';
           }
           else
           {
                current_date_1 = $('.lastpost_date:last').val();
           }
           
              console.log(current_date_1);
                $('#loadmoreajaxloader').show();
                   $.ajax({
                       type : 'POST',
                       data : {'action' : 'home_get_cate_new_posts', 'cate_slug': cate_slug},
                       url : AJAX.url,
                       success : function (output){
                         $('#contentBox').find('.activeBox').append(output);
                         $('#loadmoreajaxloader').hide();          
                       },
                       error: function () {
                            console.log('Co loi xay ra');
                       }
                });
          
                
           
           
          
          
    });//end click event */
    
    //console.log(cate_slug);
    //home_ajax_scroll();
    /*** Process ajax scroll for home page****/
    if($('#ctnNavCt').length > 0)
    {    
        
        if( $('#no_news').length <= 0){
            var length = $('.mainCt').offset().top;
            var right_fix_height = $('#sticky-right-sidebar').offset().top + $('#sticky-right-sidebar').height();
            var check_finish_response = 0;//check whether ajax response finished load
           var temp_date = 'abd';
            $(window).scroll(function() {
                 
                if ($(window).scrollTop() > length) {
					$('#sticky-left-sidebar').addClass('sticky');
					$('#sticky-right-sidebar').addClass('sticky');
                    $('.cus_nav').addClass('sticky');
				} else {
					$('#sticky-left-sidebar').removeClass('sticky');
					$('#sticky-right-sidebar').removeClass('sticky');
                    $('.cus_nav').removeClass('sticky');
				}
                if ($(window).scrollTop() > right_fix_height) {
					$('#sticky-right-sidebar').addClass('sticky');
				} else {
					$('#sticky-right-sidebar').removeClass('sticky');
				}
                
                if($(window).scrollTop() + $(window).height() > $(document).height()-100 ) {
                    
                    var current_date = $('.lastpost_date:last').val();
                    console.log('currrent_date: ' + current_date); 
                    var cate_slug = $('.cate_slug_box').val();
                    
                    //console.log(cate_id);
                    if(temp_date == current_date)
                    {
                        check_finish_response = 1;
                        //var temp_date = new Date(current_date);
                        
                        //var decrease_date = temp_date.setSeconds(temp_date.getSeconds() - 30);
                        //decrease_date = new Date(decrease_date);
                        //decrease_date = decrease_date.getFullYear() + "-" + getfullMonth( decrease_date ) + "-" + getfullDay( decrease_date ) + ' ' + getfullHour( decrease_date ) + ":" + getfullMinute( decrease_date ) + ":" + getfullSecond( decrease_date )  ;
                        
                        //current_date = decrease_date;
                    }
                      
                    if( check_finish_response == 0)
                    {
                      $('#loadmoreajaxloader').show();
                        $.ajax({
                            type : 'POST',
                            data : {'action' : 'home_get_cate_new_posts','current_date': current_date, 'cate_slug': cate_slug},
                            url : AJAX.url,
                            success : function (output){
                                $('.activeBox').append(output);
                                $('#loadmoreajaxloader').hide();
                                check_finish_response = 0;
                                 
                            },
                            error: function () {
                                 console.log('Co loi xay ra');
                            }
                        });  
                        temp_date= current_date;
                    }
                    else{
                        console.log('repeat old last date;');
                    } 
                    console.log('temp_date: ' + temp_date);
                    console.log('currrent_date: ' + current_date);   
                    //temp_date= current_date;
                    //deleteCookie('last_date');
                    //setCookie('last_date', current_date, 600);
                    
               }
               
               
            });
            
        }
    }
    /******end ajax home page**********/
    
    /***Process ajax for category page***/
    if($('#cate_page').length > 0)
    {console.log('run here');
        
        if( $('#no_news').length <= 0){
            var check_finish_response = 0;//check whether ajax response finished load
            var ctemp_date = '';
            var length = $('.mainCt').offset().top ;
            var right_fix_height = $('#sticky-right-sidebar').offset().top + $('#sticky-right-sidebar').height();
            $(window).scroll(function() {
                
				if ($(window).scrollTop() > length) {
					$('#sticky-left-sidebar').addClass('sticky');
					$('#sticky-right-sidebar').addClass('sticky');
                    $('.cus_nav').addClass('sticky');
                    
				} else {
					$('#sticky-left-sidebar').removeClass('sticky');
					$('#sticky-right-sidebar').removeClass('sticky');
                    $('.cus_nav').removeClass('sticky');
				}
                
                if ($(window).scrollTop() > right_fix_height) {
					$('#sticky-right-sidebar').addClass('sticky');
				} else {
					$('#sticky-right-sidebar').removeClass('sticky');
				}
			
                if($(window).scrollTop() + $(window).height() > $(document).height()-100) {
                    
                    var current_date = $('.lastpost_date:last').val();
                    console.log('currrent_date: ' + current_date);  
                    var cate_id = $('#cate_id').val();
                    console.log(cate_id);
                    if(ctemp_date == current_date)
                    {
                        check_finish_response = 1;
                    }
                    if( check_finish_response == 0)
                    {
                      $('#loadmoreajaxloader').show();
                        $.ajax({
                            type : 'POST',
                            data : {'action' : 'get_cate_new_posts','current_date': current_date, 'cate_id': cate_id},
                            url : AJAX.url,
                            success : function (output){
                                $('#newest-post').append(output);
                                $('#loadmoreajaxloader').hide();
                                check_finish_response = 0;
                                 
                            },
                            error: function () {
                                 console.log('Co loi xay ra');
                            }
                            
                        }); 
                        ctemp_date = current_date; 
                    } 
                    else{
                        console.log('repeat old last date;');
                    }
                    console.log('ctemp_date: ' + ctemp_date);
                    console.log('currrent_date: ' + current_date);    
                    
                   
               }
            });
            
        }
        
    }
    
    /***Process ajax for search page***/
        
        $('#s-view-more').click(function() {
                if( $('#no_news').length <= 0){
                    var current_date = $('.lastpost_date:last').val();
                    var query_string = $('#query-str').val();
                    console.log(current_date);
                    
                    $('#loadmoreajaxloader').show();
                    
                    $.ajax({
                            type : 'POST',
                            data : {'action' : 'get_search_posts','current_date': current_date, 'query_string': query_string},
                            url : AJAX.url,
                            success : function (output){
                                $('.activeBox').append(output);
                                $('#loadmoreajaxloader').hide();
                                 
                            },
                            error: function () {
                                 console.log('Co loi xay ra');
                            }
                    });
                }
                else{
                    var no_more = 'Không còn tin để hiển thị';
                    $('#s-view-more').html(no_more);
                }
                
            });
        
    /***Process ajax for video page***/
        
        $('#v-view-more').click(function() {
                if( $('#no_news').length <= 0){
                    var current_date = $('.lastpost_date:last').val();
                    var video_cat = $('.video_cat').val();
                    console.log(current_date);
                    
                    $('#loadmoreajaxloader').show();
                    
                    $.ajax({
                            type : 'POST',
                            data : {'action' : 'get_videos','current_date': current_date, 'video_cat': video_cat},
                            url : AJAX.url,
                            success : function (output){
                                $('.cafe-post-news').append(output);
                                $('#loadmoreajaxloader').hide();
                                 
                            },
                            error: function () {
                                 console.log('Co loi xay ra');
                            }
                    });
                }
                else{
                    var no_more = 'Không còn tin để hiển thị';
                    $('#v-view-more').html(no_more);
                }
                
            });
       
    
    /*****LIKE*****/

    // Like article
	$('.tto_object_like_btn').one('click', function() {
		
        var like_number_element = $(this).siblings('.sl');
		var like_button = $(this);
        var post_id = $('#post_id').val();
        
        console.log(post_id);
        $.ajax({
            type : 'POST',
            data : {'action' : 'set_post_love','post_id': post_id},
            url : AJAX.url,
            success : function (result){
                console.log(result);
    			if (result == 'success') {
    				temp = (like_number_element.html()).split('<span></span>');console.log(temp);
    				var like_number = parseInt(temp[1]) + 1;console.log(like_number);
    				like_number_element.html(like_number);
    				like_button.removeClass('tto_object_like_btn');
    				like_button.css('background-color', '#a2a2a2');
    			} else {
    				alert('Có lỗi xảy ra, vui lòng thử lại.');
    			}                
            },
            error: function () {
            console.log('Co loi xay ra');
            }
        });
        
        
	});

// Like comment
	$('.like_btn').click(function(){
		
        var comment_id =$(this).siblings('#comment_layout').val();
		var like_number_element = $(this).parent().siblings('.like_number');
		var like_button_element = $(this);

		$.ajax({
			type: 'POST',
            data: {'action' : 'set_comment_like', 'comment_id': comment_id},
			url : AJAX.url,
			
		}).done(function(result) {
		  
			if (result == 'success') {
				var like_number = parseInt(like_number_element.html()) + 1;
				like_number_element.html(like_number);
				$('<a href="javascript:;" class="unlike_btn btn-like-cm" id="like_comment_id-' + comment_id + '">Bỏ thích</a>').insertAfter(like_button_element);
				like_button_element.remove();
                //  unLike comment
            	$('.unlike_btn').click(function(){
            	   
            		var comment_id =$(this).siblings('#comment_layout').val();
            		var like_number_element = $(this).parent().siblings('.like_number');
            		var unlike_button_element = $(this);
                    $.ajax({
            			type: 'POST',
                        data: {'action' : 'down_comment_like', 'comment_id': comment_id},
            			url : AJAX.url,
            		}).done(function(result) {
            		  console.log(result);
            			if (result == 'success') {
            				var like_number = parseInt(like_number_element.html()) - 1;
            				like_number_element.html(like_number);
            				$('<a href="javascript:void(0);" class="like_btn btn-like-cm" id="like_comment_id-' + comment_id + '">Thích</a>').insertAfter(unlike_button_element);
            				unlike_button_element.remove();
            			}  else {
            				alert('Có lỗi xảy ra, vui lòng thử lại!');
            			}
            		});
            		
            	});
			} else {
				alert('Có lỗi xảy ra, vui lòng thử lại!');
			}
		});
        
        
	});

    /*number of share ajax process*/
    $('#share-btn').click(function(){
           var post_id = $('#post_id').val();
           //alert(post_id);
           $.ajax({
               type : 'POST',
               data : {'action' : 'set_post_share', 'post_id': post_id},
               url : AJAX.url,
               success : function (output){
                  console.log(output);           
               },
               error: function () {
                alert('Có lỗi xảy ra, vui lòng thử lại');
               }
           });
    });

    /*comment ajax*/
    $('#cmt-btn-info').click(function(){
       var cmt_cid = $('#cmt-cid').val();
       var cmt_name = $('#cmt-name').val();
       var cmt_email = $('#cmt-email').val();
       var cmt_content = $('#cmt-content').val();
       //alert(post_id);
       if(cmt_name == '')
       {
            $('.name-warning').show();
            return false;
       }
       else{
         $('.name-warning').hide();
       }
       
       if(cmt_email == '')
       {
            $('.email-warning1').show();
            return false;
       }
       else if(ValidateEmail(cmt_email) == false)
       {
            $('.email-warning1').hide();
            $('.email-warning2').show();
            return false;
       }
       else{
            $('.email-warning2').hide();
            console.log(cmt_name);
            $.ajax({
            type : 'POST',
            data : {'action' : 'comment_process','post_id': cmt_cid, 'cmt_name': cmt_name, 'cmt_email': cmt_email, 'cmt_content': cmt_content},
            url : AJAX.url,
            success : function (result){
                console.log(result);
                $('.cmt_content').html(result);
                location.reload();
    			           
            },
            error: function () {
                console.log('Co loi xay ra');
            }
        });
       }
    });
    
});
function ValidateEmail(email)  
{  
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
    if(email.match(mailformat))  
    {  
        return true;  
    }  
    else  
    {   
        return false;  
    }  
} 

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
function deleteCookie(cname) {
    setCookie(cname, '', -1);
}

function getfullMonth(date) {
    var month = date.getMonth() + 1;
    return month < 10 ? '0' + month : month; // ('' + month) for string result
}
function getfullDay(date) {
    var day = date.getDate();
    return day < 10 ? '0' + day : day; // ('' + month) for string result
}
function getfullHour(date) {
    var hour = date.getHours();
    return hour < 10 ? '0' + hour : hour; // ('' + month) for string result
}
function getfullMinute(date) {
    var minute = date.getMinutes();
    return minute < 10 ? '0' + minute : minute; // ('' + month) for string result
}
function getfullSecond(date) {
    var second = date.getSeconds();
    return second < 10 ? '0' + second : second; // ('' + month) for string result
}
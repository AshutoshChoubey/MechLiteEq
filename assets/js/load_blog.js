$(document).ready(function(){$("#q").keypress(function(t){13==t.which&&($("#get-reference").html("1"),$("#load_data").html(""),$("#start_load_data_message").html("<img src='https://www.mechlitemachines.com/images/Rolling-1s-38px.gif' alt=' MECHLITE EQUIPMENTS Blogs'>"),i(3,0))});var t="https://www.mechlitemachines.com/",e=0,a="inactive";function i(e,i){var l=$("#get-reference").html(),s=$("#q").val();$.ajax({url:t+"loadBlog",method:"POST",data:{limit:e,start:i,ref:l,q:s},cache:!1,success:function(t){$("#start_load_data_message").html(""),$("#load_data").append(t),""==t?($("#load_data_message").html("<p>No More Data Found</p>"),a="active"):($("#load_data_message").html("<div align='center'><img src='http://www.mechlitemachines.com/images/Rolling-1s-38px.gif' alt='Blogs'></div>"),a="inactive")}})}"inactive"==a&&(a="active",i(3,e)),$(window).scroll(function(){$(window).scrollTop()+$(window).height()>$("#load_data").height()&&"inactive"==a&&(a="active",e+=3,setTimeout(function(){i(3,e)},1e3))})});
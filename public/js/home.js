
var notiContainer = $('#noti_container');
var notiToggle    = notiContainer.find('#m_topbar_notification_icon');
var notiWrapper   = notiContainer.find('#noti-wrapper');
var notiCountElem = notiToggle.find('#alarm_count');
var notiCount     = parseInt(notiCountElem.data('count'));
var notifications = notiWrapper.find('#noti-items');

if (notiCount <= 0) {
    notiCountElem.hide();
}

// Pusher.logToConsole = true;

var pusher = new Pusher('3160a5f3fdceecdae70d', {
    cluster: 'mt1',
    forceTLS: true
});

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('invite-channel');

// Bind a function to a Event (the full Laravel class)
channel.bind('invite-friend', function(data) {
    // alert(JSON.stringify(data));
    var currentUser = $("#current_user").val();
    // if(currentUser != data.friendName){
    //     return false;
    // }

    var existingNotifications = notifications.html();

    var newNotificationHtml = '<div class="m-list-timeline__item">';
    newNotificationHtml += '<span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>';
    newNotificationHtml += '<span class="m-list-timeline__text">';
    newNotificationHtml += '<div style="float:left;">';
    newNotificationHtml += '<img src="{!! url(/img/user.jpg) !!}}" style="width:42px;height:42px;">';
    newNotificationHtml += '</div><div style="float:left;padding-left:10px;">'; 
    newNotificationHtml += '<div> Received Friend Invitivation</div>';
    newNotificationHtml += '<div>from <span class="m-badge m-badge--success m-badge--wide" style="margin-right:5px">'+data.senderName+'</span> type: <span class="m-badge m-badge--info m-badge--wide"><i class="'+data.socialType+'"></i></span></div>';
    newNotificationHtml += '</div></span>';
    newNotificationHtml += '<span class="m-list-timeline__time">Just now</span>';
    newNotificationHtml += '</div>';


    notifications.html(newNotificationHtml + existingNotifications);

    notiCount += 1;
    notiCountElem.attr('data-count', notiCount);
    notiCountElem.text(notiCount);
    notiCountElem.show();
});
function sendRequest(url, data) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:url,
        type:"GET",
        data:data,
        success:function(response) {
            
            if(response) callAfter(response);
        },
        error:function(){
            // alert("error");
        }
      });
}
function callAfter(response) {
    console.log(response);
    var ctrl = response.ctrl;
    var result = response.result;
    switch(ctrl){
        case "get_location_info":
            if(result == "success"){
                if(response.info == "exist"){
                    alert("You added this user already!");
                    return false;
                }
                if(response.info == "disable") {
                    alert("You can't add the user on your globe");
                    return false;
                }
                var name = response.info.name;
                var lat  = response.info.lat;
                var lng  = response.info.lng;
                globe.addPin(lat,lng, name);
            }else{
                alert("error!");
            }
            break;
        case "clear":
            if(response.result == "success"){
                alert("clear all pins on your globe successfully.To see the result, please refresh page.");
            }
            break;
    }
}
$(function(){
   
    $(document).on("click", "#send_invite", function(e){    
        e.preventDefault();
        var friendName = $("#inviteForm input[name='friend_name']").val();
        var socialType = $("#inviteForm input[name='social-type']").val();

        var friendList = '';
        for(var i = 0; i < $("#friend_list option").length; i++){
            friendList += $("#friend_list option:eq("+i+")").attr('value') + ",";
        }

        if(friendName == ''){
            alert("Please Input Friend Name");
            return false;
        }
        if(socialType == ''){
            alert("Please Choose Social Type");
            return false;
        }
        var friendArray = friendList.split(',');
        console.log(friendArray);
        if(friendArray.indexOf(friendName) == -1){
            alert("Please Choose Registered User");
            return false;
        }
        var url = "invite";
        var data = $("#inviteForm").serialize();
        sendRequest(url,data);
        
        $('#btn-3').click();
    });
    $(document).on("click", ".social-box li",function(e){
        $(".social-box li").removeAttr('class');
        $(this).attr('class', "selected");

        $("#inviteForm input[name='social_type']").val($(this).find('i').attr('class'));
    });

    $(document).on("click", "#m_topbar_notification_icon",function(e){
        if($("#noti_container.m-dropdown--open").length == 1){
            $("#alarm_count").text('');
            $("#top_noti_count").text(notiCount+"New Notifications");
            $("#alarm_count").attr('data-count', 0);
            notiCount = 0;
            $("#alarm_count").hide();
        }
    });
    $(document).on("click", "#setting_save",function(e){
        e.preventDefault();
        var url = "setting";
        var data = $("#settingForm").serialize();
        sendRequest(url,data);
        $('#btn-4').click();
    });
    $(document).on("click", "#clear_map",function(e){
        e.preventDefault();
        var url = "clear";
        var data = {"userName":$("#current_user").val()};
        sendRequest(url,data);
    });
    $(document).on("change", "#setting_1, #setting_2",function(e){
        var id = $(this).attr('id');
        $("input[name='"+id+"']").val($("#"+id+":checked").length);
    });
})


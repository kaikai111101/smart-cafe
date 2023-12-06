
notifier = {
    primaryNotif: function(message) {
        const FROM = "top";
        const ALIGN = "right";
        const TIME =  5000;
    
        $.notify({
          icon: "tim-icons icon-bell-55",
          message: message
    
        }, {
        type: "primary",
        timer: TIME,
        placement: {
        from: FROM,
        align: ALIGN
        }
    });
    }
}
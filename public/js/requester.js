var Requester = (function(){
    function Requester(){


    }
    Requester.prototype.post = function(url,data,callback,token){

        if(token){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        $.post(baseUrl+url,data,function(data){
			callback(data);
		});
    }

    Requester.prototype.get = function(url,data,callback){

        
        $.get(baseUrl+url,data,function(data){
			callback(data);
		});
    }
    return Requester;
})();
var requester = new Requester();
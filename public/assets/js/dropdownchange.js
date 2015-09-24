/* Created by jankoatwarpspeed.com */

(function($) {
    $.fn.dropChange = function(options,callback) {
        options = $.extend({  
            parent:"parent",
            edit:false,
            editValue:null,
            submitButton: "", 
            child:[],
            chooseText:"--เลือก--"
        }, options); 
        
        var element = this;
        var parent = element[0].id;
        var child = options.child;

        if(options.editValue!=null)
            getResult(options.editValue);
        

        function getResult(value)
        {

            var result = [];
            $.each(child,function(key,c){
                $.getJSON(c.url+'?id='+value,function(data){

                    $("#"+c.name).empty().append('<option selected="selected" value="">'+options.chooseText+'</option>');
                    $.each(data,function(k,obj){

                        $("#"+c.name).append('<option value="'+obj[c.key]+'" ref= "'+obj[c.ref]+'" >'+obj[c.display]+'</option>');
                    });
                     
                    callback(element,data,options);
                });

            });
        }

        function bindElement() {
            $("#" + parent).bind("change", function(e) {
                //console.log(child)
                getResult(e.target.value);
                
            });

        }



        // this.onChange = function(callback) {
        //     callback();
        // };

        bindElement();
        return this;

    }

})(jQuery); 
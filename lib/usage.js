$(function() {
		   
	  
    	   
    $("#basic-combo").sexyCombo({triggerSelected: true});
	
		
	$.sexyCombo.deactivate("#basic-combo");
	$("#activate").bind("click", function() {
        $.sexyCombo.activate("#basic-combo");   								  
	});
    
    $("#empty-combo").sexyCombo({emptyText: "Choose a state..."});
    
    $("#autofill-combo").sexyCombo({autoFill: true});
    
    $("#selected-combo").sexyCombo({triggerSelected: true});
	

    
    $("#up-combo").sexyCombo();
    
    $("#filter-combo").sexyCombo({filterFn: function() {
        return true;
    }});
    
    $("#mixed-combo").sexyCombo({emptyText: "Choose a state", autoFill: true, skin: "custom"});
    
    var data = [];
    $("#selectbox").children().each(function() {
        var $this = $(this);
        data.push({value: $this.attr("value"), text: $this.text()});
    });
    
    $.sexyCombo.create({name: "static-combo", id: "static-combo", container: "#static-container", data: data});
    
    data[0].selected = true;
    $.sexyCombo.create({name: "static-selected-combo", id: "static-selected-combo", container: "#static-selected", data: data, triggerSelected: true});
    
    $.sexyCombo.create({name: "ajax-combo", id: "ajax-combo", container: "#ajax-container", url: "example.json"});
    
    $("#multiple-combo").sexyCombo();
    
    var logEvent = function(msg) {
		return;
        var $eventLogger = $("#event-logger");
	$eventLogger.html($eventLogger.html() + msg + "<br />");
    };
    
    $("#event-combo").sexyCombo({
       
	
	showListCallback: function() {
	    logEvent("Dropdown list appeared.");
	},
	
	hideListCallback: function() {
	    logEvent("Dropdown list disappeared.");
	},
	
	initCallback: function() {
	    logEvent("Initialization...");
	},
	
	initEventsCallback: function() {
	    logEvent("Events initialized.");
	},
	
	changeCallback: function() {
	    logEvent("Combo value is changed. Text input value is " + this.getTextValue() + ". Hidden input value is " + this.getHiddenValue());
	},
	
	textChangeCallback: function() {
	    logEvent("Text input's value is changed. Current value is " + this.getTextValue());
	}
    });
	
	


});
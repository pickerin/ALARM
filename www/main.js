$(document).ready(function() {
    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'popup';     
    
    //make username editable
    $('#sensors a').editable({
    	type: 'text',
    	name: 'name',
    	title: 'Enter sensor name',   
    	placement: 'right',
    	url: 'updateName.php'
    });
    
    //make switchType editable
    $('#switchType').editable({
        type: 'select',
        title: 'Select switch type',
        placement: 'right',
        source: [
            {value: 1, text: 'Alarm when Open'},
            {value: 2, text: 'Alarm when Closed'},
        ]
        ,url: 'updateType.php'
    });
    
    //make armed editable
    $('#armed').editable({
        type: 'select',
        title: 'Arm sensor?',
        placement: 'right',
        source: [
            {value: 1, text: 'True'},
            {value: 2, text: 'False'},
        ]
        ,url: 'updateArmed.php'
    });

    //make switchType editable
    $('#buzz').editable({
        type: 'select',
        title: 'Buzz when tripped?',
        placement: 'right',
        source: [
            {value: 1, text: 'True'},
            {value: 2, text: 'False'},
        ]
        ,url: 'updateBuzz.php'
    });
});
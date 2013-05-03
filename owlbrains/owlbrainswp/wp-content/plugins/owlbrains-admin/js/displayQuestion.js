        function displayQuestion()
{
     	//Get a reference to the form id="cakeform"
   
   	var theForm = document.forms["adminForm"];
    	//Get a reference to the cake the user Chooses name=selectedCake":
   	 var selectedRadio = $('input[name=radio_group]:checked', '#adminForm').val();
    	var selectedQuestion = $('#question'+selectedRadio).val();
	var selectedCost = $('#cost'+selectedRadio).val();
	var selectedUser = $('#user_id'+selectedRadio).val();
   

    //display the result for questionbox
    var divobj = document.getElementById('questionBox');
    divobj.style.display='block';
    divobj.innerHTML = "<label for='questionArea'><h3>Question?</h3></label><textarea name='questionArea' rows='10' cols='100'>" + selectedQuestion + "</textarea>";
    //display the result for costbox
    var divobj = document.getElementById('costBox');
    divobj.style.display='block';
    divobj.innerHTML = "<input type='text' name='costArea' value=" + selectedCost + ">" ;

	//display the result for costbox
    	var divobj = document.getElementById('user_idBox');
    	divobj.style.display='block';
    	divobj.innerHTML = "<input type='text' name='user_idArea' value=" + selectedUser + ">" ;
    
    

}

$(document).ready(function() {
    $('#adminTable').dataTable({
            "sPaginationType": "scrolling"
        } );
       
} );
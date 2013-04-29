

        function displayQuestion()
{
     //Get a reference to the form id="cakeform"
   
   var theForm = document.forms["adminForm"];
    //Get a reference to the cake the user Chooses name=selectedCake":
    var selectedRadio = $('input[name=radio_group]:checked', '#adminForm').val();
    var selectedQuestion = $('#question'+selectedRadio).val();
   // var selectedQuestion = document.getElementById('question'+selectedRadio).val();
 // var selectedQuestion = theForm.elements['#question'+selectedRadio];
    //var selectedQuestion = $('input[name="questionField"]')[selectedRadio].id.val();
    //alert(selectedRadio);

    //display the result
    var divobj = document.getElementById('questionBox');
    divobj.style.display='block';
    divobj.innerHTML = "<label for='questionArea'><h3>Question?</h3></label><textarea name='questionArea' rows='10' cols='100'>" + selectedQuestion + "</textarea>";
    //sets the cost value on myform
    //document.adminForm.cost.value = total_price;

}

$(document).ready(function() {
    $('#adminTable').dataTable({
            "sPaginationType": "scrolling"
        } );
       
} );

  $(document).ready(function() {
    $("#myform").validate({
       rules: {
     question:{
     required: true,

      minlength: 20
     }
   },
   messages: {
     question: "Please Ask A Question"
   }
submitHandler: function(form) {
                    $.post('http://owlbrains.com/owlbrainswp/wp-content/plugins/ob_database/formhtml.php', $("#myform").serialize(), function(data) {
$('#results').html(data);
});
    });
  });

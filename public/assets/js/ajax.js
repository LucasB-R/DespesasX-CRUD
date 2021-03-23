$(document).ready(function(){

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  pegaDado(page);
 });

 

 function pegaDado(page)
 {
  $.ajax({
   url:"/ajax/dadosTabela?page="+page,
   success:function(data)
   {
    $('#dados').html(data);
   }
  });
 }
 
});
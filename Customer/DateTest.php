
<script>
const redDates = ['2023-01-16','2018-03-26'];
$('input').change(function() {

  $(this).removeClass('holiday');
  if(redDates.indexOf($(this).val()) != -1)
    $(this).addClass('holiday');

})

</script>
<style>
.holiday {
color: red;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<input type="date">

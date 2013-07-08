$(document).ready(function (){
  $('#edit-sort-option').change(function (){
    $(this).parents('form').find('input.form-submit').trigger('click');
  });
});

$(document).ready(function () {
  /**
   * A function to insert player details in Database.
   */
  $("#submit").click(function () {
    $.ajax({
      url: "ajax-insert.php",
      type: "POST",
      data: {
        fullname: $('#fName').val(),
        ball: $('#ball').val(),
        run: $('#run').val(),
      },
      success: function (response) {
        // location.reload();
        $("#table-data").append(response);
      },
    });
    /**
     * This ajax call required for show player's data in tabular form when admin
     * is logged in and Strike rate won't be shown.
     */
    $.ajax({
      url: "ajax-show.php",
      type: "POST",
      data: {
      },
      success: function (response) {
        console.log(response);
        $("#table-data").append(response);
      },
    });
  });
  /**
   * Function required for showing all details to a annonymous user.
   */
  $("#board").click (function (){
    $.ajax({
      url: "ajax-show-user.php",
      type: "POST",
      data: {
      },
      success: function (response) {
        $('#board').hide();
        $(".display").append(response);
      },
    });
  })
  /**
   *  Function required for showing man of the match in form of a div on basis
   * of highest strike-rate.
   */
  $("#mom").click(function () {
    $.ajax({
      url: "ajax-mom.php",
      type: "POST",
      data: {
      },
      success: function (response) {

        $(".manofthematch").html(response);
      },
    });
  })
});

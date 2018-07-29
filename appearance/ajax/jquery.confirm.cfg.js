$(document).ready(function () {
  $.confirm.options = {
    text: "Sunteți sigur(ă)?",
    title: "",
    confirmButton: "Da, sunt",
    cancelButton: "Anulare",
    post: false,
    submitForm: false,
    confirmButtonClass: "btn-danger",
    cancelButtonClass: "btn-default",
    dialogClass: "modal-dialog"
  }

  $(".btnDelAnalyzes").on("click", function (event) {
    var clickeda = $(this);
    $.confirm({
      text: "Doriți să ștergeți elementul selectat? <br>Element: <b>" + $(clickeda).parent().parent('li').text() + "</b>.",
      title: "Confirmați ștergerea?",
      confirm: function (button) {
        $.ajax({
          type: 'POST',
          url: '/eCabCardio/admin/analyzes/delete',
          dataType: "JSON",
          data: {
            'id_analyze': $(clickeda).data("analyze")
          },
          success: function (data) { 
            window.location.href = '/eCabCardio/admin/analyzes';
          },
          error: function (data) { 
            alert("EROARE!");
          }
        });
      },
      cancel: function (button) { },
      confirmButton: "Da, șterg",
      cancelButton: "Nu șterg",
      post: true
    });
  });

  $(".btnDelInvestigations").on("click", function (event) {
    var clickedi = $(this);
    $.confirm({
      text: "Doriți să ștergeți elementul selectat? <br>Element: <b>" + $(clickedi).parent().parent('li').text() + "</b>.",
      title: "Confirmați ștergerea?",
      confirm: function (button) {
        $.ajax({
          type: 'POST',
          url: '/eCabCardio/admin/investigations/delete',
          dataType: "JSON",
          data: {
            'id_investigations': $(clickedi).data("investigation")
          },
          success: function (data) {
            window.location.href = '/eCabCardio/admin/investigations';
          },
          error: function (data) {
            alert("Eroare");
          }
        });
      },
      cancel: function (button) { },
      confirmButton: "Da, șterg",
      cancelButton: "Nu șterg",
      post: true
    });
  });

  $(".btnDelEmployees").on("click", function (event) {
    var clickede = $(this);
    $.confirm({
      text: "Doriți să ștergeți angajatul selectat? <br>Element: <b>" + $(clickede).parent().parent('li').text() + "</b>.",
      title: "Confirmați ștergerea?",
      confirm: function (button) {
        $.ajax({
          type: 'POST',
          url: '/eCabCardio/admin/employee/delete',
          dataType: "JSON",
          data: {
            'id_employee': $(clickede).data("employee")
          },
          success: function (data) {
            window.location.href = '/eCabCardio/admin';
          },
          error: function (data) {
            alert("Eroare");
          }
        });
      },
      cancel: function (button) { },
      confirmButton: "Da, șterg",
      cancelButton: "Nu șterg",
      post: true
    });
  });

});
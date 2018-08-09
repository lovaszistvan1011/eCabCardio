$(document).ready(function () {
//  $('#summernote').summernote();
//  $('.summernote').summernote({
//    airMode: true
//  });
  var idConsultSelected = +$('input[name="id_consult"]').val();
  $('#consultfrm_medical_letter').on('click', function (e) {
    window.open(
            '/eCabCardio/consult/letter/' + idConsultSelected, 'eCabCardio - Scrisoare medicală',
            'width=800, height=1600, scrollbars=yes,channelmode=yes, menubar=no, location=no, resizeable=no, status=no, toolbar=no');
  });
  $('#consultForm').on('submit', function (e) {
    e.preventDefault();
    var idPatient = +$('input[name="id_patient"]').val();
    if (idPatient > '0') {
      var investigationsArr = $('input[name="investigations[]"]:checked').map(function () {
        return $(this).val();
      }).get();
      var analyzesArr = $('input[name="analyzes[]"]:checked').map(function () {
        return $(this).val();
      }).get();
      $.ajax({
        type: 'POST',
        url: '/eCabCardio/consult/save',
        dataType: "JSON",
        data: {
          "id_consult": idConsultSelected,
          "id_patient": idPatient,
          "physiological_antecedents": $('#consultfrm_physiological_antecedents').val(),
          "pathological_antecedents": $('#consultfrm_pathological_antecedents').val(),
          "hetero_collateral_antecedents": $('#consultfrm_hetero_collateral_antecedents').val(),
          "medium_conditions": $('#consultfrm_medium_conditions').val(),
          "present_status": $('#consultfrm_present_status').val(),
          "vascular_apparatus": $('#consultfrm_vascular_apparatus').val(),
          "local_complementary_exams": $('#consultfrm_local_complementary_exams').val(),
          "personal_antecedents": $('#consultfrm_personal_antecedents').val(),
          "consult_reasons": $('#consultfrm_consult_reasons').val(),
          "remarks": $('#consultfrm_remarks').val(),
          "diagnostic": $('#consultfrm_diagnostic').val(),
          "recommendations": $('#consultfrm_recommendations').val(),
          "treatment": $('#consultfrm_treatment').val(),
          "investigations[]": investigationsArr,
          "analyzes[]": analyzesArr
        },
        success: function (data) {
          if (data.status === 'ok') {
            window.location.href = '/eCabCardio/consult/view/' + data.liid;
          } else {
            alert("EȘEC! Date NU au fost salvate!");
          }
        },
        error: function (data) {
          alert("NU FUNCȚIONEAZĂ NIMIC!\n\n" + data.result);
          console.log(data);
        }
      });
    } else {
      alert("`id_patient` NU TREBUIE să vie egal cu 0");
    }
  });

  $('#btnSaveLetter').on('click', function (e) {
    e.preventDefault();
    var letterIdConsult = $('input[name="id_consult"]').val();
    var letterIdEmployee = $('input[name="id_employee"]').val();
    var letterContent = $('div.qEditor').html();
    alert(
            "Trimite datele:\n" +
            "\n\nconsult=" + letterIdConsult +
            "\n\nangajat=" + letterIdEmployee +
            "\n\nscrisoare: " + letterContent
            );
    $.ajax({
      type: 'POST',
      url: '/eCabCardio/consult/letter/save',
      dataType: "JSON",
      data: {
        "id_consult": letterIdConsult,
        "id_employee": letterIdEmployee,
        "content": letterContent
      }
      ,
      success: function (data) {
        window.location.href = '/eCabCardio/consult/letter/view/' + letterIdConsult + '/' + letterIdEmployee;
      },
      error: function (data) {

      }
    }); // end of Ajax post
    console.log(letterContent);

  });
});
  
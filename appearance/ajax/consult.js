$(document).ready(function () {
  $('#consultfrm_medical_letter').on('click', function (e) {
    window.open(
            '/eCabCardio/consult/letter/1', 
    'eCabCardio - Scrisoare medicală', 
    '\
width=800, \n\
height=1600, \n\
scrollbars=yes, \n\
channelmode=yes, \n\
menubar=no, \n\
location=no, \n\
resizeable=no, \n\
status=no, \n\
toolbar=no \n\
');
  });
  $('#consultForm').on('submit', function (e) {
    e.preventDefault();
    var idPatient = +$('input[name="id_patient"]').val();
    if (idPatient > '0') {
      var investigationsArr = $('input[name="investigations[]"]').map(function () {
        return $(this).val();
      }).get();
      var analyzesArr = $('input[name="analyzes[]"]').map(function () {
        return $(this).val();
      }).get();
      $.ajax({
        type: 'POST',
        url: '/eCabCardio/consult/save',
        dataType: "JSON",
        data: {
          "id_consult": +$('input[name="id_consult"]').val(),
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
});
  
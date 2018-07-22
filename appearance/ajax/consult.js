$(document).ready(function () {
  $('#consultForm').on('submit', function (e) {
    e.preventDefault();
    if ($('input[name="id_patient"]').val() > 0) {
      var investigationsArr = $('input[name="investigations[]"]').map(function () {
        return $(this).val();
      }).get();
      var analyzesArr = $('input[name="analyzes[]"]').map(function () {
        return $(this).val();
      }).get();
      $.ajax({
        type: 'POST',
        url: '/ecabcardio/consult/save/',
        dataType: "JSON",
        data: {
          "Id_consult": $('input[name="id_consult"]').val(),
          "Id_patient": $('input[name="id_patient"]').val(),
          "PhysiologicalAntecedents": $('#consultFormPhysiologicalAntecedents').val(),
          "PathologicalAntecedents": $('#consultFormPathologicalAntecedents').val(),
          "HeteroCollateralAntecedents": $('#consultFormHeteroCollateralAntecedents').val(),
          "MediumConditions": $('#consultFormMediumConditions').val(),
          "PresentStatus": $('#consultFormPresentStatus').val(),
          "VascularAparatus": $('#consultFormVascularAparatus').val(),
          "LocalComplementaryExams": $('#consultFormLocalComplementaryExams').val(),
          "PersonalAntecedents": $('#consultFormPersonalAntecedents').val(),
          "ConsultReasons": $('#consultFormConsultReasons').val(),
          "Remarks": $('#consultFormRemarks').val(),
          "Diagnostic": $('#consultFormDiagnostic').val(),
          "Recommendations": $('#consultFormRecommendations').val(),
          "Treatment": $('#consultFormTreatment').val(),
          "investigations[]": investigationsArr,
          "analyzes[]": analyzesArr
        },
        success: function (data) {
          if (data.status === 'ok') {
            alert("SUCCES! Datele au fost salvate!");
            window.location.href = '/ecabcardio/consult/view/' + data.liid;
//            $('#findUserStatus').html("Salut <b>" + data.result[0].firstName + " " + data.result[0].lastName + "</b>");
//            $('#userRegister').hide();
//            $('#userAuthentify').show();
//            $('input[name="selectedRoute"]').val($('input[name=selectRoute]:checked').val());
//            $('input[name="userId"]').val(data.result[0].id);
          } else {
            alert("EȘEC! Date NU au fost salvate!");
//            $('#userAuthentify').hide();
//            $('#findUserStatus').html("Se pare că nu ne cunoaștem!");
//            $('#userRegister').html("<button id=\"userRegister\" name=\"userRegister\" class=\"btn btn-primary tm-btn tm-btn-search text-uppercase\" onClick=\"location.href='/client/register'\">Crează un cont!</button>");
//            $('#userRegister').show();
          }
        },
        error: function (data) {
          alert("NU FUNCȚIONEAZĂ NIMIC!");
//          $('#findUserStatus').html("Cred că nu pnea ne cunoaștem!");
        }
      });
    } else {
      alert("`id_patient` NU TREBUIE să vie egal cu 0");
//      $('#findUserStatus').html("");
    }
  });
});
  
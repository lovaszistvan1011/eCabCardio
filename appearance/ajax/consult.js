$(document).ready(function () {
  $('#consultForm').on('submit', function (e) {
    e.preventDefault();
    if ($('#consultFormPhysiologicalAntecedents').val().length > 5) {

      var investigationsArr = $('input[name="investigations[]"]').map(function () {
        return $(this).val();
      }).get();
      var analyzesArr = $('input[name="analyzes[]"]').map(function () {
        return $(this).val();
      }).get();
//var investigationsArr = $('input[name="investigations"]:checkbox:checked.name').map(function() { return this.value; }).get().join();
//        var analyzesArr = $('input[name="analyzes"]:checkbox:checked.name').map(function() { return this.value; }).get().join();

//        var investigationsArr = new Array();
//        var analyzesArr = new Array();
//        $('input[name="investigations[]"]:checked').val().each(function () {
//        investigationsArr.push(parseInt($(this).val()));
//      });
//      $('input[name="analyzes[]"]:checked').val().val().each(function () {
//        analyzesArr.push(parseInt($(this).val()));
//      });
      $.ajax({
        type: 'POST',
        url: '/ecabcardio/consult/save/',
        dataType: "JSON",
        data: {
          "id_consult": $('input[name="id_consult"]').val(),
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
//            $('#findUserStatus').html("Salut <b>" + data.result[0].firstName + " " + data.result[0].lastName + "</b>");
//            $('#userRegister').hide();
//            $('#userAuthentify').show();
//            $('input[name="selectedRoute"]').val($('input[name=selectRoute]:checked').val());
//            $('input[name="userId"]').val(data.result[0].id);
          } else {
//            $('#userAuthentify').hide();
//            $('#findUserStatus').html("Se pare că nu ne cunoaștem!");
//            $('#userRegister').html("<button id=\"userRegister\" name=\"userRegister\" class=\"btn btn-primary tm-btn tm-btn-search text-uppercase\" onClick=\"location.href='/client/register'\">Crează un cont!</button>");
//            $('#userRegister').show();
          }
        },
        error: function (data) {
          $('#findUserStatus').html("Cred că nu pnea ne cunoaștem!");
        }
      });
    } else {
      $('#findUserStatus').html("");
    }
  });
});
  
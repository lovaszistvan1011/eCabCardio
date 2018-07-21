<div id="consultForm" class="util-full-width">
  <form action="/ecabcardio/consult/save" method="post">
    <input type="hidden" name="id_consult" value="">
    <div class="form-group">
      <label for="consultFormPhysiologicalAntecedents "></label>
      <textarea id="consultFormPhysiologicalAntecedents" name="PhysiologicalAntecedents" placeholder="Antecedente fizice" class="util-full-width textarea"></textarea>
    </div>
    <div class="form-group">
      <label for="consultFormPathologicalAntecedents"></label>
      <textarea id="consultFormPathologicalAntecedents" name="PathologicalAntecedents" placeholder="Antecedente patologice" class="util-full-width textarea"></textarea>
    </div>
    <div class="form-group">
      <label for="consultFormHeteroCollateralAntecedents"></label>
      <textarea id="consultFormHeteroCollateralAntecedents" name="HeteroCollateralAntecedents" placeholder="Antecedente hetero-coaterale" class="util-full-width textarea"></textarea>
    </div>
    <div class="form-group">
      <label for="consultFormMediumConditions"></label>
      <textarea id="consultFormMediumConditions" name="MediumConditions" placeholder="Condiții de mediu" class="util-full-width textarea"></textarea>
    </div>
    <div class="form-group">
      <label for="consultFormPresentStatus"></label>
      <textarea id="consultFormPresentStatus" name="PresentStatus" placeholder="Starea prezentă" class="util-full-width textarea"></textarea>
    </div>
    <div class="form-group">
      <label for="consultFormVascularAparatus"></label>
      <textarea id="consultFormVascularAparatus" name="VascularAparatus" placeholder="Status personal" class="util-full-width textarea"></textarea>
    </div>
    <div class="form-group">
      <label for="consultFormLocalComplementaryExams"></label>
      <textarea id="consultFormLocalComplementaryExams" name="LocalComplementaryExams" placeholder="Examen complementar local" class="util-full-width textarea"></textarea>
    </div>
    <div class="form-group">
      <label for="consultFormPersonalAntecedents"></label>
      <textarea id="consultFormPersonalAntecedents" name="PersonalAntecedents" placeholder="Antecedente personale" class="util-full-width textarea"></textarea>
    </div>
    <div class="form-group">
      <label for="consultFormConsultReasons"></label>
      <textarea id="consultFormConsultReasons" name="ConsultReasons" placeholder="Motivul consultului" class="util-full-width textarea"></textarea>
    </div>
    <div class="form-group">
      <label for="consultFormRemarks"></label>
      <textarea id="consultFormRemarks" name="Remarks" placeholder="Observații" class="util-full-width textarea"></textarea>
    </div>
    <div class="form-group">
      <label for="consultFormDiagnostic"></label>
      <textarea id="consultFormDiagnostic" name="Diagnostic" placeholder="Diagnostic" class="util-full-width textarea"></textarea>
    </div>
    <div class="form-group">
      <label for="consultFormRecommendations"></label>
      <textarea id="consultFormRecommendations" name="Recommendations" placeholder="Recomandări" class="util-full-width textarea"></textarea>
    </div>
    <div class="form-group">
      <label for="consultFormTreatment"></label>
      <textarea id="consultFormTreatment" name="Treatment" placeholder="Tratament" class="util-full-width textarea"></textarea>
    </div>
    <!--    <div class="form-group">
          <label for="consultFormDate"></label>
          <input type="date" id="consultFormDate" name="Date" placeholder=""/>
        </div>-->
    <div class="row">
      <div class="col-md-6 col-sm-6 form-group">
        <h5>Investigații efectuate</h5>
        <?php echo $investigationsList; ?>
      </div>
      <div class="col-md-6 col-sm-6 form-group">
        <h5>Analize recomandate</h5>
        <?php echo $analizesList; ?>
      </div>
      <p>&nbsp;</p>
    </div>
    <div class="form-group">
      <button id="consultFormMedicaLetter" name="medicalLetter" type="button">Scrisoare medicală</button> 
      <button id="consultFormSubmit" name="submit" type="submit">Salvează consult</button>
    </div>

  </form>
</div>
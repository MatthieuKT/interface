<?php

if (isset($_GET['code']) && isset($_GET['id'])) {
  $code= htmlspecialchars($_GET['code']);
  $id= htmlspecialchars($_GET['id']);
}

?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier <?php echo $id; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="newNom" class="col-form-label">nom: </label>
            <input type="text" class="form-control" id="newNom">
          </div>
          <div class="form-group">
            <label for="newPrenom" class="col-form-label">Prénom: :</label>
            <input type="text" class="form-control" id="newPrenom">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
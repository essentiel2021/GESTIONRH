<div class="row p-4 pt-5">
  <div class="col-md-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i>Formulaire d'édition de compte</h3>
      </div>
      <form role="form" wire:submit.prevent="updateUser()">
        <div class="card-body">
          <div class="d-flex">
            <div class="form-group flex-grow-1 mr-2">
              <label for="name">Nom</label>
              <input type="text" class="form-control @error('editUser.name') is-invalid @enderror" wire:model="editUser.name" id="name"  placeholder="Entrez votre nom">
                @error("editUser.name")
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group flex-grow-1">
              <label for="lastName">Prénom</label>
              <input type="text" class="form-control @error('editUser.lastName') is-invalid @enderror" wire:model='editUser.lastName' id="lastName" placeholder="Entrez votre nom">
              @error("editUser.lastName")
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="">Sexe</label>
            <select class="form-control @error('editUser.sexe') is-invalid @enderror" wire:model="editUser.sexe">
              <option value="">--------------</option>
              <option value="M">Homme</option>
              <option value="F">Femme</option>
            </select>
            @error("editUser.sexe")
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control @error('editUser.email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email" wire:model="editUser.email">
            @error("editUser.email")
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Modifier</button>
          <button type="button" wire:click='goToListUser()' class="btn btn-danger">Retour à la liste des comptes </button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-key fa-2x"></i> Réinitialisation de mot de passe</h3>
          </div>
          <div class="card-body"></div>
        </div>
      </div>
      <div class="col-md-12 mt-4">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"> <i class="fas fa-fingerprint fa-2x"></i> Rôles & Permissions</h3>
          </div>
          <div class="card-body"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 5000
                }
            )
    })
</script>
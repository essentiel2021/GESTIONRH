<div class="row p-4 pt-5">
             <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i>Formulaire de création de compte</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom">
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="lastName">Prénom</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Entrez votre nom">
                        </div>
                    </div>
                   <div class="form-group">
                    <label for="">Sexe</label>
                    <select class="form-control">
                        <option value="">--------------</option>
                        <option value="M">Homme</option>
                        <option value="F">Femme</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" disabled placeholder="Entrez le Mot de passe">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Créer</button>
                  <button type="button" wire:click='goToListUser()' class="btn btn-danger">Retour à la liste des comptes </button>
                </div>
              </form>
            </div>
            <!-- /.card -->
</div>
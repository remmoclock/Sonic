
    <div class="container my-4">
        <a href="characterAdd" class="btn btn-success float-right">Ajouter</a>
        <h2>Type des personnages</h2>
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    
                </tr>
            </thead>
            <tbody>
           
                <?php foreach($listType as $type) : ?>
                    
                <tr>
                    <th scope="row"><?= $type->getId() ?></th>
                    <td><h3><?= $type->getName()?></h3></td>
                    


                    <td class="text-right">
                        <a href="" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Oui, je veux supprimer</a>
                                <a class="dropdown-item" href="#" data-toggle="dropdown">Oups !</a>
                            </div>
                        </div>
                    </td>
                </tr>
                
                </tr>
                <?php endforeach; ?>


<a href="<?= $router->generate('characters-characters') ?>" class="btn btn-success float-right">Retour</a>
        <h2>Ajouter un personnage</h2>
        
        <form action="" method="POST" class="mt-5"> 
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nom du personnage">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Description" 
                    aria-describedby="descriptionHelpBlock">
                <small id="subtitleHelpBlock" class="form-text text-muted">
                    La description du personnage
                </small>
            </div>
            <div class="form-group">
                <label for="picture">Image</label>
                <input type="text" class="form-control" name="picture" id="picture" placeholder="image jpg, gif, svg, png" aria-describedby="pictureHelpBlock">
                <small id="pictureHelpBlock" class="form-text text-muted">
                    URL relative d'une image (jpg, gif, svg ou png) fournie sur 
                    <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
                </small>
            </div>
            
    
           
            <div class="form-group">
                <label for="category">Type</label>
                <select class="custom-select" name="category" id="category" aria-describedby="categoryHelpBlock">
                   <?php foreach($listType as $type) : ?>
                    <option value="<?= $type->getId() ?>"><?= $type->getName() ?></option>
                    <?php endforeach ; ?>
                </select>
                <small id="categoryHelpBlock" class="form-text text-muted">
                    Le type de personnage
                </small>
            </div>
           
        
            
            <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
        </form>
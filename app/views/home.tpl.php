<section>
    <div class="container-fluid">


      <!-- PREMIERE LIGNE -->
      <div class="row mx-0">

        <?php for($i = 0; $i < 2; $i++) : ?>

          <div class="col-md-6">
            <div class="card border-0 text-white text-center"><img src="<?= $absoluteURL ?>/<?= $viewData['categoriesHomeOrder'][$i]->getPicture() ?>"
                alt="Card image" class="card-img">
              <div class="card-img-overlay d-flex align-items-center">
                <div class="w-100 py-3">
                  <h2 class="display-3 font-weight-bold mb-4"><?= $viewData['categoriesHomeOrder'][$i]->getName() ?></h2><a href="<?= $router->generate('catalog-category', ['id' => $viewData['categoriesHomeOrder'][$i]->getId()]) ?>" class="btn btn-light"><?= $viewData['categoriesHomeOrder'][$i]->getSubtitle() ?></a>
                </div>
              </div>
            </div>
          </div>

        <?php endfor; ?>

      </div>


      <!-- DEUXIEME LIGNE -->
      <div class="row mx-0">
          
        <?php for($i = 2; $i < 5; $i++) : ?>

          <div class="col-lg-4">
            <div class="card border-0 text-center text-white"><img src="<?= $absoluteURL ?>/<?= $viewData['categoriesHomeOrder'][$i]->getPicture() ?>"
                alt="Card image" class="card-img">
              <div class="card-img-overlay d-flex align-items-center">
                <div class="w-100">
                  <h2 class="display-4 mb-4"><?= $viewData['categoriesHomeOrder'][$i]->getName() ?></h2><a href="<?= $router->generate('catalog-category', ['id' => $viewData['categoriesHomeOrder'][$i]->getId()]) ?>" class="btn btn-link text-white"><?= $viewData['categoriesHomeOrder'][$i]->getSubtitle() ?>
                    <i class="fa-arrow-right fa ml-2"></i></a>
                </div>
              </div>
            </div>
          </div>

        <?php endfor; ?>
      </div>




    </div>
  </section>

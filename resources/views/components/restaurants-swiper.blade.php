<section class="py-5 overflow-hidden">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="section-header d-flex flex-wrap justify-content-between mb-5">

            <h2 class="section-title">Nouveau restaurants</h2>

            <div class="d-flex align-items-center">
              <a href="#" class="btn-link text-decoration-none">Voir tous les restaurants →</a>
              <div class="swiper-buttons">
                <button class="swiper-prev brand-carousel-prev btn btn-yellow">❮</button>
                <button class="swiper-next brand-carousel-next btn btn-yellow">❯</button>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-md-12">

          <div class="brand-carousel swiper">
            <div class="swiper-wrapper">

              @foreach ($restaurants as $restaurant )
                  . <a href="{{ route("restaurants.show",$restaurant->id) }}" class="swiper-slide">
                      <div class="card mb-3 p-3 rounded-4 shadow border-0">
                      <div class="row g-0">
                          <div class="col-md-4">
                          <img src="{{ $restaurant->image_url }}" class="img-fluid rounded" alt="Card title">
                          </div>
                          <div class="col-md-8">
                          <div class="card-body py-0">
                              <p class="text-muted mb-0">{{ $restaurant->name }}</p>
                              <h5 class="card-title">{{ $restaurant->description }}</h5>
                          </div>
                          </div>
                      </div>
                      </div>
                    </a>
              @endforeach



            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

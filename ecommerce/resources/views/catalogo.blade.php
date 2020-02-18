@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/catalogo.css')}}" />
@endsection

@section("title", "Catalogo")

@section("main")
  <section class="products__container">
      <h1>Catalogo</h1>
      <article class="product__card">
        <figure>
          <img src="img/1.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Samsung Galaxy A8</h3>
          <p class="product__price">$20.999</p>
          <a href="/detalle-producto" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>
      <article class="product__card">
        <figure>
          <img src="img/2.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Xiamoi Note 3</h3>
          <p class="product__price">$18.999</p>
          <a href="/detalle-producto" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>

      <article class="product__card">
        <figure>
          <img src="img/3.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Google Pixel 2</h3>
          <p class="product__price">
            $25.999
          </p>
          <a href="/detalle-producto" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>

      <article class="product__card">
        <figure>
          <img src="img/4.webp" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Moto E6 Plus</h3>
          <p class="product__price">
            $15.999
          </p>
          <a href="/detalle-producto" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>

      <article class="product__card">
        <figure>
          <img src="img/4.webp" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Moto E6 Plus</h3>
          <p class="product__price">
            $15.999
          </p>
          <a href="/detalle-producto" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>

      <article class="product__card">
        <figure>
          <img src="img/4.webp" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Moto E6 Plus</h3>
          <p class="product__price">
            $15.999
          </p>
          <a href="/detalle-producto" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>

      <article class="product__card">
        <figure>
          <img src="img/4.webp" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Moto E6 Plus</h3>
          <p class="product__price">
            $15.999
          </p>
          <a href="/detalle-producto" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>

      <article class="product__card">
        <figure>
          <img src="img/4.webp" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Moto E6 Plus</h3>
          <p class="product__price">
            $15.999
          </p>
          <a href="/detalle-producto" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>
      <article class="product__card">
        <figure>
          <img src="img/1.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Samsung Galaxy A8</h3>
          <p class="product__price">$20.999</p>
          <a href="/detalle-producto" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>
      <article class="product__card">
        <figure>
          <img src="img/1.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Samsung Galaxy A8</h3>
          <p class="product__price">$20.999</p>
          <a href="/detalle-producto" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>
      <article class="product__card">
        <figure>
          <img src="img/1.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Samsung Galaxy A8</h3>
          <p class="product__price">$20.999</p>
          <a href="/detalle-producto" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>
      <article class="product__card">
        <figure>
          <img src="img/1.png" width="100" alt="" class="product__img" />
        </figure>
        <div class="product__info">
          <h3 class="product__name">Samsung Galaxy A8</h3>
          <p class="product__price">$20.999</p>
          <a href="/detalle-producto" class="product__link-details"
            >Ver más</a
          >
        </div>
      </article>
  </section>
@endsection
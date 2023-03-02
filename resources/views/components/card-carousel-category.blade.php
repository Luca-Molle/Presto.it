<div class="col-3 mt-5 d-flex card-custom  " style="width: 18rem">
    <div class="card text-center maincolor text-white mb-3 category-card shadow">
        <div class="card-body">
            <h5 class="card-title category-logo ">{{ $category->name }}</h5>
            </h5>
            <p class="card-text">Compra e vendi qualisasi tipo di oggetto</p>
            <a href="{{ route('categoryShow', $category)  }}" class="btn btn-presto border">Esplora</a>
        </div>
    </div>
</div>
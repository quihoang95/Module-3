<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link btn btn-info" style="color: white" href="{{route('product.create')}}"> + Thêm mới</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="#">
            @csrf
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Nhập nội dung tìm kiếm" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm Kiếm</button>
        </form>
    </div>
</nav>

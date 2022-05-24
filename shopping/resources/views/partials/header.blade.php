<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Tìm kiếm -->
    <form class="form-inline" method="get" action="{{route('product.search')}}">
        <div class="form-group mx-sm-2 mb-2">
            <input type="text"
                   name="product_id"
                   class="form-control"
                   placeholder="Nhập id sản phẩm"
                   value="{{request()->product_id}}">
        </div>

        <div class="form-group mx-sm-2 mb-2">
            <input type="text"
                   name="name"
                   class="form-control"
                   placeholder="Nhập tên sản phẩm"
                   value="{{request()->name}}">
        </div>

        <div class="form-group mx-sm-2 mb-2">
            <select class="form-control" name="category_id">
                <option value="">Chọn danh mục sản phẩm</option>
                {!! $htmlOptionSearchHeader !!}
            </select>
        </div>

        <button type="submit" class="btn btn-primary mb-2 ml-2">Tìm kiếm</button>
    </form>
    <a href="{{route('admin.logout')}}" style="margin-left: 400px;">Đăng xuất</a>

</nav>


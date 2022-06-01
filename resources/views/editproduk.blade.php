@include('layouts.admin')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Canteen Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Canteen Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Canteen Produk</h3>
              </div>
              <div>

<form role="form" action="{{route('produk.update',$update->id)}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group">
    <label for="name">Judul:</label>
    <input type="name" name="name" class="form-control" id="name" value="{{$update->name}}">
  </div>
  <div class="form-group">
    <label for="harga">Harga:</label>
    <input type="harga" name="harga" class="form-control" id="harga"  value="{{$update->harga}}">
  </div>
  <div class="form-group">
    <label for="pwd">Deskripsi</label>
    <input type="text" name="deskripsi" class="form-control" id="deskripsi"  value="{{$update->deskripsi}}">
  </div>
  <div class="form-group">
    <label for="Gambar">Gambar:</label>
    <input class="form-control" id="formFileMultiple"  name="image" type="file" id="formFileMultiple"  value="{{$update->image}}">
  </div>


  
  <button type="submit"  class="btn btn-primary">Edit</button>
  <a href="{{url('produk ')}}" class="btn btn-primary">Back</a>
</form>
</div>



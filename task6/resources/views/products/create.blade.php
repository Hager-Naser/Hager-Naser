@extends('layouts.parent')
@section('title' , 'Create Product')
@section('content')
<div class="col-12">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-4">
                <label for="name_en">Name (EN)</label>
                <input type="text" name="name_en" id="name_en" class="form-control">
            </div>
            <div class="col-4">
                <label for="name_ar">Name (AR)</label>
                <input type="text" name="name_ar" id="name_ar" class="form-control">
            </div>
            <div class="col-4">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>
            <div class="col-4">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control">
            </div>
            <div class="col-4">
                <label for="code">Code</label>
                <input type="number" name="code" id="code" class="form-control">
            </div>
            <div class="col-4">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Not Active</option>
                </select>
            </div>
            <div class="col-6">
                <label for="brand_id">Brand</label>
                <select name="brand_id" id="brand_id" class="form-control">
                    <option value=""></option>
                </select>
            </div>
            <div class="col-6">
                <label for="subcategory_id">Subcategory</label>
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                    <option value=""></option>
                </select>
            </div>
            <div class="col-6">
                <label for="details_en">Details (EN)</label>
                <textarea name="details_en" id="details_en" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="col-6">
                <label for="details_ar">Details (AR)</label>
                <textarea name="details_ar" id="details_ar" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="col-4">
                <label for="file">
                    <img class="w-25" style="cursor:pointer" src="{{asset('images\arrow.png')}}" alt="Upload"
                        id="image">
                </label>
                <input type="file" name="image" id="file" class="d-none" onchange="loadFile(event)">
            </div>
            <div class="col-12 ">
                <button class="btn btn-primary btn-sm"> Create </button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('js')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection

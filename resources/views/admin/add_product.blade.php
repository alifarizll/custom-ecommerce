<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        .div_deg 
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }
        input[type="text"]
        {
            width: 350px;
            height: 50px;
        }
        h1 {
            color: white;
        }

        label {
            display: inline-block;
            width: 200px;
            font-size: 18px !important;
            color: white !important;
        }

        textarea {
            width: 350px;
            height: 100px;
        }

        .input_deg {
            padding: 15px;
        }

    </style>

  </head>
  <body>
    
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <h1>Add Product</h1>

            <div class="div_deg">

            <form id="uploadForm" action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="input_deg">
                <label for="">Product Title</label>
                <input type="text" name="title" id="" required>
            </div>

            <div class="input_deg">
                <label for="">Description</label>
                <textarea name="description" id="" required></textarea>
            </div>

            <div class="input_deg">
                <label for="">Price</label>
                <input type="number" name="price" id="" required>
            </div>

            <div class="input_deg">
                <label for="">Quantity</label>
                <input type="number" name="qty" id="" required>
            </div>

            <div class="input_deg">
                <label for="">Product Category</label>
                <select name="category" id="" required>
                    <option value="">Select an Option</option>
                    @foreach($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input_deg">
                <label for="">Product Image</label>
                <input type="file" name="image" id="" >
            </div>

            <div class="input_deg">
                <input class="btn btn-success" type="submit" value="Add Product" id="submitBtn">
            </div>
        </form>

        <!-- Progress bar -->
        

            </div>
        


          </div>
      </div>
    </div>
    <div class="progress" style="left:26%; display:none; position:fixed; bottom:50%; width:50%">
        <div class="progress-bar" role="progressbar" style="width: 0%;" id="progressBar">0%</div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>
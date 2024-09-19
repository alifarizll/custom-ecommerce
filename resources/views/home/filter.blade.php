<!-- Filter By -->
<div class="row">
  <p style="margin-right: 10px;">Filter By</p>
  <form action="{{ url('shop') }}" method="get">
    <div class="dropdownFilter">
      <select name="category_filter" class="customselect">
        <option value="">All</option>
        @foreach ($category as $categories)
        <option value="{{ $categories->category_name }}" {{ request('category_filter') == $categories->category_name ? 'selected' : '' }}>
          {{ $categories->category_name }}
        </option>
        @endforeach
      </select>
      <button type="submit" class="custon" id="jarak">Confirm</button>
    </div>
  </form>
</div>

<style>
   .customselect {
       background: #2a2f3b;
       color:#fff;
       display: flex;
       justify-content: space-between;
       align-items: center;
       border: 2px #2a2f3b solid ;
       border-radius: 0.5em;
       padding: 0.1em;
       box-shadow: 0 0 0.5em 0 grey;
       cursor: pointer;
       transition: background 0.3s;
   }

   .customselect:hover {
       background: #fff;
       color: #2a2f3b;
   }
   .dropdownFilter {
       display: flex;
   }
   #jarak
   {
       margin-left: 10px;
       box-shadow: 0 0 0.5em 0 grey;
   }
</style>
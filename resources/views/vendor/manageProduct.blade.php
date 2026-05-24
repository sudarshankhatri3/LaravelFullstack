<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Vendor Dashboard</title>

<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:Arial, sans-serif;
}

body{
  background:#f1f5f9;
  min-height:100vh;
}

/* MAIN WRAPPER */
.main{
  max-width:1200px;
  margin:auto;
  padding:20px;
}

/* TOP BAR */
.topbar{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:20px;
  flex-wrap:wrap;
  gap:10px;
}

.topbar h1{
  font-size:28px;
  color:#0f172a;
}

.add-btn{
  display:inline-block;
  background:#2563eb;
  color:white;
  padding:12px 18px;
  border-radius:10px;
  text-decoration:none;
  font-size:15px;
  transition:0.3s;
}

.add-btn:hover{
  background:#1d4ed8;
}

/* CARDS */
.cards{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
  gap:15px;
  margin-bottom:25px;
}

.card{
  background:white;
  padding:18px;
  border-radius:12px;
  box-shadow:0 2px 10px rgba(0,0,0,0.08);
}

.card h3{
  font-size:14px;
  color:#64748b;
}

.card h2{
  margin-top:8px;
  font-size:24px;
  color:#0f172a;
}

/* TABLE */
.table-wrapper{
  background:white;
  border-radius:12px;
  padding:10px;
  overflow-x:auto;
  box-shadow:0 2px 10px rgba(0,0,0,0.08);
}

/* IMPORTANT: makes table responsive */
table{
  width:100%;
  border-collapse:collapse;
  min-width:700px;
}

th{
  background:#e2e8f0;
  padding:12px;
  text-align:left;
  font-size:14px;
}

td{
  padding:12px;
  border-bottom:1px solid #e5e7eb;
  font-size:14px;
}

tr:hover{
  background:#f8fafc;
}

.product-img{
  width:50px;
  height:50px;
  object-fit:cover;
  border-radius:8px;
}

/* STATUS */
.status{
  padding:5px 10px;
  border-radius:20px;
  font-size:12px;
  font-weight:bold;
}

.in-stock{ background:#dcfce7; color:#166534; }
.limited{ background:#fef3c7; color:#92400e; }
.out-stock{ background:#fee2e2; color:#991b1b; }

/* BUTTONS */
.btn-group{
  display:flex;
  gap:8px;
  flex-wrap:wrap;
}

.btn{
  border:none;
  padding:7px 10px;
  border-radius:8px;
  cursor:pointer;
  color:white;
  font-size:13px;
}

.edit-btn{ background:#f59e0b; }
.delete-btn{ background:#ef4444; }

/* MOBILE */
@media(max-width:768px){

  .topbar{
    flex-direction:column;
    align-items:flex-start;
  }

  .add-btn{
    width:100%;
    text-align:center;
  }

  .cards{
    grid-template-columns:1fr;
  }

  table{
    min-width:600px;
  }

  .btn-group{
    flex-direction:column;
  }

  .btn{
    width:100%;
  }
}
</style>
</head>

<body>

<div class="main">

  <!-- TOP -->
  <div class="topbar">
    <h1>Manage Products</h1>
    <a href="/vendor/addProduct" class="add-btn">+ Add Product</a>
  </div>

  <!-- CARDS -->
  <div class="cards">
    <div class="card">
      <h3>Total Products</h3>
      <h2>{{count($products)}}</h2>
    </div>
    

    <div class="card">
      <h3>Total Orders</h3>
      <h2>340</h2>
    </div>

    <div class="card">
      <h3>Total Revenue</h3>
      <h2>Rs. 5L</h2>
    </div>

    <div class="card">
      <h3>Pending Orders</h3>
      <h2>14</h2>
    </div>

  </div>

  <!-- TABLE -->
  <div class="table-wrapper">

    <table>
      <thead>
        <tr>
          <th>Image</th>
          <th>Product</th>
          <th>Price</th>
          <th>Qty</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach($products as $product)
        <tr>
          <td>
            <img class="product-img"  src="{{ asset('storage/'.$product->image) }}"  >
          </td>

          <td>{{ $product->title }}</td>

          <td>Rs. {{ $product->price }}</td>

          <td>{{ $product->quantity }}</td>

          <td>
            <span class="status in-stock">
              {{ $product->stock }}
            </span>
          </td>

          <td>
            <div class="btn-group">
             <a href="{{ url('/vendor/manageProduct/edit/'.$product->id) }}" class="btn edit-btn">Edit</a>
             <form action="{{ url('/vendor/manageProduct/'.$product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn delete-btn">
                    Delete
                </button>
            </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>

  </div>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Product Management - Add New Product</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            min-height: 100vh;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .header p {
            opacity: 0.9;
        }
        
        .form-container {
            padding: 40px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }
        
        label.required:after {
            content: " *";
            color: red;
        }
        
        input[type="text"],
        input[type="number"],
        input[type="url"],
        textarea,
        select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        
        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .price-group {
            position: relative;
        }
        
        .price-group input {
            padding-left: 30px;
        }
        
        .currency-symbol {
            position: absolute;
            left: 12px;
            top: 38px;
            font-weight: bold;
            color: #666;
        }
        
        .image-upload {
            border: 2px dashed #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .image-upload:hover {
            border-color: #667eea;
            background: #f8f9ff;
        }
        
        .image-upload input {
            display: none;
        }
        
        .image-preview {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 15px;
        }
        
        .preview-item {
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid #e0e0e0;
        }
        
        .preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .remove-image {
            position: absolute;
            top: -8px;
            right: -8px;
            background: red;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 12px;
        }
        
        .gallery-container {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
        }
        
        .gallery-upload {
            border: 2px dashed #ccc;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            margin-bottom: 15px;
        }
        
        .gallery-preview {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .checkbox-group input {
            width: auto;
            margin: 0;
        }
        
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-secondary {
            background: #f0f0f0;
            color: #333;
        }
        
        .btn-secondary:hover {
            background: #e0e0e0;
        }
        
        .alert {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }
            
            .row {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📦 Add New Product</h1>
            <p>Fill in the details below to list your product</p>
        </div>
        
        <div class="form-container">
            <div id="alert" class="alert"></div>
          <form 
            id="productForm"
            action="{{ isset($product) ?  url('/vendor/addProduct/'.$product->id) : url('/vendor/addProduct') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            @if(isset($product))
                @method('PUT')
            @endif

            <!-- Title -->
            <div class="form-group">
                <label for="title" class="required">Product Title</label>
                <input 
                    type="text"
                    id="title"
                    name="title"
                    required
                    value="{{ old('title', $product->title ?? '') }}"
                >
            </div>

            <div class="row">

                <!-- Quantity -->
                <div class="form-group">
                    <label for="quantity" class="required">Stock Quantity</label>
                    <input 
                        type="number"
                        id="quantity"
                        name="quantity"
                        min="0"
                        required
                        value="{{ old('quantity', $product->quantity ?? '') }}"
                    >
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price" class="required">Price (NPR)</label>
                    <input 
                        type="number"
                        id="price"
                        name="price"
                        step="0.01"
                        min="0"
                        required
                        value="{{ old('price', $product->price ?? '') }}"
                    >
                </div>

            </div>

            <div class="row">

                <!-- Model -->
                <div class="form-group">
                    <label for="model">Model/SKU</label>
                    <input 
                        type="text"
                        id="model"
                        name="model"
                        value="{{ old('model', $product->model ?? '') }}"
                    >
                </div>

                <!-- Discount -->
                <div class="form-group">
                    <label for="discount">Discount (%)</label>
                    <input 
                        type="number"
                        id="discount"
                        name="discount"
                        min="0"
                        max="100"
                        step="0.01"
                        value="{{ old('discount', $product->discount ?? '') }}"
                    >
                </div>

            </div>

            <!-- Dimension -->
            <div class="form-group">
                <label for="dimension">Dimensions</label>
                <input 
                    type="text"
                    id="dimension"
                    name="dimension"
                    value="{{ old('dimension', $product->dimension ?? '') }}"
                >
            </div>

            <!-- Stock -->
            <div class="form-group">
                <label for="stock">Stock Status</label>

                <select id="stock" name="stock">

                    <option value="in_stock"
                        {{ old('stock', $product->stock ?? '') == 'in_stock' ? 'selected' : '' }}>
                        In Stock
                    </option>

                    <option value="limited"
                        {{ old('stock', $product->stock ?? '') == 'limited' ? 'selected' : '' }}>
                        Limited Stock
                    </option>

                    <option value="out_of_stock"
                        {{ old('stock', $product->stock ?? '') == 'out_of_stock' ? 'selected' : '' }}>
                        Out of Stock
                    </option>

                    <option value="pre_order"
                        {{ old('stock', $product->stock ?? '') == 'pre_order' ? 'selected' : '' }}>
                        Pre-Order
                    </option>

                    <option value="coming_soon"
                        {{ old('stock', $product->stock ?? '') == 'coming_soon' ? 'selected' : '' }}>
                        Coming Soon
                    </option>

                </select>
            </div>

            <!-- Main Image -->
            <div class="form-group">
                <label>Main Product Image</label>

                <input 
                    type="file"
                    id="image"
                    name="image"
                    accept="image/*"
                    {{ isset($product) ? '' : 'required' }}
                >

                @if(isset($product) && $product->image)
                    <br><br>

                    <img 
                        src="{{ asset('storage/'.$product->image) }}"
                        width="120"
                        style="border-radius:10px;"
                    >
                @endif
            </div>

            <!-- Gallery -->
            <div class="form-group">
                <label>Gallery Images</label>

                <input 
                    type="file"
                    id="gallery"
                    name="gallery[]"
                    accept="image/*"
                    multiple
                >
            </div>

            <!-- Button -->
            <div class="form-actions">

                <button type="submit" class="btn btn-primary">

                    {{ isset($product) ? 'Update Product' : 'Add Product' }}

                </button>

            </div>

        </form>
        </div>
    </div>
    
    <script>
        // Main Image Preview
        // document.getElementById('image').addEventListener('change', function(e) {
        //     const preview = document.getElementById('mainImagePreview');
        //     preview.innerHTML = '';
        //     const file = e.target.files[0];
        //     if (file) {
        //         const reader = new FileReader();
        //         reader.onload = function(event) {
        //             const div = document.createElement('div');
        //             div.className = 'preview-item';
        //             div.innerHTML = `
        //                 <img src="${event.target.result}" alt="Preview">
        //                 <div class="remove-image" onclick="this.parentElement.remove()">×</div>
        //             `;
        //             preview.appendChild(div);
        //         };
        //         reader.readAsDataURL(file);
        //     }
        // });
        
        // // Gallery Preview
        // document.getElementById('gallery').addEventListener('change', function(e) {
        //     const preview = document.getElementById('galleryPreview');
        //     preview.innerHTML = '';
        //     const files = Array.from(e.target.files);
            
        //     if (files.length > 10) {
        //         showAlert('You can only upload up to 10 images', 'error');
        //         this.value = '';
        //         return;
        //     }
            
        //     files.forEach((file, index) => {
        //         const reader = new FileReader();
        //         reader.onload = function(event) {
        //             const div = document.createElement('div');
        //             div.className = 'preview-item';
        //             div.innerHTML = `
        //                 <img src="${event.target.result}" alt="Gallery ${index + 1}">
        //                 <div class="remove-image" onclick="this.parentElement.remove(); removeGalleryImage(${index})">×</div>
        //             `;
        //             preview.appendChild(div);
        //         };
        //         reader.readAsDataURL(file);
        //     });
        // });
        
        // // Form Submission
        // document.getElementById('productForm').addEventListener('submit', async function(e) {
        //     e.preventDefault();
            
        //     // Validate form
        //     if (!validateForm()) {
        //         return;
        //     }
            
        //     // Create FormData object for file upload
        //     const formData = new FormData();
        //     formData.append('title', document.getElementById('title').value);
        //     formData.append('quantity', document.getElementById('quantity').value);
        //     formData.append('price', document.getElementById('price').value);
        //     formData.append('model', document.getElementById('model').value);
        //     formData.append('discount', document.getElementById('discount').value || 0);
        //     formData.append('dimension', document.getElementById('dimension').value);
        //     formData.append('stock', document.getElementById('stock').value);
        //     formData.append('featured', document.getElementById('featured').checked);
        //     formData.append('vendor_id', getVendorId()); // Get from session
            
        //     // Add images
        //     const mainImage = document.getElementById('image').files[0];
        //     if (mainImage) {
        //         formData.append('image', mainImage);
        //     }
            
        //     const galleryFiles = document.getElementById('gallery').files;
        //     for (let i = 0; i < galleryFiles.length; i++) {
        //         formData.append('gallery', galleryFiles[i]);
        //     }
            
        //     // Show loading state
        //     const submitBtn = document.querySelector('.btn-primary');
        //     const originalText = submitBtn.textContent;
        //     submitBtn.textContent = 'Adding Product...';
        //     submitBtn.disabled = true;
            
        //     try {
        //         // API call to backend
        //         const response = await fetch('/api/vendor/products', {
        //             method: 'POST',
        //             headers: {
        //                 'Authorization': `Bearer ${getAuthToken()}`
        //             },
        //             body: formData
        //         });
                
        //         const result = await response.json();
                
        //         if (response.ok) {
        //             showAlert('Product added successfully!', 'success');
        //             setTimeout(() => {
        //                 window.location.href = '/vendor/products';
        //             }, 2000);
        //         } else {
        //             showAlert(result.message || 'Failed to add product', 'error');
        //         }
        //     } catch (error) {
        //         showAlert('Network error. Please try again.', 'error');
        //     } finally {
        //         submitBtn.textContent = originalText;
        //         submitBtn.disabled = false;
        //     }
        // });
        
        // function validateForm() {
        //     const title = document.getElementById('title').value.trim();
        //     const quantity = document.getElementById('quantity').value;
        //     const price = document.getElementById('price').value;
        //     const mainImage = document.getElementById('image').files[0];
            
        //     if (!title) {
        //         showAlert('Product title is required', 'error');
        //         return false;
        //     }
            
        //     if (title.length < 3) {
        //         showAlert('Title must be at least 3 characters', 'error');
        //         return false;
        //     }
            
        //     if (!quantity || quantity < 0) {
        //         showAlert('Valid quantity is required', 'error');
        //         return false;
        //     }
            
        //     if (!price || price <= 0) {
        //         showAlert('Valid price is required', 'error');
        //         return false;
        //     }
            
        //     if (!mainImage) {
        //         showAlert('Main product image is required', 'error');
        //         return false;
        //     }
            
        //     // Validate image size (5MB max)
        //     if (mainImage.size > 5 * 1024 * 1024) {
        //         showAlert('Main image size should be less than 5MB', 'error');
        //         return false;
        //     }
            
        //     return true;
        // }
        
        // function showAlert(message, type) {
        //     const alert = document.getElementById('alert');
        //     alert.textContent = message;
        //     alert.className = `alert alert-${type}`;
        //     alert.style.display = 'block';
            
        //     setTimeout(() => {
        //         alert.style.display = 'none';
        //     }, 5000);
        // }
        
        // function resetForm() {
        //     document.getElementById('productForm').reset();
        //     document.getElementById('mainImagePreview').innerHTML = '';
        //     document.getElementById('galleryPreview').innerHTML = '';
        //     showAlert('Form has been reset', 'success');
        // }
        
        // function removeGalleryImage(index) {
        //     // Implementation to remove specific gallery image
        //     const files = Array.from(document.getElementById('gallery').files);
        //     files.splice(index, 1);
        //     const dataTransfer = new DataTransfer();
        //     files.forEach(file => dataTransfer.items.add(file));
        //     document.getElementById('gallery').files = dataTransfer.files;
        // }
        
        // function getAuthToken() {
        //     // Get token from localStorage/session
        //     return localStorage.getItem('access_token');
        // }
        
        // function getVendorId() {
        //     // Get vendor ID from user session
        //     const user = JSON.parse(localStorage.getItem('user') || '{}');
        //     return user.id;
        // }
        
        // // Drag and drop for main image
        // const mainUpload = document.getElementById('mainImageUpload');
        // mainUpload.addEventListener('dragover', (e) => {
        //     e.preventDefault();
        //     mainUpload.style.borderColor = '#667eea';
        //     mainUpload.style.background = '#f8f9ff';
        // });
        
        // mainUpload.addEventListener('dragleave', () => {
        //     mainUpload.style.borderColor = '#e0e0e0';
        //     mainUpload.style.background = 'white';
        // });
        
        // mainUpload.addEventListener('drop', (e) => {
        //     e.preventDefault();
        //     const file = e.dataTransfer.files[0];
        //     if (file && file.type.startsWith('image/')) {
        //         document.getElementById('image').files = e.dataTransfer.files;
        //         mainUpload.style.borderColor = '#e0e0e0';
        //         mainUpload.style.background = 'white';
                
        //         // Trigger preview
        //         const event = new Event('change');
        //         document.getElementById('image').dispatchEvent(event);
        //     }
        // });
    </script>
</body>
</html>
<!-- Edit Product Modal -->
<div id="editProductModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background-color: rgba(0, 0, 0, 0.5); align-items: center; justify-content: center;">
    <!-- Modal Content -->
    <div style="background: white; border-radius: 12px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); width: 90%; max-width: 1400px; margin: auto; position: relative;">
            
            <!-- Modal Header -->
            <div style="display: flex; align-items: center; justify-content: space-between; padding: 24px; border-bottom: 1px solid #e5e7eb;">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #111827; margin: 0;">Edit Product</h3>
                <button type="button" onclick="closeEditProductModal()" style="background: none; border: none; color: #9ca3af; cursor: pointer; font-size: 24px; line-height: 1; padding: 0;">
                    ×
                </button>
            </div>
            
            <!-- Modal Body (Form) -->
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit_product_id">
                
                <div style="padding: 24px; max-height: 70vh; overflow-y: auto;">
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;">
                        
                        <!-- Product Name -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Product Name <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="edit_product_name"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   placeholder="Enter product name"
                                   required>
                        </div>
                        
                        <!-- SKU -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                SKU <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" 
                                   name="sku" 
                                   id="edit_product_sku"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   placeholder="e.g., LD-001"
                                   required>
                        </div>
                        
                        <!-- Category -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Category <span style="color: #ef4444;">*</span>
                            </label>
                            <div class="custom-dropdown" style="position: relative; width: 100%;">
                                <input type="hidden" name="category" id="edit_category_value" required>
                                <div class="custom-dropdown-selected" 
                                     onclick="toggleDropdown('edit_category_dropdown')"
                                     style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background: white; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="edit_category_display" style="color: #9ca3af;">Select Category</span>
                                    <span style="color: #6b7280; font-size: 0.75rem;">▼</span>
                                </div>
                                <div id="edit_category_dropdown" class="custom-dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; right: 0; margin-top: 4px; background: white; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 250px; overflow-y: auto; z-index: 1000;">
                                    <div class="custom-dropdown-item" onclick="selectCategory('edit', 'Detergents')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Detergents</div>
                                    <div class="custom-dropdown-item" onclick="selectCategory('edit', 'Softeners')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Softeners</div>
                                    <div class="custom-dropdown-item" onclick="selectCategory('edit', 'Stain Care')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Stain Care</div>
                                    <div class="custom-dropdown-item" onclick="selectCategory('edit', 'Whitening')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Whitening</div>
                                    <div class="custom-dropdown-item" onclick="selectCategory('edit', 'Dryer Care')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Dryer Care</div>
                                    <div class="custom-dropdown-item" onclick="selectCategory('edit', 'Specialty')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Specialty</div>
                                    <div class="custom-dropdown-item" onclick="selectCategory('edit', 'Accessories')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Accessories</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Price -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Price <span style="color: #ef4444;">*</span>
                            </label>
                            <div style="position: relative;">
                                <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #6b7280;">$</span>
                                <input type="number" 
                                       name="price" 
                                       id="edit_product_price"
                                       step="0.01"
                                       style="width: 100%; padding: 10px 16px 10px 32px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                       placeholder="0.00"
                                       required>
                            </div>
                        </div>
                        
                        <!-- Stock Quantity -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Stock Quantity <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="number" 
                                   name="stock" 
                                   id="edit_product_stock"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   placeholder="0"
                                   required>
                        </div>
                        
                        <!-- Minimum Stock Alert -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Minimum Stock Alert <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="number" 
                                   name="min_stock_alert" 
                                   id="edit_product_min_stock"
                                   min="0"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   placeholder="Enter minimum stock level"
                                   required>
                            <p style="font-size: 0.75rem; color: #6b7280; margin-top: 4px;">Alert when stock falls below this quantity</p>
                        </div>
                        
                        <!-- Product Image -->
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Product Image
                            </label>
                            <input type="file" 
                                   name="image" 
                                   accept="image/*"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;">
                            <p style="font-size: 0.75rem; color: #6b7280; margin-top: 4px;">Recommended size: 500x500px. Max file size: 2MB</p>
                        </div>
                        
                        <!-- Description -->
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Description
                            </label>
                            <textarea name="description" 
                                      id="edit_product_description"
                                      rows="3"
                                      style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; resize: none;" 
                                      placeholder="Enter product description (optional)"></textarea>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Modal Footer -->
                <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px; padding: 24px; border-top: 1px solid #e5e7eb; background-color: #f9fafb; border-radius: 0 0 12px 12px;">
                    <button type="button" 
                            onclick="closeEditProductModal()"
                            style="padding: 10px 24px; border: 1px solid #d1d5db; border-radius: 8px; color: #374151; background: white; cursor: pointer; font-weight: 500; font-size: 1rem;">
                        Cancel
                    </button>
                    <button type="submit" 
                            style="padding: 10px 24px; background-color: var(--primary); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 500; font-size: 1rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: all 0.3s ease;"
                            onmouseover="this.style.backgroundColor='var(--primary-hover)'" 
                            onmouseout="this.style.backgroundColor='var(--primary)'">
                        Update Product
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</div>

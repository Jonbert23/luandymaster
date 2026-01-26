<!-- Edit Inventory Modal -->
<div id="editInventoryModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background-color: rgba(0, 0, 0, 0.5); align-items: center; justify-content: center;">
    <!-- Modal Content -->
    <div style="background: white; border-radius: 12px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); width: 90%; max-width: 1400px; margin: auto; position: relative;">
            
            <!-- Modal Header -->
            <div style="padding: 24px; border-bottom: 1px solid #e5e7eb;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: #111827; margin: 0;">Edit Stock</h3>
                    <button type="button" onclick="closeEditInventoryModal()" style="background: none; border: none; color: #9ca3af; cursor: pointer; font-size: 24px; line-height: 1; padding: 0;">
                        ×
                    </button>
                </div>
                
                <!-- Product Information (Read-only Display) -->
                <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 8px;">
                    Product
                </label>
                <div style="width: 100%; padding: 12px 16px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 1rem; background: #f9fafb;">
                    <div id="edit_inv_product_display" style="color: #111827; font-weight: 500;">
                        No product selected
                    </div>
                    <div id="edit_inv_product_details" style="font-size: 0.75rem; color: #6b7280; margin-top: 4px;">
                        Price: -- | Category: --
                    </div>
                </div>
                <p style="font-size: 0.75rem; color: #6b7280; margin-top: 6px; margin-bottom: 0; font-style: italic;">
                    Product information cannot be changed
                </p>
            </div>
            
            <!-- Modal Body (Form) -->
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit_inv_id">
                <input type="hidden" name="product_name" id="edit_inv_product_name">
                <input type="hidden" name="price" id="edit_inv_price">
                <input type="hidden" name="category" id="edit_inv_category">
                <input type="hidden" name="min_stock_alert" id="edit_inv_min_stock">
                
                <div style="padding: 24px; max-height: 70vh; overflow-y: auto;">
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;">
                        
                        <!-- Product Name (Read-only, displayed) -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Product Name
                            </label>
                            <input type="text" 
                                   id="edit_inv_product_name_display"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background-color: #f9fafb;" 
                                   readonly>
                        </div>
                        
                        <!-- Price (Read-only, displayed) -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Price
                            </label>
                            <input type="text" 
                                   id="edit_inv_price_display"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background-color: #f9fafb;" 
                                   readonly>
                        </div>
                        
                        <!-- Category (Read-only, displayed) -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Category
                            </label>
                            <input type="text" 
                                   id="edit_inv_category_display"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background-color: #f9fafb;" 
                                   readonly>
                        </div>
                        
                        <!-- Minimum Stock Alert (Read-only, displayed) -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Minimum Stock Alert (From Product Settings)
                            </label>
                            <input type="number" 
                                   id="edit_inv_min_stock_display"
                                   min="0"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background-color: #f9fafb;" 
                                   readonly>
                            <p style="font-size: 0.75rem; color: #6b7280; margin-top: 4px;">Alert threshold from product settings</p>
                        </div>
                        
                        <!-- Current Quantity (Editable) -->
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Current Stock Quantity <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="number" 
                                   name="quantity" 
                                   id="edit_inv_quantity"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   placeholder="Enter current stock quantity"
                                   min="0"
                                   required>
                            <p style="font-size: 0.75rem; color: #6b7280; margin-top: 4px;">Update the current quantity in stock</p>
                        </div>
                        
                        <!-- Auto-filled Information Box -->
                        <div style="grid-column: 1 / -1; background-color: #f0fdf4; border: 1px solid #86efac; border-radius: 8px; padding: 12px;">
                            <p style="margin: 0; font-size: 0.875rem; color: #166534; font-weight: 500;">
                                System Information
                            </p>
                            <p style="margin: 4px 0 0 0; font-size: 0.75rem; color: #15803d;">
                                Last updated date and user will be automatically recorded
                            </p>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Modal Footer -->
                <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px; padding: 24px; border-top: 1px solid #e5e7eb; background-color: #f9fafb; border-radius: 0 0 12px 12px;">
                    <button type="button" 
                            onclick="closeEditInventoryModal()"
                            style="padding: 10px 24px; border: 1px solid #d1d5db; border-radius: 8px; color: #374151; background: white; cursor: pointer; font-weight: 500; font-size: 1rem;">
                        Cancel
                    </button>
                    <button type="submit" 
                            style="padding: 10px 24px; background-color: var(--primary); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 500; font-size: 1rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: all 0.3s ease;"
                            onmouseover="this.style.backgroundColor='var(--primary-hover)'" 
                            onmouseout="this.style.backgroundColor='var(--primary)'">
                        Update Stock
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</div>

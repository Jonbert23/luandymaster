<!-- Add Inventory Modal -->
<div id="addInventoryModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background-color: rgba(0, 0, 0, 0.5); align-items: center; justify-content: center;">
    <!-- Modal Content -->
    <div style="background: white; border-radius: 12px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); width: 90%; max-width: 1400px; margin: auto; position: relative;">
            
            <!-- Modal Header -->
            <div style="padding: 24px; border-bottom: 1px solid #e5e7eb;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: #111827; margin: 0;">Add Stock</h3>
                    <button type="button" onclick="closeAddInventoryModal()" style="background: none; border: none; color: #9ca3af; cursor: pointer; font-size: 24px; line-height: 1; padding: 0;">
                        ×
                    </button>
                </div>
                
                <!-- Select Product Dropdown -->
                <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 8px;">
                    Select Product to Add Stock <span style="color: #ef4444;">*</span>
                </label>
                <div class="custom-dropdown" style="position: relative; width: 100%;">
                    <input type="hidden" name="selected_product_id" id="add_inv_product_id" required>
                    <div class="custom-dropdown-selected" 
                         onclick="toggleDropdown('add_inv_product_dropdown')"
                         style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background: white; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                        <span id="add_inv_product_display" style="color: #9ca3af; font-weight: 500;">Choose a product...</span>
                        <span style="color: #6b7280; font-size: 0.75rem;">▼</span>
                    </div>
                    <div id="add_inv_product_dropdown" class="custom-dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; right: 0; margin-top: 4px; background: white; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 300px; overflow-y: auto; z-index: 1000;">
                        <!-- Sample Products - In real app, these would come from database -->
                        <div class="custom-dropdown-item" onclick="selectInventoryProduct('LD-001', 'Laundry Detergent', 'Detergents', '$12.99', 10)" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                            <div>
                                <div style="font-weight: 500; color: #111827;">Laundry Detergent</div>
                                <div style="font-size: 0.75rem; color: #6b7280;">Price: $12.99 | Category: Detergents</div>
                            </div>
                        </div>
                        <div class="custom-dropdown-item" onclick="selectInventoryProduct('FS-002', 'Fabric Softener', 'Softeners', '$9.99', 15)" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                            <div>
                                <div style="font-weight: 500; color: #111827;">Fabric Softener</div>
                                <div style="font-size: 0.75rem; color: #6b7280;">Price: $9.99 | Category: Softeners</div>
                            </div>
                        </div>
                        <div class="custom-dropdown-item" onclick="selectInventoryProduct('SR-003', 'Stain Remover', 'Stain Care', '$15.50', 20)" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                            <div>
                                <div style="font-weight: 500; color: #111827;">Stain Remover</div>
                                <div style="font-size: 0.75rem; color: #6b7280;">Price: $15.50 | Category: Stain Care</div>
                            </div>
                        </div>
                        <div class="custom-dropdown-item" onclick="selectInventoryProduct('BL-004', 'Bleach', 'Whitening', '$8.99', 25)" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                            <div>
                                <div style="font-weight: 500; color: #111827;">Bleach</div>
                                <div style="font-size: 0.75rem; color: #6b7280;">Price: $8.99 | Category: Whitening</div>
                            </div>
                        </div>
                        <div class="custom-dropdown-item" onclick="selectInventoryProduct('DS-005', 'Dryer Sheets', 'Dryer Care', '$6.49', 5)" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                            <div>
                                <div style="font-weight: 500; color: #111827;">Dryer Sheets</div>
                                <div style="font-size: 0.75rem; color: #6b7280;">Price: $6.49 | Category: Dryer Care</div>
                            </div>
                        </div>
                        <div class="custom-dropdown-item" onclick="selectInventoryProduct('WP-006', 'Washing Powder', 'Detergents', '$18.99', 10)" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                            <div>
                                <div style="font-weight: 500; color: #111827;">Washing Powder</div>
                                <div style="font-size: 0.75rem; color: #6b7280;">Price: $18.99 | Category: Detergents</div>
                            </div>
                        </div>
                        <div class="custom-dropdown-item" onclick="selectInventoryProduct('CB-007', 'Color Safe Bleach', 'Whitening', '$11.99', 12)" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                            <div>
                                <div style="font-weight: 500; color: #111827;">Color Safe Bleach</div>
                                <div style="font-size: 0.75rem; color: #6b7280;">Price: $11.99 | Category: Whitening</div>
                            </div>
                        </div>
                        <div class="custom-dropdown-item" onclick="selectInventoryProduct('DW-008', 'Delicate Wash', 'Specialty', '$14.99', 8)" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                            <div>
                                <div style="font-weight: 500; color: #111827;">Delicate Wash</div>
                                <div style="font-size: 0.75rem; color: #6b7280;">Price: $14.99 | Category: Specialty</div>
                            </div>
                        </div>
                        <div class="custom-dropdown-item" onclick="selectInventoryProduct('SD-009', 'Sports Detergent', 'Specialty', '$16.99', 15)" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                            <div>
                                <div style="font-weight: 500; color: #111827;">Sports Detergent</div>
                                <div style="font-size: 0.75rem; color: #6b7280;">Price: $16.99 | Category: Specialty</div>
                            </div>
                        </div>
                        <div class="custom-dropdown-item" onclick="selectInventoryProduct('BD-010', 'Baby Laundry Detergent', 'Specialty', '$19.99', 20)" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s;">
                            <div>
                                <div style="font-weight: 500; color: #111827;">Baby Laundry Detergent</div>
                                <div style="font-size: 0.75rem; color: #6b7280;">Price: $19.99 | Category: Specialty</div>
                            </div>
                        </div>
                    </div>
                </div>
                <p style="font-size: 0.75rem; color: #6b7280; margin-top: 6px; margin-bottom: 0; font-style: italic;">
                    Select a product to automatically fill in the details below
                </p>
            </div>
            
            <!-- Modal Body (Form) -->
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding: 24px; max-height: 70vh; overflow-y: auto;">
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;">
                        
                        <!-- Product Name (Read-only, auto-filled) -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Product Name <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" 
                                   name="product_name" 
                                   id="add_inv_product_name"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background-color: #f9fafb;" 
                                   placeholder="Auto-filled from product selection"
                                   readonly
                                   required>
                        </div>
                        
                        <!-- Price (Read-only, auto-filled) -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Price <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" 
                                   name="price" 
                                   id="add_inv_price"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background-color: #f9fafb;" 
                                   placeholder="Auto-filled from product selection"
                                   readonly
                                   required>
                        </div>
                        
                        <!-- Category (Read-only, auto-filled) -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Category <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" 
                                   name="category" 
                                   id="add_inv_category"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background-color: #f9fafb;" 
                                   placeholder="Auto-filled from product selection"
                                   readonly
                                   required>
                        </div>
                        
                        <!-- Minimum Stock Alert (Read-only, auto-filled) -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Minimum Stock Alert (From Product Settings)
                            </label>
                            <input type="number" 
                                   name="min_stock_alert" 
                                   id="add_inv_min_stock"
                                   min="0"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background-color: #f9fafb;" 
                                   placeholder="Auto-filled from product"
                                   readonly>
                            <p style="font-size: 0.75rem; color: #6b7280; margin-top: 4px;">Alert threshold from product settings</p>
                        </div>
                        
                        <!-- Quantity to Add (Editable) -->
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Quantity to Add <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="number" 
                                   name="quantity" 
                                   id="add_inv_quantity"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   placeholder="Enter quantity to add"
                                   min="1"
                                   required>
                            <p style="font-size: 0.75rem; color: #6b7280; margin-top: 4px;">How many units are you adding to stock?</p>
                        </div>
                        
                        <!-- Current Stock Info (Display Only) -->
                        <div style="grid-column: 1 / -1; background-color: #f0fdf4; border: 1px solid #86efac; border-radius: 8px; padding: 12px;">
                            <p style="margin: 0; font-size: 0.875rem; color: #166534; font-weight: 500;">
                                Auto-filled Information
                            </p>
                            <p style="margin: 4px 0 0 0; font-size: 0.75rem; color: #15803d;">
                                Restock date will be set to today | Added by current logged-in user
                            </p>
                        </div>
                        
                        <!-- Remove Product Image and Notes fields -->
                        
                    </div>
                </div>
                
                <!-- Modal Footer -->
                <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px; padding: 24px; border-top: 1px solid #e5e7eb; background-color: #f9fafb; border-radius: 0 0 12px 12px;">
                    <button type="button" 
                            onclick="closeAddInventoryModal()"
                            style="padding: 10px 24px; border: 1px solid #d1d5db; border-radius: 8px; color: #374151; background: white; cursor: pointer; font-weight: 500; font-size: 1rem;">
                        Cancel
                    </button>
                    <button type="submit" 
                            style="padding: 10px 24px; background-color: var(--primary); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 500; font-size: 1rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: all 0.3s ease;"
                            onmouseover="this.style.backgroundColor='var(--primary-hover)'" 
                            onmouseout="this.style.backgroundColor='var(--primary)'">
                        Add to Inventory
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</div>
